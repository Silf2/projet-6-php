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

    public function searchUser(User $user): bool
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $result = $this->db->query($sql, [
            ':username' => $user->getUsername()
        ]);
        $count = $result->fetch(PDO::FETCH_ASSOC);
        return $count > 0;
    }
}