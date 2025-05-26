<?php
class Users extends Controller
{
    public function index()
    {
        $userModel = $this->model('UserModel');
        $data['users'] = $userModel->getAllWithTransaksi();
        $data['title'] = 'Manajemen User';
        $data['active_menu'] = 'users'; // agar sidebar aktif di menu Users
        // Ambil flash message jika ada
        if (isset($_SESSION['flash'])) {
            $data['flash'] = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
        $this->view('templates/admin_header', $data);
        $this->view('admin/users/index', $data);
        $this->view('templates/admin_footer');
    }

    public function delete($id)
    {
        if ($this->model('UserModel')->deleteUser($id) > 0) {
            $_SESSION['flash'] = 'User berhasil dihapus!';
        } else {
            $_SESSION['flash'] = 'User gagal dihapus!';
        }
        header('Location: ' . BASE_URL . '/admin/users');
        exit;
    }
}