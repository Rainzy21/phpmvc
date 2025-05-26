<?php
require_once __DIR__ . '/../core/Database.php';

class AuthModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection(); // $this->db sekarang adalah objek PDO
    }

    // Register user baru
    public function register($name, $email, $password)
    {
        // Cek email sudah terdaftar
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'Email sudah terdaftar'];
        }

        // Hash password
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Insert user baru
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'customer')");
        $result = $stmt->execute([$name, $email, $hashed]);

        if ($result) {
            return ['success' => true, 'message' => 'Registrasi berhasil'];
        } else {
            return ['success' => false, 'message' => 'Registrasi gagal'];
        }
    }

    // Login user
    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return [
                'success' => true,
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ]
            ];
        }

        return ['success' => false, 'message' => 'Email atau password salah'];
    }
}