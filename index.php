<?php 

require_once("./config/config.php");
require_once("./config/autoload.php");

$action = $action = isset($_GET['action']) ? $_GET['action'] : 'home';

// Vérifiez si une action est spécifiée dans l'URL
try {
    switch($action) {
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'register':
            $userController = new UserController();
            $userController->showRegistering();
            break;

        default:
            // Gérez les actions non reconnues ici
            break;
    } 
} catch (Exception $e) {
    echo $e->getMessage();
}
