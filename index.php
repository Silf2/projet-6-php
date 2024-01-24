<?php 

require_once("./config/config.php");
require_once("./config/autoload.php");
require_once("./views/template/main.php");

// Instanciez le contrôleur
$userController = new UserController();

// Vérifiez si une action est spécifiée dans l'URL
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch($action) {
        case 'registerUser':
            // Appelez la fonction registerUser du UserController
            $userController->registerUser();
            break;
        // Ajoutez d'autres cas d'action au besoin
        default:
            // Gérez les actions non reconnues ici
            break;
    }
}
