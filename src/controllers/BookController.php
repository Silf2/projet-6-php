<?php

Class BookController{
    public function home() : void {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Accueil");
        $view->render("home", ["books"=> $books]);
    }

    public function library() : void {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Bibliothèque");
        $view->render("library", ["books"=> $books]);
    }

    public function filter(): void{
        $filter = htmlspecialchars($_POST['filter']);
        
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooksByFilter($filter);

        $view = new View("Bibliothèque");
        $view->render("library", ["books"=> $books]);
    }

    public function detail(): void{
        $id = $_GET['id'];

        $bookManager = new BookManager();
        $book = $bookManager->getBookByIdForDetail($id);

        $view = new View("Detail");
        $view->render("detail", ["book"=> $book]);
    }
}