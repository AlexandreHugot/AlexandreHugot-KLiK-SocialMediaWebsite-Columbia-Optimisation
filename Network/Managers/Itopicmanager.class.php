<?php
require_once("../../Models/topic.class.php");

/**
 * Represent an interface for the TopicManager class
 * @author Lakhdar Gibril
 */
interface ITopicManager {

    /**
     * Method which allow to create a Topic object in the database
     * @param Topic $topic : Topic object to insert in the database 
     * @author Lakhdar Gibril
     */
    public function Create(Topic $topic);

    /**
     * Method which allow to delete an existing topic in the database
     * @param Topic $topic : Topic object to delete in the database
     * @author Lakhdar Gibril
     */
    public function Delete(Topic $topic);

    /**
     * Method which allow to modify an existing topic in the database
     * @param Topic $topic : Topic object to modify
     * @author Lakhdar Gibril
     */
    public function Modify(Topic $topic);

    /**
     * Method which allow to get an existing topic by his id
     * @param int $id : id of the topic to get
     * @author Lakhdar Gibril
     */
    public function GetById(int $id);

    /**
     * Method which allow to get all the existing Topic in the database
     * @return array an array of Topic objects
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}
?>