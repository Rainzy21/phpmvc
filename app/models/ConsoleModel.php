<?php

class ConsoleModel
{
    private $db;

    public function __construct()
    {
        // Ganti konfigurasi sesuai database kamu

        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAllConsoles()
    {
        $stmt = $this->db->query("SELECT id, image, name, brand, stock, price_per_day FROM consoles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalKonsol()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM consoles");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM consoles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data)
    {
        $stmt = $this->db->prepare("INSERT INTO consoles (name, brand, description, price_per_day, stock, image) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['brand'],
            $data['description'],
            $data['price_per_day'],
            $data['stock'],
            $data['image']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE consoles SET name=?, brand=?, description=?, price_per_day=?, image=? WHERE id=?");
        return $stmt->execute([
            $data['name'],
            $data['brand'],
            $data['description'],
            $data['price_per_day'],
            $data['image'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM consoles WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getConsoleCatalog()
    {
        $stmt = $this->db->query("SELECT id, image, name, stock, price_per_day FROM consoles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}