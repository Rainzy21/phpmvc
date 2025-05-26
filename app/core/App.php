<?php
// Bootstrap the application
// This file is responsible for loading the necessary files and initializing the application
class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        $controllerPath = '../app/controllers/';
        // Cek jika ada subfolder (misal: admin/dashboard)
        if (isset($url[1]) && is_dir($controllerPath . $url[0])) {
            $controllerFile = $controllerPath . $url[0] . '/' . ucfirst($url[1]) . '.php';
            $controllerClass = ucfirst($url[1]);
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $this->controller = new $controllerClass;
                unset($url[0], $url[1]);
            } else {
                require_once $controllerPath . $this->controller . '.php';
                $this->controller = new $this->controller;
            }
        } elseif (isset($url[0]) && file_exists($controllerPath . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            require_once $controllerPath . $this->controller . '.php';
            $this->controller = new $this->controller;
            unset($url[0]);
        } else {
            require_once $controllerPath . $this->controller . '.php';
            $this->controller = new $this->controller;
        }

        // Method
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            unset($url[2]);
        } elseif (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Parameters
        $this->params = $url ? array_values($url) : [];

        // Jalankan controller & method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        // Cek apakah ada URL yang dikirimkan
        // Jika ada, ambil URL tersebut
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}