<?php
// Base Controller class
// This class can be extended by other controllers

class Controller{
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}