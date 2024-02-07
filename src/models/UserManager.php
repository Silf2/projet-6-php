<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool	
    {
        $sql = <<<SQL
            INSERT INTO user (username, password, email) 
            VALUES (:username, :password, :email)
        SQL;
        $result = $this->db->query($sql, [
            ':username' => $user->getUsername(), 
            ':password' => password_hash($user->getPassword(), PASSWORD_DEFAULT), 
            ':email' => $user->getEmail()
        ]);
        return $result->rowCount() > 0;
    }

    public function searchUserByUsername(string $username): bool
    {
        $sql = <<<SQL
            SELECT * 
            FROM user 
            WHERE username = :username
        SQL;
        $result = $this->db->query($sql, [
            ':username' => $username
        ]);
        $count = $result->fetch(PDO::FETCH_ASSOC);
        return $count > 0;
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = <<<SQL
            SELECT * 
            FROM user 
            WHERE email = :email
        SQL;
        $result = $this->db->query($sql, [':email' => $email]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function getUserByUsername(string $username): ?User
    {
        $sql = <<<SQL
            SELECT * 
            FROM user 
            WHERE username = :username
        SQL;
        $result = $this->db->query($sql, [':username' => $username]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function modifyPP(User $user, string $newPP): void
    {
        $sql = <<<SQL
            UPDATE user 
            SET profilePicture = :newPP 
            WHERE id = :userId
        SQL;
        $result = $this->db->query($sql, [
            ":newPP"=> $newPP, 
            ":userId"=> $user->getId()
        ]);
    } 

    public function modifyUser( User $newUser, int $userId): bool
    {
        $sql = <<<SQL
            UPDATE user 
            SET username = :newUsername, 
                password = :newPassword, 
                email = :newEmail 
            WHERE id = :userId
        SQL;
        $result = $this->db->query($sql, [
            ":newUsername" => $newUser->getUsername(),
            ":newPassword" => password_hash($newUser->getPassword(), PASSWORD_DEFAULT),
            ":newEmail" => $newUser->getEmail(),
            ":userId" => $userId
        ]);
        return $result->rowCount() > 0;
    }   

    public function checkIfUserEmailExist(string $email, int $userId): bool
    {
        $sql = <<<SQL
            SELECT * 
            FROM user 
            WHERE email = :email AND id != :userId
        SQL;
        $result = $this->db->query($sql, [
            ":email"=> $email,
            ":userId"=> $userId
        ]);
        return $result->rowCount() > 0;
    }

    public function getQuantityOfBookPossessed(User $user): int
    {
        $sql = <<<SQL
            SELECT COUNT(book.id) AS total_books 
            FROM user 
            LEFT JOIN book ON user.id = book.id_user 
            WHERE user.id = :user_id
        SQL;
        $result = $this->db->query($sql, ["user_id"=> $user->getId()]);
        $bookPossessed = $result->fetchColumn();
        return $bookPossessed;
    }

    public function getUserById(int $id): ?User{
        $sql = <<<SQL
            SELECT * 
            FROM user 
            WHERE id = :id
        SQL;
        $result = $this->db->query($sql, [
            ":id"=> $id
        ]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user);
        }
        return null;
    }

    public function getAllMessagerieUser(int $id): array{
        $sql = <<<SQL
            SELECT user.* 
            FROM user 
            INNER JOIN(
                SELECT `id_autor` AS userId FROM `message` WHERE `id_recipient` = :userId
                UNION
                SELECT `id_recipient` userId FROM message WHERE id_autor = :userId
            ) AS tmp ON user.id = tmp.userId
        SQL;
        $result = $this->db->query($sql, [
            ':userId'=> $id
        ]);
        $contacts = [];
        
        while ($contact = $result->fetch()){
            $contacts[] = new User($contact);
        }
        return $contacts;
    }
}