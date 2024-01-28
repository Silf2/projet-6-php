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
    public function showProfile() : void
    {
        $this->checkIfUserIsConnected();
        $user = $_SESSION['user'];

        $view = new View("Mon Compte");
        $view->render("profile", ["user"=> $user]);
    }

    public function showOtherUserProfile() : void
    {
        $username = $_GET["username"];
        
        if(isset($_SESSION['user']) && ($_SESSION['user']->getUsername() == $username))
        {
            $this->showProfile();
            die;
        }

        $userManager = new UserManager();
        $user = $userManager->getUserByUsername($username);
        if (!$user){
            throw new Exception('Aucun utilisateur ne s\'appel comme ça.');
        }
        $view = new View("Profile de $username");
        $view->render("otherProfile", ["user"=> $user]);
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

        $userManager->createUser($user);

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

        header('Location: ?action=profile');
    }

    public function disconnectUser() : void
    {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    private function checkIfUserIsConnected() : void
    {
        if(!isset($_SESSION['user'])){
            header('Location: ?action=register');
        }
    }

    public function modifyPP() : void
    {
        $user = $_SESSION['user'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profilePicture'])) {
            $uploadDirectory = 'src/images/profilePicture/';
            
            $uploadFileName = $uploadDirectory . basename($_FILES['profilePicture']['name']);
        
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            $fileExtension = strtolower(pathinfo($uploadFileName, PATHINFO_EXTENSION));
        
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo 'Seuls les fichiers JPG, JPEG et PNG sont autorisés.';
            } else {
                if (move_uploaded_file($_FILES['profilePicture']['tmp_name'], $uploadFileName)) {
                    $userManager = new UserManager();
                    $userManager->modifyPP($user, $uploadFileName);
                    $_SESSION['user']->setProfilePicture($uploadFileName);
                    header('Location: ?action=profile');
                } else {
                    echo 'Erreur lors de l\'upload du fichier.';
                }
            }
        }
    }

    public function modifyUser() : void
    {
        $this->checkIfUserIsConnected();
        $idUser = $_SESSION['id_user'];

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
        $newUser = new User([
            'username'=> $username,
            'password'=> $password,
            'email'=> $email
        ]);
        if($userManager->checkIfUserEmailExist($newUser->getEmail(), $idUser)){
            throw new Exception('Un utilisateur avec cette adresse mail existe déjà.');
        }
        $userManager->modifyUser($newUser, $idUser);
        $_SESSION['user']->setUsername($username);
        $_SESSION['user']->setPassword($password);
        $_SESSION['user']->setEmail($email);
        header('Location: ?action=profile');
    }
}