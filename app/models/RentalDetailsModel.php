<?php

Class RentalDetailsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Tambah data rental detail
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

    public function getRentalDetailsByRentalId($rentalId)
    {
        $query = "SELECT * FROM rental_details WHERE rental_id = :rental_id";
        $this->db->query($query);
        $this->db->bind('rental_id', $rentalId);
        return $this->db->resultSet();
    }

    public function updateRentalDetail($id, $data)
    {
        $query = "UPDATE rental_details SET console_id = :console_id, qty = :qty, price_per_day = :price_per_day, days = :days, subtotal = :subtotal WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('console_id', $data['console_id']);
        $this->db->bind('qty', $data['qty']);
        $this->db->bind('price_per_day', $data['price_per_day']);
        $this->db->bind('days', $data['days']);
        $this->db->bind('subtotal', $data['subtotal']);
        return $this->db->execute();
    }

    public function deleteRentalDetail($id)
    {
        $query = "DELETE FROM rental_details WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}