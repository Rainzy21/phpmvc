<?php
// Ini untuk controller admin dashboard
class Transactions extends Controller {
    public function index() {
        $data['title'] = 'Transactions';
        $data['active_menu'] = 'transactions'; // Set active menu untuk sidebar
        $this->view('templates/admin_header', $data);
        $this->view('admin/transactions/index',); // HARUS $data
        $this->view('templates/admin_footer');
    }
}