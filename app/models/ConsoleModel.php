<?php

class ConsoleModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllConsoles()
    {
        $this->db->query("SELECT id, image, name, brand, stock, price_per_day FROM consoles");
        return $this->db->resultSet();
    }

    public function getTotalKonsol()
    {
        $this->db->query("SELECT COUNT(*) as total FROM consoles");
        $result = $this->db->single();
        return $result ? $result['total'] : 0;
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM consoles WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $this->db->query("INSERT INTO consoles (name, brand, description, price_per_day, stock, image) VALUES (:name, :brand, :description, :price_per_day, :stock, :image)");
        $this->db->bind('name', $data['name']);
        $this->db->bind('brand', $data['brand']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('price_per_day', $data['price_per_day']);
        $this->db->bind('stock', $data['stock']);
        $this->db->bind('image', $data['image']);
        return $this->db->execute();
    }

    public function update($id, $data)
    {
        $this->db->query("UPDATE consoles SET name=:name, brand=:brand, description=:description, price_per_day=:price_per_day, image=:image WHERE id=:id");
        $this->db->bind('name', $data['name']);
        $this->db->bind('brand', $data['brand']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('price_per_day', $data['price_per_day']);
        $this->db->bind('image', $data['image']);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function delete($id)
    {
        // Hapus data terkait di rental_details
        $this->db->query("DELETE FROM rental_details WHERE console_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        // Hapus data terkait di reviews
        $this->db->query("DELETE FROM reviews WHERE console_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        // Hapus data terkait di rentals
        $this->db->query("DELETE FROM rentals WHERE console_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        // Baru hapus data di consoles
        $this->db->query("DELETE FROM consoles WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function getConsoleCatalog()
    {
        $this->db->query("SELECT id, image, name, stock, price_per_day FROM consoles");
        return $this->db->resultSet();
    }

    public function getStock($id)
    {
        $this->db->query("SELECT stock FROM consoles WHERE id = :id");
        $this->db->bind('id', $id);
        $result = $this->db->single();
        return $result ? $result['stock'] : 0;
    }
}