<?php
class RentalModel
{
    private $db;

    public function __construct()
    {
        // Asumsi ada Database wrapper di project-mu
        $this->db = new Database;
    }

    // Tambah data rental (ke tabel rentals)
    public function addRental($data)
    {
        $query = "INSERT INTO rentals (user_id, console_id, rent_date, return_date, total_price, status)
                  VALUES (:user_id, :console_id, :rent_date, :return_date, :total_price, :status)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('console_id', $data['console_id']);
        $this->db->bind('rent_date', $data['rent_date']);
        $this->db->bind('return_date', $data['return_date']);
        $this->db->bind('total_price', $data['total_price']);
        $this->db->bind('status', isset($data['status']) ? $data['status'] : 'pending');
        $this->db->execute();

        // Kembalikan id rental yang baru dibuat
        return $this->db->lastInsertId();
    }

    // Tambah data ke rental_details
    public function addRentalDetail($data)
    {
        $query = "INSERT INTO rental_details (rental_id, console_id, qty, price_per_day, days, subtotal)
                  VALUES (:rental_id, :console_id, :qty, :price_per_day, :days, :subtotal)";
        $this->db->query($query);
        $this->db->bind('rental_id', $data['rental_id']);
        $this->db->bind('console_id', $data['console_id']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('price_per_day', $data['price_per_day']);
        $this->db->bind('days', $data['days']);
        $this->db->bind('subtotal', $data['subtotal']);
        return $this->db->execute();
    }

    // Ambil data rental berdasarkan user (opsional)
    public function getRentalsByUser($user_id)
    {
        $this->db->query("SELECT * FROM rentals WHERE user_id = :user_id ORDER BY created_at DESC");
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    // Ambil satu rental (misal untuk detail)
    public function getRentalById($id)
    {
        $this->db->query("SELECT * FROM rentals WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Update status rental
    public function updateStatus($id, $status)
    {
        $this->db->query("UPDATE rentals SET status = :status WHERE id = :id");
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}