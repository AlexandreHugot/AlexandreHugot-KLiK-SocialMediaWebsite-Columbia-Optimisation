<?php

require_once("../database.class.php");
require_once("Iconversationmanager.class.php");

class ConversationManager extends Database implements IConversationManager {

    public function Create(Conversation $conversation){

    }

    public function Delete(Conversation $conversation){

    }

    public function Modify(Conversation $conversation){

    }

    public function GetById(int $id) : Conversation{

    }

    public function GetAll() : array{

    }
}

?>