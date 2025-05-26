<?php
// This controller handles the home page
// It extends the base Controller class

class Rent extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Cara Sewa';
        $data['active_menu'] = 'rent';
        $this->view('templates/header', $data);
        $this->view('rent/index');
        $this->view('templates/footer');
    }
}