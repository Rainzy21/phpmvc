<?php
// Ini untuk controller admin dashboard
class Console extends Controller {
    public function index() {
        $data['title'] = 'Manajemen Konsol';
        $this->view('templates/admin_header', $data);
        $this->view('admin/console/index');
        $this->view('templates/admin_footer');
    }
}