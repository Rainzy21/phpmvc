<?php
// This controller handles the home page
// It extends the base Controller class

class Home extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Pertama';
        $data['active_menu'] = 'home';
        // Ambil review dari model
        $data['reviews'] = $this->model('ReviewsModel')->getAllReviewsWithUser();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}