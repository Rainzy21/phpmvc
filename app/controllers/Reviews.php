<?php
class Reviews extends Controller
{
    public function index(){
        $this->view('reviews/index',);
    }
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Proses simpan review
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
            // Ambil rental_id dan console_id dari GET
            $data['rental_id'] = $_GET['rental_id'] ?? '';
            $data['console_id'] = $_GET['console_id'] ?? '';
            $this->view('reviews/index', $data);
        }
    }
}