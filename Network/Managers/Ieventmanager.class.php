<?php

require_once("../../Models/events.class.php");

/**
 * Interface for the EventManager class
 */
interface IEventManager {

    /**
     * Method which allow to add an event in the database
     * @param Event $event : Event object to insert in the database
     * @author Lakhdar Gibril
     */
    public function Create(Event $event);

    /**
     * Method which allow to delete an event in the database
     * @param Event $event : Event object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(Event $event);

    /**
     * Method which allow to update in the database an existing event
     * @param Event $event : updated Event object
     * @author Lakhdar Gibril
     */
    public function Modify(Event $event);

    /**
     * Method which allow to get by an id an event
     * @param int $id : identifier of the Event
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : Event;

    /**
     * Method which allow to get all the existing Event in the database
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}

?>