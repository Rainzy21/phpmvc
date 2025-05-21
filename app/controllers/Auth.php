<?php
// This controller handles the home page
// It extends the base Controller class

class Auth extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Login';
        $this->view('auth/index', $data);
        
    }
}