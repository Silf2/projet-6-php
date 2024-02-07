<?php 

require_once("./src/config/autoload.php");
require_once("./src/config/config.php");

$action = $_GET['action'] ?? 'home';

// Vérifiez si une action est spécifiée dans l'URL
try {
    switch($action) {
        // Affichage des pages
        case 'home':
        case 'library':
        case 'detail':
            $bookController = new BookController();
            $bookController->$action();
            break;
        case 'message':
            $destinataireId = $_GET['id'] ?? null;
            $action = $destinataireId ? 'messageDestinataire' : $action;
            $messageController = new MessageController();
            $messageController->$action($destinataireId);
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
        case 'formEditBook':
            $bookController = new BookController();
            $bookController->showFormEditBook();
            break;
        //Utilisation des fonctionnalités    
        case 'filter': 
            $bookController = new BookController();
            $bookController->showLibraryWithFilter();
            break;
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
        case 'editBook':
            $bookController = new BookController();
            $bookController->editBook();
            break;
        case 'deleteBook':
            $bookController = new BookController();
            $bookController->deleteBook();
            break;
        case 'sendMessage':
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;
        default:
            // Gérez les actions non reconnues ici
            break;
    } 
} catch (Exception $e) {
    echo $e->getMessage();
}
