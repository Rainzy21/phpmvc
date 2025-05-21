<?php

// Ini untuk router ke halaman admin jika tidak ada controller yang ditemukan
class Admin extends Controller {
    public function index() {
        header('Location: ' . BASE_URL . '/Admin/Dashboard');
        exit;
    }
}