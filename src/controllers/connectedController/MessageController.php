<?php

class MessageController extends AbstractController{
    public function message(): void{
        $idUser = $_SESSION['id_user'];
        $contacts = (new UserManager())->getAllMessagerieUser($idUser);
        $lastMessages = (new MessageManager())->getLastMessage($idUser, $contacts);

        $view = new View("Messagerie");
        $view->render(
            "messaging", 
            [
                "contacts"=> $contacts,
                "lastMessages"=> $lastMessages,
            ]
        );
    }

    public function messageDestinataire(int $destinataireId): void{
        $idUser = $_SESSION['id_user'];
        $user = $this->denyAccessUserNotFound($destinataireId);

        $contacts = (new UserManager())->getAllMessagerieUser($idUser);
        $lastMessages = (new MessageManager())->getLastMessage($idUser, $contacts);
        $messages = (new MessageManager())->getAllMessages($idUser, $destinataireId);

        $view = new View("Messagerie");
        $view->render(
            "messaging", 
            [   
                "contacts" => $contacts,
                "lastMessages"=> $lastMessages,
                "user" => $user, 
                "messages" => $messages,
                "userId" => $idUser ?? null, 
                "destinataireId" => $_GET['id'] ?? null,
            ]
        );
    }

    public function sendMessage(): void{

        $content = htmlspecialchars($_POST['message']);
        $idAutor = $_SESSION['id_user'];
        $idRecipient = $_GET['id'];

        if(empty($content)){
            throw new Exception("Veuillez écrire un message");
        }

        $message = new Message([
            'content'=> $content,
            'idAutor'=> $idAutor,
            'idRecipient'=> $idRecipient
        ]);

        $messageManager = new MessageManager();
        $result = $messageManager->sendMessage($message);

        if(!$result){
            throw new Exception("Une erreur est survenue lors de l'envoit.");
        }

        header("Location: ?action=message&id=$idRecipient");
    }
}