<?php

class Rental extends Controller
{
    private $rentalModel;
    private $consoleModel;

    public function __construct()
    {
        $this->rentalModel = $this->model('RentalModel');
        $this->consoleModel = $this->model('ConsoleModel'); // pastikan ada model ini untuk ambil data konsol
    }

    // Tampilkan form rental
    public function index()
    {
        $data['consoles'] = $this->consoleModel->getAllConsoles();
        $this->view('rental/index', $data);
    }

    // Proses tambah rental
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $console_id = $_POST['console_id'];
            $rent_date = $_POST['rent_date'];
            $return_date = $_POST['return_date'];
            $qty = $_POST['qty'];

            // Ambil user id dari session
            $user_id = $_SESSION['user']['id'];

            // Ambil data konsol untuk harga
            $console = $this->consoleModel->getById($console_id);
            $price_per_day = $console['price_per_day'];

            // Hitung jumlah hari sewa
            $days = (strtotime($return_date) - strtotime($rent_date)) / 86400;
            $days = max(1, $days); // minimal 1 hari

            // Hitung subtotal dan total
            $subtotal = $price_per_day * $days * $qty;
            $total_price = $subtotal;

            // Insert ke rentals
            $rental_id = $this->rentalModel->addRental([
                'user_id' => $user_id,
                'console_id' => $console_id,
                'rent_date' => $rent_date,
                'return_date' => $return_date,
                'total_price' => $total_price,
                'status' => 'pending'
            ]);

            // Insert ke rental_details
            $this->rentalModel->addRentalDetail([
                'rental_id' => $rental_id,
                'console_id' => $console_id,
                'qty' => $qty,
                'price_per_day' => $price_per_day,
                'days' => $days,
                'subtotal' => $subtotal
            ]);

            // Redirect ke halaman sukses atau daftar rental user
            header('Location: ' . BASE_URL . '/rental/success');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/rental');
            exit;
        }
    }

    // Halaman sukses (opsional)
    public function success()
    {
        $this->view('rental/success');
    }
}

