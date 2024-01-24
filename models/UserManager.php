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

}