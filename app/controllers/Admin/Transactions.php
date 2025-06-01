<?php
// Pastikan require_once sudah ada
require_once __DIR__ . '/../../models/RentalModel.php';

// Ini untuk controller admin dashboard
class Transactions extends Controller
{
    public function index()
    {
        $status = isset($_GET['status']) ? $_GET['status'] : 'all';
        $data['title'] = 'Transactions';
        $data['active_menu'] = 'transactions';
        $data['transactions'] = $this->model('RentalModel')->getAllTransactions($status);
        $data['selected_status'] = $status;
        $this->view('templates/admin_header', $data);
        $this->view('admin/transactions/index', $data);
        $this->view('templates/admin_footer');
    }

    public function confirm($rental_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('RentalModel')->updatePaymentAndRentalStatus($rental_id, 'paid');
            header('Location: ' . BASE_URL . '/admin/transactions');
            exit;
        }
        // Optional: redirect jika bukan POST
        header('Location: ' . BASE_URL . '/admin/transactions');
        exit;
    }

    public function fail($rental_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('RentalModel')->updatePaymentAndRentalStatus($rental_id, 'failed');
            header('Location: ' . BASE_URL . '/admin/transactions');
            exit;
        }
        // Optional: redirect jika bukan POST
        header('Location: ' . BASE_URL . '/admin/transactions');
        exit;
    }

    public function verify($rental_id)
    {
        $rentalModel = new RentalModel();
        $result = $rentalModel->verifyReturn($rental_id);

        if ($result) {
            // (Opsional) set flash message sukses
            header('Location: ' . BASE_URL . '/admin/transactions?success=verifikasi');
            exit;
        } else {
            // (Opsional) set flash message gagal
            header('Location: ' . BASE_URL . '/admin/transactions?error=verifikasi');
            exit;
        }
    }
}