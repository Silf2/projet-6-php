<?php 

require_once("./config/config.php");
require_once("./config/autoload.php");

$action = $action = isset($_GET['action']) ? $_GET['action'] : 'home';

// Vérifiez si une action est spécifiée dans l'URL
try {
    switch($action) {
        // Affichage des pages
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'register':
            $userController = new UserController();
            $userController->showRegistering();
            break;
        case 'connect':
            $userController = new UserController();
            $userController->showConnection();
            break;

        //Utilisation des fonctionnalités    
        case 'registerUser':
            $userController = new UserController();
            $userController->registerUser();
            break;    
        case 'connectUser':
            $userController = new UserController();
            $userController->connectUser();
            break;
        case 'disconnectUser':
            $userController = new UserController();
            $userController->disconnectUser();
            break;
        default:
            // Gérez les actions non reconnues ici
            break;
    } 
} catch (Exception $e) {
    echo $e->getMessage();
}
