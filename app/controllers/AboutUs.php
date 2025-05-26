<?php
// This controller handles the home page
// It extends the base Controller class

class AboutUs extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Tentang Kami';
        $data['active_menu'] = 'aboutus';
        $this->view('templates/header', $data);
        $this->view('aboutus/index');
        $this->view('templates/footer');
    }
}