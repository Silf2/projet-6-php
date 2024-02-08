<?php 

require_once("./src/config/autoload.php");
require_once("./src/config/config.php");

$action = $_GET['action'] ?? 'home';

// Vérifiez si une action est spécifiée dans l'URL
try {
    switch($action) {
        case 'home':                                                        //affichage de la page d'acceuil
        case 'library':                                                     //affichage de la bibliothèque
        case 'detail':                                                      //affichage de la page de détail des livres
        case 'filter':                                                      //utilisation de la barre de recherche de la bibliothèque
            $bookController = new BookController();
            $bookController->$action();
            break;

        case 'formAddBook':                                                 //affichage du formulaire d'ajout de livre
        case 'formEditBook':                                                //affichage du formulaire d'édition de livre
        case 'addBook':                                                     //ajout d'un livre
        case 'editBook':                                                    //modification d'un livre
        case 'deleteBook':                                                  //suppression d'un livre
            $bookController = new ConnectedBookController();
            $bookController->$action();
            break;

        case 'register':                                                    //affichage du formulaire d'inscription
        case 'connect':                                                     //affichage du formulaire de connexion
        case 'otherProfile':                                                //affichage des autres profiles
        case 'registerUser':                                                //Inscription d'un utilisateur
        case 'connectUser':                                                 //Connexion d'un utilisateur
            $userController = new UserController();
            $userController->$action();
            break;

        case 'profile':                                                     //affichage du profil de l'utilisateur connecté
        case 'disconnectUser':                                              //deconnexion de l'utilisateur
        case 'modifyPP':                                                    //modification de la photo de profil
        case 'modifyUser':                                                  //modification des autres infos du profil
            $userController = new ConnectedUserController();
            $userController->$action();
            break;

        case 'message':                                                     //affichage de la messagerie
            $destinataireId = $_GET['id'] ?? null;
            $action = $destinataireId ? 'messageDestinataire' : $action;
            $messageController = new MessageController();
            $messageController->$action($destinataireId);
            break;
        case 'sendMessage':                                                 //envoie de message
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;

        default:
            throw new Exception("La page demandée n'existe pas.");

    } 
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('error', ['errorMessage' => $e->getMessage()]);
}
