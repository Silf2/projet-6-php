<?php

class ConnectedBookController extends AbstractController{
    public function formAddBook(): void {
        $view = new View("Ajouter un livre");
        $view->render("addBook");
    }

    public function formEditBook(): void{
        $idBook = $_GET['id'];
        $idUser = $_SESSION['id_user'];

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($idBook);

        if(!$book){
            throw new Exception('Une erreure est survenue');
        }

        if($book->getIdUser() == $idUser){
            $view = new View("Modifier un livre");
            $view->render("editBook", ["book"=> $book]);
        } else{
            throw new Exception("Vous ne possédez pas le livre que vous essayez de modifier.");
        }
    }
    public function addOrEditBook($addOrEdit): void {
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
            throw new Exception('Vérifiez que vous avez bien mis un fichier, ou que les fichiers sont enJPG, JPEG ou en PNG.');
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
        if ($addOrEdit === 'add') {
            $bookManager->addBook($book);
        } elseif ($addOrEdit === 'edit') {
            $idBook = $_GET['id'];
            $bookManager->editBook($book, $idBook);
        }

        header('Location: ?action=profile');
    }   
    
    public function addBook(){
        $this->addOrEditBook('add');
    }

    public function editBook(){
        $this->addOrEditBook('edit');
    }

    public function deleteBook(): void{
        $idBook = $_GET['id'];
        $idUser = $_SESSION['id_user'];

        $bookManager = new BookManager();
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
