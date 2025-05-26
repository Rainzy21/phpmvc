<?php
// Ini untuk controller admin dashboard
class Console extends Controller
{
    private $model;

    public function __construct()
    {
        require_once '../app/models/ConsoleModel.php';
        $this->model = new ConsoleModel();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Konsol';
        $data['active_menu'] = 'console';
        $data['consoles'] = $this->model->getAllConsoles();
        $this->view('templates/admin_header', $data);
        $this->view('admin/console/index', $data);
        $this->view('templates/admin_footer');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['consoleName'],
                'brand' => $_POST['consoleBrand'], // Ganti 'consoleCategory' menjadi 'consoleBrand' sesuai field di form
                'description' => '', // tambahkan jika ada field deskripsi di form
                'price_per_day' => $_POST['consolePrice'],
                'stock' => $_POST['consoleStock'],
                'image' => ''
            ];

            // Handle upload gambar
            if (isset($_FILES['consoleImage']) && $_FILES['consoleImage']['error'] === UPLOAD_ERR_OK) {
                $targetDir = 'uploads/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                $fileName = uniqid() . '_' . basename($_FILES['consoleImage']['name']);
                $targetFile = $targetDir . $fileName;
                if (move_uploaded_file($_FILES['consoleImage']['tmp_name'], $targetFile)) {
                    $data['image'] = $targetFile;
                }
            }

            $this->model->add($data);
            header('Location: ' . BASE_URL . '/admin/console');
            exit;
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['consoleName'],
                'brand' => $_POST['consoleBrand'], 
                'description' => '', // tambahkan jika ada field deskripsi di form
                'price_per_day' => $_POST['consolePrice'],
                // Jika stok tidak boleh diubah saat edit, hapus baris di bawah
                'stock' => $_POST['consoleStock'],
                'image' => ''
            ];

            // Handle upload gambar baru (opsional)
            if (isset($_FILES['consoleImage']) && $_FILES['consoleImage']['error'] === UPLOAD_ERR_OK) {
                $targetDir = 'uploads/';
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                $fileName = uniqid() . '_' . basename($_FILES['consoleImage']['name']);
                $targetFile = $targetDir . $fileName;
                if (move_uploaded_file($_FILES['consoleImage']['tmp_name'], $targetFile)) {
                    $data['image'] = $targetFile;
                }
            } else {
                // Jika tidak upload gambar baru, gunakan gambar lama
                $old = $this->model->getById($id);
                $data['image'] = $old['image'];
            }

            $this->model->update($id, $data);
            header('Location: ' . BASE_URL . '/admin/console');
            exit;
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->delete($id);
            header('Location: ' . BASE_URL . '/admin/console');
            exit;
        }
    }
}

