<?php

class ConnectedUserController extends AbstractController{
    public function profile() : void
    {
        $user = $_SESSION['user'];

        $userManager = new UserManager();
        $quantityOfBookPossessed = $userManager->getQuantityOfBookPossessed($user);
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooksByUser($user);

        $view = new View("Mon Compte");
        $view->render("profile", ["user"=> $user, "quantityOfBookPossessed" => $quantityOfBookPossessed, "books"=> $books]);
    }

    public function disconnectUser() : void
    {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    public function modifyPP() : void
    {
        $user = $_SESSION['user'];

        if (isset($_FILES['profilePicture'])) {
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
                    $user->setProfilePicture($uploadFileName);
                    header('Location: ?action=profile');
                } else {
                    echo 'Erreur lors de l\'upload du fichier.';
                }
            }
        }
    }

    public function modifyUser() : void
    {
        $idUser = $_SESSION['id_user'];
        $user = $_SESSION['user'];

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
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setEmail($email);
        header('Location: ?action=profile');
    }
}