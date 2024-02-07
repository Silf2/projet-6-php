<?php

class MessageController extends AbstractController{

    /*public function __construct() {
        parent::__construct();
        $this->checkIfUserIsConnected();
    }*/

    public function message(): void{
        $contacts = (new UserManager())->getAllMessagerieUser($_SESSION['id_user']);

        $view = new View("Messagerie");
        $view->render("messaging", ["contacts"=> $contacts]);
    }

    public function messageDestinataire(int $destinataireId): void{
        $user = $this->denyAccessUserNotFound($destinataireId);

        $contacts = (new UserManager())->getAllMessagerieUser($_SESSION['id_user']);
        $messages = (new MessageManager())->getAllMessages($_SESSION['id_user'], $destinataireId);
        //$lastMessage = (new MessageManager())->getLastMessage($_SESSION['id_user'], $destinataireId);

        $view = new View("Messagerie");
        $view->render(
            "messaging", 
            [   
                "contacts" => $contacts,
                "user" => $user, 
                "messages" => $messages,
                "userId" => $_SESSION['id_user'] ?? null, 
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