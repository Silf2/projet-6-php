<?php

class AbstractController{
    public function checkIfUserIsConnected() : void
    {
        if(!isset($_SESSION['user'])){
            header('Location: ?action=register');
        }
    }

    public function denyAccessUserNotFound($userId) : User 
    {
        $usermanager = new UserManager;
        $user = $usermanager->getUserById($userId);
        if(!$user){
            throw new Exception("L'utilisateur n'existe pas");
        }
        return $user;
    }
}