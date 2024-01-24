<?php
/**
 * Contrôleur de la partie User.
 */

 class UserController {

    public function showRegistering(){
        $view = new View("Inscription");
        $view->render("register");
    }

    public function registerUser(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);

        if (empty($username) || empty($password) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Tous les champs sont obligatoires. Vérifiez que votre adresse mail est valide.');
        }
        $user = new User([
            'username'=> $username,
            'password'=> $password,
            'email'=> $email
        ]);

        $userManager = new UserManager();
        $result = $userManager->createUser($user);

        header('Location: index.php');
    }
 }