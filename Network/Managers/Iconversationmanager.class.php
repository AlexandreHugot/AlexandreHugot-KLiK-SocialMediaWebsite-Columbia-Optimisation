<?php

require_once("../../Models/conversation.class.php");

/**
 * An interface for the ConversationManager class
 * @author Lakhdar Gibril
 */
interface IConversationManager {

    /**
     * Method which allow to create a Conversation in the database
     * @param Conversation $conversation : Conversation object to insert
     * @author Lakhdar Gibril
     */
    public function Create(Conversation $conversation);

    /**
     * Method which allow to delete a Conversation in the database
     * @param Conversation $conversation : Conversation object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(Conversation $conversation); 

    /**
     * Method which allow to update a Conversation in the database
     * @param Conversation $conversation : updated Conversation object
     * @author Lakhdar Gibril
     */
    public function Modify(Conversation $conversation);

    /**
     * Method which allow to get a Conversation thanks to an id
     * @param int $id : identifier of the Conversation
     * @return Conversation a Conversation object of the specifier identifier
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : Conversation;

    /**
     * Method which allow to get all the existing Conversation
     * @return array an array of Conversation
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;

}
?>