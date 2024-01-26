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

    public function modifyPP(User $user, string $newPP): void
    {
        $sql = "UPDATE user SET profilePicture = :newPP WHERE id = :userId";
        $result = $this->db->query($sql, [
            ":newPP"=> $newPP, 
            ":userId"=> $user->getId()
        ]);
    } 

    public function modifyUser( User $newUser, int $userId): bool
    {
        $sql = "UPDATE user SET username = :newUsername, password = :newPassword, email = :newEmail WHERE id = :userId";
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
        $sql = "SELECT * FROM user WHERE email = :email AND id != :userId";
        $result = $this->db->query($sql, [
            ":email"=> $email,
            ":userId"=> $userId
        ]);
        return $result->rowCount() > 0;
    }

}