<?php
// Thuis is the entry point of the application
// It initializes the application and loads the necessary files

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../app/init.php';

$app = new App();