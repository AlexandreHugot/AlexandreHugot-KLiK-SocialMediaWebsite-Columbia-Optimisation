<?php

require_once("../../Models/poll.class.php");

/**
 * Represent an interface for the PollManager class
 * @author Lakhdar Gibril
 */
interface IPollManager {

    /**
     * Methods allow to create a Poll object in the database
     * @param Poll $poll : the poll object to insert
     * @author Lakhdar Gibril
     */
    public function Create(Poll $poll);

    /**
     * Methods allow to delete a poll object existing in the database
     * @param Poll $poll : the poll object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(Poll $poll);

    /**
     * Methods which allow to update a poll object in the database 
     * @param Poll $poll : the poll object to modify
     * @author Lakhdar Gibril
     */
    public function Modify(Poll $poll);

    /**
     * Method which allow to get a poll thanks to the id
     * @param int $id : id of the poll
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : Poll;

    /**
     * Method which allow to get all the poll existing in the database
     * @return array an array of Poll object
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}
?>