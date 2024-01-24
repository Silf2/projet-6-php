<?php

class UserManager extends AbstractEntityManager
{
    public function createUser(User $user): bool	
    {
        $sql = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email)";
        $result = $this->db->query($sql, [
            ':username' => $user->getUsername(), 
            ':password' => $user->getPassword(), 
            ':email' => $user->getEmail()
        ]);
        return $result->rowCount() > 0;
    }
}