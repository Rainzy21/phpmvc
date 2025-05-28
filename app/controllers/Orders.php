<?php
// This controller handles the home page
// It extends the base Controller class

class Orders extends Controller {
    public function index() {
        $data['title'] = 'Halaman Pesanan';
        $data['active_menu'] = 'orders';

        // Ambil ID user dari session
        $user_id = $_SESSION['user_id'];
        // Ambil data pesanan user dari model
        $data['orders'] = $this->model('RentalModel')->getOrdersByUser($user_id);

        $this->view('templates/header', $data);
        $this->view('orders/index', $data);
        $this->view('templates/footer');
    }
}