<?php

class AbstractController{
    public function checkIfUserIsConnected() : void
    {
        if(!isset($_SESSION['user'])){
            header('Location: ?action=register');
        }
    }
}