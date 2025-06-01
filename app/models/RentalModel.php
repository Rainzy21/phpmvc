<?php
require_once __DIR__ . '/RentalDetailsModel.php';
require_once __DIR__ . '/PaymentsModel.php'; // Tambahkan baris ini
require_once __DIR__ . '/ConsoleModel.php';  // (opsional, jika belum ada)

class RentalModel
{
    private $db;
    private $rentalDetailsModel;
    private $paymentsModel;

    private $consoleModel;

    public function __construct()
    {
        $this->db = new Database;
        $this->rentalDetailsModel = new RentalDetailsModel(); // gunakan huruf kecil r
        $this->paymentsModel = new PaymentsModel(); // gunakan huruf kecil p
        $this->consoleModel = new ConsoleModel();
    }

    // Tambah data rental (tabel rentals)
    public function addRental($data)
    {
        $query = "INSERT INTO rentals (user_id, console_id, rent_date, return_date, total_price, status)
                  VALUES (:user_id, :console_id, :rent_date, :return_date, :total_price, :status)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('console_id', $data['console_id']);
        $this->db->bind('rent_date', $data['rent_date']);
        $this->db->bind('return_date', $data['return_date']);
        $this->db->bind('total_price', $data['total_price']);
        $this->db->bind('status', isset($data['status']) ? $data['status'] : 'pending');
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function getTotalTransaction()
    {
        $this->db->query("SELECT COUNT(*) as total FROM rentals");
        $row = $this->db->single();
        return $row['total'];
    }

    public function getTotalTransactionByid($id)
    {
        $this->db->query("SELECT COUNT(*) as total FROM rentals WHERE user_id = :user_id");
        $this->db->bind('user_id', $id);
        $row = $this->db->single();
        return $row['total'];
    }
    
    public function getTheNewestRentalId()
    {
        $this->db->query("SELECT id FROM rentals ORDER BY id DESC LIMIT 1");
        $row = $this->db->single();
        return $row ? $row['id'] : null;

    }

    // Proses rental baru (transactional)
    public function processRental($data)
    {
        try {
            if (!method_exists($this->db, 'beginTransaction')) {
                throw new Exception('Database class belum support transaction!');
            }
            $this->db->beginTransaction();

            // 1. Cek stok konsol
            $stock = $this->consoleModel->getStock($data['console_id']);
            if ($stock < $data['qty']) {
                throw new Exception('Stok tidak cukup');
            }

            // 2. Insert ke rentals
            $rentalId = $this->addRental($data);

            // 3. Insert ke rental_details
            $detailData = [
                'rental_id' => $rentalId,
                'console_id' => $data['console_id'],
                'qty' => $data['qty'],
                'price_per_day' => $data['price_per_day'],
                'days' => $data['days'],
                'subtotal' => $data['subtotal']
            ];
            $this->rentalDetailsModel->addRentalDetail($detailData);

            // 4. Update stok di consoles
            // Sudah ada trigger untuk mengurangi stok konsol saat insert rental_details
            
            // 5. Insert ke payments
            $this->paymentsModel->addPayment($rentalId, $data);
            
            // 6. Commit transaksi
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            if (method_exists($this->db, 'rollBack')) {
                $this->db->rollBack();
            }
            // Untuk debug, bisa return $e->getMessage();
            return false;
        }
    }

    // Ambil semua transaksi, bisa filter status
    public function getAllTransactions($status = 'all')
    {
        $query = "SELECT 
                    rentals.id AS rental_id,
                    users.name AS user_name,
                    consoles.name AS console_name,
                    rental_details.qty,
                    rentals.rent_date,
                    rentals.return_date,
                    rentals.status AS rental_status,
                    payments.status AS payment_status
                  FROM rentals
                  JOIN users ON rentals.user_id = users.id
                  JOIN rental_details ON rentals.id = rental_details.rental_id
                  JOIN consoles ON rental_details.console_id = consoles.id
                  JOIN payments ON rentals.id = payments.rental_id";
        if ($status !== 'all') {
            $query .= " WHERE rentals.status = :status";
            $this->db->query($query);
            $this->db->bind('status', $status);
        } else {
            $this->db->query($query);
        }
        return $this->db->resultSet();
    }

    // Ambil detail transaksi untuk modal/detail
    public function getTransactionDetail($rental_id)
    {
        $this->db->query("SELECT 
            rentals.*, 
            users.name AS user_name, users.email, 
            consoles.name AS console_name, consoles.brand, consoles.price_per_day,
            payments.status AS payment_status, payments.amount
            FROM rentals
            JOIN users ON rentals.user_id = users.id
            JOIN consoles ON rentals.console_id = consoles.id
            LEFT JOIN payments ON payments.rental_id = rentals.id
            WHERE rentals.id = :rental_id
        ");
        $this->db->bind('rental_id', $rental_id);
        $detail = $this->db->single();

        $this->db->query("SELECT * FROM rental_details WHERE rental_id = :rental_id");
        $this->db->bind('rental_id', $rental_id);
        $detail['rental_details'] = $this->db->resultSet();

        return $detail;
    }

    public function updatePaymentAndRentalStatus($rental_id, $payment_status)
    {
        // Update status payment
        $this->db->query("UPDATE payments SET status = :status WHERE rental_id = :rental_id");
        $this->db->bind('status', $payment_status);
        $this->db->bind('rental_id', $rental_id);
        $this->db->execute();

        // Update status rental
        $rental_status = ($payment_status === 'paid') ? 'ongoing' : 'cancelled';
        $this->db->query("UPDATE rentals SET status = :status WHERE id = :rental_id");
        $this->db->bind('status', $rental_status);
        $this->db->bind('rental_id', $rental_id);
        $this->db->execute();
    }

    public function verifyReturn($rental_id)
    {
        $this->db->query("UPDATE rentals SET status = 'completed' WHERE id = :rental_id");
        $this->db->bind('rental_id', $rental_id);
        return $this->db->execute();
    }

    public function getOrdersByUser($userId)
    {
        $this->db->query("
            SELECT 
                rentals.id, 
                rentals.console_id,           -- tambahkan ini!
                consoles.name AS console_name, 
                rental_details.qty, 
                rentals.rent_date, 
                rentals.return_date, 
                rentals.status
            FROM rentals
            JOIN consoles ON rentals.console_id = consoles.id
            JOIN rental_details ON rental_details.rental_id = rentals.id
            WHERE rentals.user_id = :user_id
        ");
        $this->db->bind('user_id', $userId);
        return $this->db->resultSet();
    }
}