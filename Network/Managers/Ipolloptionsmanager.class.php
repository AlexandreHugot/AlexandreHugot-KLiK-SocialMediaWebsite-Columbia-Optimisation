<?php

require_once("../../Models/polloptions.class.php");

/**
 * Interface IPollOptionsManager for the PollOptionsManager class
 * @author Lakhdar Gibril
 */
interface IPollOptionsManager {
    /**
     * Method which allow to create a PollOptions in the database
     * @param PollOptions $pollOptions : PollOptions object to insert
     * @author Lakhdar Gibril
     */
    public function Create(PollOptions $pollOptions);

    /**
     * Method which allow to delete a PollOptions in the database
     * @param PollOptions $pollOptions : PollOptions object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(PollOptions $pollOptions); 

    /**
     * Method which allow to update a PollOptions in the database
     * @param PollOptions $pollOptions : updated PollOptions object
     * @author Lakhdar Gibril
     */
    public function Modify(PollOptions $pollOptions);

    /**
     * Method which allow to get a PollOptions thanks to an id
     * @param int $id : identifier of the PollOptions
     * @return PollOptions a PollOptions object of the specifier identifier
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : PollOptions;

    /**
     * Method which allow to get all the existing PollOptions
     * @return array an array of PollOptions
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;

}

?>