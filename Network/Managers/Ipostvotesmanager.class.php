<?php

require_once("../../Models/postvotes.class.php");

/**
 * Interface IPostVotesManager for the PostVotesManager class
 * @author Lakhdar Gibril
 */
interface IPostVotesManager {

    /**
     * Methods which allow to create a new PostVotes in the database
     * @param PostVotes $postvotes : PostVotes object to create
     * @author Lakhdar Gibril
     */
    public function Create(PostVotes $postvotes);

    /**
     * Allow to delete an existing postvotes in the database
     * @param PostVotes $pollvotes : PostVotes object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(PostVotes $postvotes);

    /**
     * Allow to update an existing postvotes in the database
     * @param PostVotes $postvotes : updated Postvotes object
     * @author Lakhdar Gibril
     */
    public function Modify(PostVotes $postvotes);

    /**
     * Allow to get a postvotes based on his id
     * @param int $id : the id of the specified postvotes
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : PostVotes;

    /**
     * Allow to get all the existing PostVotes in the database
     * @return array an array of PostVotes
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;

}
?>