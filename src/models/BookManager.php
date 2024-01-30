<?php 

class BookManager extends AbstractEntityManager{
    public function addBook(Book $book): bool
    {
        $sql = "INSERT INTO book (id_user, picture, title, autor, comment, disponibility) VALUES (:id_user, :picture, :title, :autor, :comment, :disponibility)";
        $result = $this->db->query($sql, [
            ':id_user'=> $book->getIdUser(),
            ':picture'=> $book->getPicture(),
            ':title'=> $book->getTitle(),
            ':autor'=> $book->getAutor(),
            ':comment'=> $book->getComment(),
            ':disponibility'=> $book->getDisponibility()
        ]);
        return $result->rowCount() > 0;
    }

    public function getAllBooksByUser(User $user): array
    {
        $sql = "SELECT * FROM book WHERE id_user = :id_user";
        $result = $this->db->query($sql, [':id_user'=> $user->getId()]);
        $books = [];

        while ($book = $result->fetch()){
            $books[] = new Book($book);
        }
        return $books;
    }

    public function getBookById(int $id) : ?Book
    {
        $sql = "SELECT * FROM book WHERE id = :id";
        $result = $this->db->query($sql, [':id'=> $id]);
        $book = $result->fetch();
        if($book){
            return new Book($book);
        }
        return null;
    }

    public function deleteBook(Book $book): bool
    {
        $sql = "DELETE FROM book WHERE id = :id";
        $result = $this->db->query($sql, [':id'=> $book->getId()]);
        return $result->rowCount() > 0;
    }
}