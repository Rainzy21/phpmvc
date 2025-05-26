<?php
// Ini untuk controller admin dashboard
class Dashboard extends Controller {
    public function index() {
        // Tidak perlu session_start() di sini

        // Cek autentikasi admin
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $data['title'] = 'Dashboard';
        $data['active_menu'] = 'dashboard'; // atau 'console', 'transactions', dst

        // Ambil total user dari UserModel
        $userModel = $this->model('UserModel');
        $data['totalUsers'] = $userModel->getTotalUsers();

        // Ambil total konsol dari ConsoleModel
        $consoleModel = $this->model('ConsoleModel');
        $data['totalKonsol'] = $consoleModel->getTotalKonsol();

        $this->view('templates/admin_header', $data);
        $this->view('admin/dashboard/index', $data);
        $this->view('templates/admin_footer');
    }
}