<?php

class Rental extends Controller
{
    private $rentalModel;
    private $consoleModel;

    private $OrderHelper;

    public function __construct()
    {
        $this->rentalModel = $this->model('RentalModel');
        $this->consoleModel = $this->model('ConsoleModel');
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
            // Validasi input sederhana
            if (
                empty($_POST['console_id']) ||
                empty($_POST['rent_date']) ||
                empty($_POST['return_date']) ||
                empty($_POST['qty']) ||
                empty($_POST['payment_method'])
            ) {
                echo "Semua field harus diisi!";
                return;
            }

            // CEK SESSION USER DI SINI
            var_dump($_SESSION['user']); // Debug: cek isi session user

            if (!isset($_SESSION['user_id'])) {
                echo "Anda harus login untuk melakukan pemesanan.";
                return;
            }
            $user_id = $_SESSION['user_id'];

            $console_id = $_POST['console_id'];
            $rent_date = $_POST['rent_date'];
            $return_date = $_POST['return_date'];
            $qty = (int)$_POST['qty'];
            $payment_method = $_POST['payment_method'];

            $console = $this->consoleModel->getById($console_id);

            if (!$console) {
                echo "Konsol tidak ditemukan!";
                return;
            }

            $price_per_day = $console['price_per_day'];

            $days = (strtotime($return_date) - strtotime($rent_date)) / 86400;
            $days = max(1, $days);

            $subtotal = $price_per_day * $days * $qty;
            $total_price = $subtotal;

            // Siapkan data untuk processRental
            $data = [
                'user_id' => $user_id,
                'console_id' => $console_id,
                'rent_date' => $rent_date,
                'return_date' => $return_date,
                'qty' => $qty,
                'price_per_day' => $price_per_day,
                'days' => $days,
                'subtotal' => $subtotal,
                'total_price' => $total_price,
                'payment_method' => $payment_method,
                'status' => 'pending'
            ];

            $result = $this->rentalModel->processRental($data);

            if ($result === true) {
                header('Location: ' . BASE_URL . '/rental/success');
                exit;
            } else {
                // Tampilkan pesan error (bisa juga simpan ke flash message)
                echo "Gagal melakukan rental. " . (is_string($result) ? $result : "");
            }
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

