<?php
// Ini untuk controller admin dashboard
class Dashboard extends Controller {
    public function index() {
        $data['title'] = 'Dashboard';
        $this->view('templates/admin_header', $data);
        $this->view('admin/dashboard/index');
        $this->view('templates/admin_footer');
    }
}