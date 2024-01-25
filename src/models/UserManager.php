<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool	
    {
        $sql = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email)";
        $result = $this->db->query($sql, [
            ':username' => $user->getUsername(), 
            ':password' => password_hash($user->getPassword(), PASSWORD_DEFAULT), 
            ':email' => $user->getEmail()
        ]);
        return $result->rowCount() > 0;
    }

    public function searchUserByUsername(string $username): bool
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $result = $this->db->query($sql, [
            ':username' => $username
        ]);
        $count = $result->fetch(PDO::FETCH_ASSOC);
        return $count > 0;
    }

    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $this->db->query($sql, [':email' => $email]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return new User($user);
        }
        return null;
    }
}