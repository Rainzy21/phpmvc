<?php

class PaymentsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Tambah data pembayaran
    public function addPayment($rentalId, $data)
    {
        $this->db->query("INSERT INTO payments (rental_id, payment_date, amount, method, status) 
                          VALUES (:rental_id, :payment_date, :amount, :method, :status)");
        $this->db->bind('rental_id', $rentalId);
        $this->db->bind('payment_date', date('Y-m-d'));
        $this->db->bind('amount', $data['subtotal']);
        $this->db->bind('method', isset($data['payment_method']) ? $data['payment_method'] : 'transfer');
        $this->db->bind('status', 'pending');
        return $this->db->execute();
    }

    // Ambil data pembayaran berdasarkan rental_id
    public function getPaymentByRentalId($rentalId)
    {
        $this->db->query("SELECT * FROM payments WHERE rental_id = :rental_id");
        $this->db->bind('rental_id', $rentalId);
        return $this->db->single();
    }

    // Update status pembayaran
    public function updatePaymentStatus($rentalId, $status)
    {
        $this->db->query("UPDATE payments SET status = :status WHERE rental_id = :rental_id");
        $this->db->bind('status', $status);
        $this->db->bind('rental_id', $rentalId);
        return $this->db->execute();
    }

    // Hapus data pembayaran (jika dibutuhkan)
    public function deletePayment($rentalId)
    {
        $this->db->query("DELETE FROM payments WHERE rental_id = :rental_id");
        $this->db->bind('rental_id', $rentalId);
        return $this->db->execute();
    }
}