<?php
// This controller handles the home page
// It extends the base Controller class

class Users extends Controller {
    public function index() {
        
        $data['title'] = 'Halaman Users';
        $this->view('templates/admin_header', $data);
        $this->view('admin/users/index');
        $this->view('templates/admin_footer');
    }
}