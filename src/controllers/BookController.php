<?php

Class BookController extends AbstractController{
    public function showHome() : void {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Accueil");
        $view->render("home", ["books"=> $books]);
    }

    public function showLibrary() : void {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Bibliothèque");
        $view->render("library", ["books"=> $books]);
    }

    public function showLibraryWithFilter(): void{
        $filter = htmlspecialchars($_POST['filter']);
        
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooksByFilter($filter);

        $view = new View("Bibliothèque");
        $view->render("library", ["books"=> $books]);
    }

    public function showDetail(): void{
        $id = $_GET['id'];

        $bookManager = new BookManager();
        $book = $bookManager->getBookByIdForDetail($id);

        $view = new View("Detail");
        $view->render("detail", ["book"=> $book]);
    }

    public function showFormAddBook(): void {
        $this->checkIfUserIsConnected();

        $view = new View("Ajouter un livre");
        $view->render("addBook");
    }

    public function showFormEditBook(): void{
        $this->checkIfUserIsConnected();
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
        $this->checkIfUserIsConnected();
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