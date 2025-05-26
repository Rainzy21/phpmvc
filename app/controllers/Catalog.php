<?php
// This controller handles the catalog page
// It extends the base Controller class

class Catalog extends Controller {
    private $consoleModel;

    public function __construct()
    {
        $this->consoleModel = $this->model('ConsoleModel');
    }

    public function index() {
        $data['title'] = 'Halaman Katalog';
        $data['active_menu'] = 'catalog'; // Set active menu untuk sidebar
        $data['consoles'] = $this->consoleModel->getConsoleCatalog();
        $this->view('templates/header', $data);
        $this->view('catalog/index', $data);
        $this->view('templates/footer');
    }
}