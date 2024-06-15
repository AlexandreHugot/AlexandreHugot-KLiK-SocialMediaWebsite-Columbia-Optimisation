<?php

require_once("../database.class.php");
require_once("Iconversationmanager.class.php");
require_once("usermanager.class.php");

class ConversationManager extends Database implements IConversationManager {

    public function Create(Conversation $conversation){
        $query = "INSERT INTO conversation(id,user_one,user_two) VALUES (?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $conversation->getId(),
            $conversation->getUserOne()->getIdUsers(),
            $conversation->getUserTwo()->getIdUsers()
        ));
    }

    public function Delete(Conversation $conversation){
        $query = "DELETE FROM conversation WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $conversation->getId()
        ));
    }

    public function Modify(Conversation $conversation){
        $query = "UPDATE conversation SET user_one = ?, user_two = ?
                  WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $conversation->getUserOne()->getIdUsers(),
            $conversation->getUserTwo()->getIdUsers(),
            $conversation->getId()
        ));
    }

    public function GetById(int $id) : Conversation{
        $conversation = new Conversation();
        $query = "SELECT * FROM conversation WHERE id = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true){
            $uManager = new UserManager(); 
            $userOne = $uManager->GetById(intval($result['user_one']));
            $userTwo = $uManager->GetById(intval($result['user_two']));

            $data = array(
                'Id' => intval($result['id']),
                'UserOne' => $userOne,
                'UserTwo' => $userTwo
            );
            
            $conversation->hydrate($data);
        }
        return $conversation;
    }

    public function GetAll() : array{
        $query = "SELECT * FROM conversation";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>