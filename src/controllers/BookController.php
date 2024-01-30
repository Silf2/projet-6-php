<?php

Class BookController extends AbstractController{
    public function showHome() : void {
        $view = new View("Accueil");
        $view->render("home");
    }

    public function showFormAddBook(): void {
        $this->checkIfUserIsConnected();

        $view = new View("Ajouter un livre");
        $view->render("addBook");
    }

    public function addBook(): void {
        $idUser = $_SESSION['id_user'];
        $title = htmlspecialchars($_POST['title']);
        $autor = htmlspecialchars($_POST['autor']);
        $comment = htmlspecialchars($_POST['comment']);
        $disponibility = htmlspecialchars($_POST['disponibility']);

        if (!isset($_FILES['bookPicture']) || empty($title) || empty($autor) || empty($comment)) {
            throw new Exception("Tous les champs doivent être remplis");
        }
        $uploadDirectory = 'src/images/bookCover/';
            
        $uploadFileName = $uploadDirectory . basename($_FILES['bookPicture']['name']);
    
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        $fileExtension = strtolower(pathinfo($uploadFileName, PATHINFO_EXTENSION));
    
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo 'Seuls les fichiers JPG, JPEG et PNG sont autorisés.';
        } else {
            if (move_uploaded_file($_FILES['bookPicture']['tmp_name'], $uploadFileName)) {
                $picture = $uploadFileName;
            } else {
                echo 'Erreur lors de l\'upload du fichier.';
            }
        }

        $book = new Book([
            'idUser'=> $idUser,
            'picture'=> $picture,
            'title'=> $title,
            'autor'=> $autor,
            'comment'=> $comment,
            'disponibility'=> $disponibility
        ]);

        $bookManager = new BookManager();
        $bookManager->addBook($book);

        header('Location: ?action=profile');
    }   
    
    public function deleteBook(){
        $this->checkIfUserIsConnected();
        $idBook = $_GET['id'];
        $idUser = $_SESSION['id_user'];

        $bookManager = new Bookmanager();
        $book = $bookManager->getBookById($idBook);

        if(!$book){
            throw new Exception('Une erreure est survenue');
        }

        if($book->getIdUser() == $idUser){
            $bookManager->deleteBook($book);
            header('Location: ?action=profile');
        } else{
            throw new Exception("Vous ne possédez pas le livre que vous essayez de supprimer.");
        }
    }
}