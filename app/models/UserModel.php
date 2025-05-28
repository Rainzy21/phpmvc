<?php
require_once __DIR__ . '/RentalModel.php';

class UserModel
{
    private $db;
    private $rentalModel;

    public function __construct()
    {
        $this->db = new Database(); // gunakan class Database.php (PDO)
        $this->rentalModel = new RentalModel();
    }

    // Ambil semua user beserta total transaksi
    public function getAllWithTransaksi()
    {
        $this->db->query("SELECT id, name, email, role FROM users");
        $users = $this->db->resultSet();
        foreach ($users as &$user) {
            $user['totalTransactions'] = $this->rentalModel->getTotalTransactionByid($user['id']);
        }
        return $users;
    }

    public function getTotalUsers()
    {
        $this->db->query("SELECT COUNT(*) as total FROM users");
        $row = $this->db->single();
        return $row['total'];
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);

        $result = $this->db->execute();
        $rowCount = $this->db->rowCount();

        return $rowCount;
    }
}