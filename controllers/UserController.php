<?php
/**
 * Contrôleur de la partie User.
 */

 class UserController {

    public function showRegistering() : void{
        $view = new View("Inscription");
        $view->render("register");
    }

    public function showConnection() : void{
        $view = new View("Connexion");
        $view->render("connect");
    }

    public function registerUser() : void{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);

        if (empty($username) || empty($password) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Tous les champs sont obligatoires. Vérifiez que votre adresse mail est valide.');
        }

        $userManager = new UserManager();
        if ($userManager->searchUserByUsername($username)){
            throw new Exception('L\'utilisateur ' . $username .' existe déjà.');
        }

        $user = new User([
            'username'=> $username,
            'password'=> $password,
            'email'=> $email
        ]);

        $result = $userManager->createUser($user);

        header('Location: index.php');
    }

    public function connectUser() : void{
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Tous les champs sont obligatoires. Vérifiez que votre adresse mail est valide.');
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);
        if (!$user){
            throw new Exception('Aucun utilisateur n\'est affilié à cette adresse mail.');
        }

        if (!password_verify($password, $user->getPassword())){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            throw new Exception("Le mot de passe choisis est incorrect : $hash");
        }

        $_SESSION['user'] = $user;
        $_SESSION['id_user'] = $user->getId();

        header('Location: index.php');
    }
 }