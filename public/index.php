<?php
// Thuis is the entry point of the application
// It initializes the application and loads the necessary files

session_start(); // Memulai session untuk aplikasi
// Memastikan session dimulai sebelum mengakses fitur yang memerlukan session

require_once '../app/init.php';

$app = new App();


//**Tujuannya:**  
// Agar fitur session (seperti login, menyimpan data user, dsb) bisa digunakan di seluruh aplikasi tanpa error "session already started" atau "headers already sent".