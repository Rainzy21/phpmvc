<?php

// Ini untuk router ke halaman admin jika tidak ada controller yang ditemukan
class Admin extends Controller
{
    public function __construct()
    {
        // Cek autentikasi admin untuk semua method
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
    }

    public function index()
    {
        header('Location: ' . BASE_URL . '/admin/dashboard');
        exit;
    }

    // Tambahkan method lain di sini, semua otomatis terproteksi
}