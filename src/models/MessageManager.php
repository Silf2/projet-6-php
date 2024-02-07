<?php 

class MessageManager extends AbstractEntityManager{
    public function sendMessage(Message $message): bool{
        $sql = <<<SQL
            INSERT INTO message (content, id_autor, id_recipient, date) 
            VALUES (:content, :id_autor, :id_recipient, NOW())
        SQL;
        $result = $this->db->query($sql, [
            ':content'=> $message->getContent(),
            ':id_autor'=> $message->getIdAutor(),
            ':id_recipient'=> $message->getIdRecipient(),
        ]);
        return $result->rowCount() > 0;
    }

    public function getAllMessages(int $idAuteur, int $idDestinataire): array{
        $sql = <<<SQL
            SELECT * 
            FROM message 
            WHERE (id_autor = :id_autor AND id_recipient = :id_recipient) 
            OR (id_autor = :id_recipient AND id_recipient = :id_autor)
        SQL;
        $result = $this->db->query($sql, [
            ':id_autor'=> $idAuteur,
            ':id_recipient'=> $idDestinataire
        ]);
        $messages = [];

        while ($message = $result->fetch()){
             $messages[] = new Message($message);
        }
        return $messages;
    }

    public function getLastMessage(int $idAuteur, int $idDestinataire): ?Message{
        $sql = <<<SQL
            SELECT * 
            FROM message
            WHERE id_autor = :id_autor AND id_recipient = :id_recipient 
            OR id_autor = :id_recipient AND id_recipient = :id_autor
            ORDER BY id DESC;
            LIMIT 1;
        SQL;

        $result = $this->db->query($sql, [
            ':id_autor'=> $idAuteur,
            ':id_recipient'=> $idDestinataire
        ]);
        $message =  $result->fetch(PDO::FETCH_ASSOC);

        if($message){
            return new Message($message);
        }
        return null;
    }
}