<?php

class UserManager extends AbstractEntityManager
{
    public function registerUser(string $username, string $password, string $email): bool	
    {
        $sql = "INSERT INTO user (username, password, email) VALUES (:username, :password, :email)";
        $result = $this->db->query($sql, [$username, $password, $email]);
        return $result->rowCount() > 0;
    }
}