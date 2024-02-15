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

    public function getLastMessage(int $idAuteur, array $contacts): ?array{

        $sql = <<<SQL
            SELECT
                CONCAT(
                    GREATEST(message.id_recipient, message.id_autor),
                        "-", 
                    LEAST(message.id_recipient, message.id_autor)
                ) AS uniqueId, message.*
            FROM message
            INNER JOIN (
                        SELECT user.id
                        FROM user 
                        INNER JOIN(
                            SELECT id_autor AS userId FROM message WHERE id_recipient = :id_recipient
                            UNION
                            SELECT id_recipient userId FROM message WHERE id_autor = :id_autor
                        ) AS tmp ON user.id = tmp.userId
            ) AS contact
            ON ( message.id_recipient = contact.id 
                OR message.id_autor = contact.id)
            AND (message.id_recipient = :id_recipient
                OR message.id_autor = :id_autor)
            GROUP BY 1
            ORDER BY message.date DESC;
        SQL;

        $lastMessages = [];
        
        foreach($contacts as $contact){
            $result = $this->db->query($sql, [
                ':id_autor'=> $idAuteur,
                ':id_recipient'=> $contact->getId()
            ]);
            $message =  $result->fetch(PDO::FETCH_ASSOC);

            if($message){
                $lastMessages[] = new Message($message);
            }
            $result->closeCursor();
        }
        return $lastMessages;
    }
}