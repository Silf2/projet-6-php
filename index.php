<?php 

require_once("./src/config/autoload.php");
require_once("./src/config/config.php");

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
        case 'profile':
            $userController = new UserController();
            $userController->showProfile();
            break;
        case 'otherProfile':
            $userController = new UserController();
            $userController->showOtherUserProfile();
            break;
        case 'formAddBook':
            $bookController = new BookController();
            $bookController->showFormAddBook();
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
        case 'modifyPP':
            $userController = new UserController();
            $userController->modifyPP();
            break;
        case 'modifyUser':
            $userController = new UserController();
            $userController->modifyUser();
            break;
        case 'addBook':
            $bookController = new BookController();
            $bookController->addBook();
            break;
        case 'deleteBook':
            $bookController = new BookController();
            $bookController->deleteBook();
            break;
        default:
            // Gérez les actions non reconnues ici
            break;
    } 
} catch (Exception $e) {
    echo $e->getMessage();
}
