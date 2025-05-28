<?php

class Reviews extends Controller
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rental_id  = $_POST['rental_id'];
            $user_id    = $_SESSION['user_id'];
            $console_id = $_POST['console_id'];
            $rating     = $_POST['rating'];
            $comment    = $_POST['comment'];

            $result = $this->model('ReviewsModel')->addReview($rental_id, $user_id, $console_id, $rating, $comment);

            if ($result) {
                header('Location: ' . BASE_URL . '/orders?review=success');
                exit;
            } else {
                header('Location: ' . BASE_URL . '/orders?review=fail');
                exit;
            }
        } else {
            header('Location: ' . BASE_URL . '/orders');
            exit;
        }
    }
}