<?php 
    $userId = $_SESSION['id_user'];
    $idDestinataire = $_GET['id'] ?? null;
?>

<div class="greyBackground messaging">
    <div class="contactContainer">
        <h1 class="titleMessaging">Messagerie</h1>
        <?php 
            foreach ($contacts as $contact) {
                if($idDestinataire == $contact->getId()){
                    echo sprintf(
                        '<a href="?action=message&id=%d" class="contactCard target">',
                        $contact->getId(),
                    );
                }
                else{
                    echo sprintf(
                        '<a href="?action=message&id=%d" class="contactCard">',
                        $contact->getId(),
                    );
                }
                echo sprintf(
                    '   <img src="%s" class="profilePictureDetail" />
                        <div class="infoContact">
                            <span class="contactName">%s</span>
                            <span class="contactTime">00:00</span>
                            <p class="contactPreviewMessage">Placeholder</p>
                        </div>    
                    </a>', 
                    $contact->getProfilePicture(),
                    $contact->getUsername(),
                    //$lastMessage->getContent(),
                );
            }
        ?>
    </div>

    <div class="messageContainer">
        <?php if(isset($idDestinataire)){ ?>
            <div class="headerMessageContainer">
                <img src="<?= $user->getProfilePicture();?>" class="profilePictureDetail" />
                <p class="messageName"><?= $user->getUsername(); ?></p>
            </div>
            <div class="messageContent" id="messageContent">
                <?php foreach($messages as $message){
                    if($message->getIdRecipient() == $userId){
                        echo sprintf(
                            '<div class="messageRecieve">
                                <span class="messageDate">00.00</span>
                                <span class="messageTime">00.00</span> 
                                <p>%s</p>
                            </div>', 
                            $message->getContent()
                        );
                    } elseif($message->getIdRecipient() == $idDestinataire) {
                        echo sprintf(
                            '<div class="messageSend">
                                <span class="messageDate">00.00</span>
                                <span class="messageTime">00.00</span> 
                                <p>%s</p>
                            </div>', 
                            $message->getContent()
                        );
                    }
                }?>
            </div>
            <form action="?action=sendMessage&id=<?= $idDestinataire; ?>"  method="post" class="sendMessage">
                <input type="text" name="message" id="message" placeholder="Tapez votre message" required />
                <button>Envoyer</button>
            </form>
        <?php } ?>    
    </div>
</div>

<script>
    const messageContent = document.getElementById("messageContent");

    window.onload = function() {
        messageContent.scrollTop = messageContent.scrollHeight;
    };
</script>