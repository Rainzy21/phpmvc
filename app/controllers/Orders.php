<?php
// This controller handles the home page
// It extends the base Controller class

class Orders extends Controller {
    private $rentalModel;

    public function __construct() {
        $this->rentalModel = $this->model('RentalModel'); // Inisialisasi dengan benar
    }

    public function index() {
        $data['title'] = 'Halaman Pesanan';
        $data['active_menu'] = 'orders';

        $user_id = $_SESSION['user_id'];
        // Ambil semua transaksi user
        $orders = $this->rentalModel->getOrdersByUser($user_id);

        // Untuk setiap transaksi, ambil detail rentalnya
        $rentalDetailsModel = new RentalDetailsModel();
        foreach ($orders as &$order) {
            $order['details'] = $rentalDetailsModel->getRentalDetailsByRentalId($order['id']);
        }
        $data['orders'] = $orders;

        $this->view('templates/header', $data);
        $this->view('orders/index', $data);
        $this->view('templates/footer', $data);
    }
}