<?php

class ReviewsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Gunakan class Database.php (PDO)
    }

    public function addReview($rental_id, $user_id, $console_id, $rating, $comment)
    {
        $this->db->query("INSERT INTO reviews (rental_id, user_id, console_id, rating, comment) 
                          VALUES (:rental_id, :user_id, :console_id, :rating, :comment)");
        $this->db->bind('rental_id', $rental_id);
        $this->db->bind('user_id', $user_id);
        $this->db->bind('console_id', $console_id);
        $this->db->bind('rating', $rating);
        $this->db->bind('comment', $comment);
        return $this->db->execute();
    }

    public function getAllReviewsWithUser()
    {
        $this->db->query("
            SELECT reviews.*, users.name AS user_name
            FROM reviews
            JOIN users ON reviews.user_id = users.id
            ORDER BY reviews.created_at DESC
            LIMIT 6
        ");
        return $this->db->resultSet();
    }
}