<?php

class Auth extends Controller
{
    private $model;

    public function __construct()
    {
        require_once '../app/models/AuthModel.php';
        $this->model = new AuthModel();
    }

    // Login: tampilkan form & proses login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $result = $this->model->login($email, $password);

            if ($result['success']) {
                $_SESSION['user_id'] = $result['user']['id'];
                $_SESSION['user_name'] = $result['user']['name'];
                $_SESSION['user_email'] = $result['user']['email'];
                $_SESSION['user_role'] = $result['user']['role'];
                // Redirect ke halaman home atau dashboard sesuai role
                if ($result['user']['role'] === 'admin') {
                    header('Location: ' . BASE_URL . '/admin/dashboard');
                } else {
                    header('Location: ' . BASE_URL . '/home/index');
                }
                exit;
            } else {
                $data['title'] = 'Login';
                $data['error'] = 'Email atau password salah!';
                $this->view('auth/login', $data);
                return;
            }
        } else {
            $data['title'] = 'Login';
            $this->view('auth/login', $data);
        }
    }

    // Register: tampilkan form & proses register
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm-password'] ?? '';

            if ($password !== $confirm) {
                $data['title'] = 'Register';
                $data['error'] = 'Konfirmasi password tidak cocok!';
                $this->view('auth/register', $data);
                return;
            }

            $result = $this->model->register($name, $email, $password);
            if ($result['success']) {
                // Auto-login setelah register
                $user = $this->model->login($email, $password);
                if ($user['success']) {
                    $_SESSION['user_id'] = $user['user']['id'];
                    $_SESSION['user_name'] = $user['user']['name'];
                    $_SESSION['user_email'] = $user['user']['email'];
                    $_SESSION['user_role'] = $user['user']['role'];
                }
                // Redirect ke halaman home atau dashboard sesuai role
                if ($user['user']['role'] === 'admin') {
                    header('Location: ' . BASE_URL . '/admin/dashboard');
                } else {
                    header('Location: ' . BASE_URL . '/home/index');
                }
                exit;
            } else {
                $data['title'] = 'Register';
                $data['error'] = $result['message'] ?? 'Registrasi gagal!';
                $this->view('auth/register', $data);
                return;
            }
        } else {
            $data['title'] = 'Register';
            $this->view('auth/register', $data);
        }
    }

    // Logout
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL . '/home/index');
        exit;
    }

    public function index()
    {
        $this->login();
    }
}