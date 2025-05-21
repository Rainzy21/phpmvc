<?php
// This controller handles the home page
// It extends the base Controller class

class Home extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Utama';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}