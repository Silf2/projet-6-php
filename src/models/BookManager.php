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

    public function editBook(Book $book, int $id): bool
    {
        if(!$book->getPicture()){
            $sql = "UPDATE book SET title = :title, autor = :autor, comment = :comment, disponibility = :disponibility WHERE id = :id";
            $result = $this->db->query($sql, [
                ':title'=> $book->getTitle(),
                ':autor'=> $book->getAutor(),
                ':comment'=> $book->getComment(),
                ':disponibility'=> $book->getDisponibility(),
                'id'=> $id
            ]);
        } else {
            $sql = "UPDATE book SET picture = :picture, title = :title, autor = :autor, comment = :comment, disponibility = :disponibility WHERE id = :id";
            $result = $this->db->query($sql, [
                ':picture'=> $book->getPicture(),
                ':title'=> $book->getTitle(),
                ':autor'=> $book->getAutor(),
                ':comment'=> $book->getComment(),
                ':disponibility'=> $book->getDisponibility(),
                'id'=> $id
            ]);
        }
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

    public function getAllBooks(): array
    {
        $sql = "SELECT b.*, u.username FROM book b JOIN user u ON b.id_user = u.id";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()){
            $newBook = new Book($book);
            $newBook->setUsername($book['username']);
            $books[] = $newBook;
        }
        return $books;
    }

    public function getAllBooksByFilter(string $filter): array
    {
        $sql = "SELECT b.*, u.username FROM book b JOIN user u ON b.id_user = u.id WHERE b.title LIKE :filter";
        $result = $this->db->query($sql, [':filter'=> '%' . $filter . '%']);
        $books = [];

        while ($book = $result->fetch()){
            $newBook = new Book($book);
            $newBook->setUsername($book['username']);
            $books[] = $newBook;
        }
        return $books;
    }

    public function getBookByIdForDetail(int $id) : ?Book
    {
        $sql = "SELECT *, u.username, u.profilePicture FROM book b JOIN user u ON b.id_user = u.id WHERE b.id = :id";
        $result = $this->db->query($sql, [':id'=> $id]);
        $book = $result->fetch();
        if($book){
            return new Book($book);
        }
        return null;
    }
}