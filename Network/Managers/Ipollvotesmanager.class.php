<?php

require_once("../../Models/pollvotes.class.php");

/**
 * Interface IPollVotesManager for the PollVotesManager class
 * @author Lakhdar Gibril
 */
interface IPollVotesManager {
    /**
     * Method which allow to create a PollVotes in the database
     * @param PollVotes $pollVotes : PollVotes object to insert
     * @author Lakhdar Gibril
     */
    public function Create(PollVotes $pollVotes);

    /**
     * Method which allow to delete a PollVotes in the database
     * @param PollVotes $pollVotes : PollVotes object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(PollVotes $pollVotes); 

    /**
     * Method which allow to update a PollVotes in the database
     * @param PollVotes $pollVotes : updated PollVotes object
     * @author Lakhdar Gibril
     */
    public function Modify(PollVotes $pollVotes);

    /**
     * Method which allow to get a PollVotes thanks to an id
     * @param int $id : identifier of the PollVotes
     * @return PollVotes a PollVotes object of the specifier identifier
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : PollVotes;

    /**
     * Method which allow to get all the existing PollVotes
     * @return array an array of PollVotes
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;

}

?>