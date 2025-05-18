<?php
// This controller handles the home page
// It extends the base Controller class

class Home extends Controller {
    public function index() {
        // Load the home view
        $this->view('home/index');
    }
}