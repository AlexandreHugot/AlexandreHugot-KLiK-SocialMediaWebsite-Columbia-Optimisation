<?php

require_once("../../Models/eventInfo.class.php");

/**
 * Interface IEventInfoManager for the EventInfoManager class
 * @author Lakhdar Gibril
 */
interface IEventInfoManager {

    /**
     * Allow to create in the database a new eventInfo
     * @param EventInfo $eventInfo : the EventInfo object to insert
     * @author Lakhdar Gibril
     */
    public function Create(EventInfo $eventInfo);

    /**
     * Allow to delete in the database an existing eventInfo
     * @param EventInfo $eventInfo : the EventInfo object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(EventInfo $eventInfo);

    /**
     * Allow to update in the database an existing eventInfo
     * @param EventInfo $eventInfo : the EventInfo that is updated
     * @author Lakhdar Gibril
     */
    public function Modify(EventInfo $eventInfo);

    /**
     * Allow to find in the database an eventinfo thanks to an id
     * @param int $id : the specified id of the EventInfo 
     * @return EventInfo the EventInfo of the specified id
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : EventInfo;

    /**
     * Allow to get all the existing EventInfo in the database
     * @return array an array of EventInfo
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}

?>