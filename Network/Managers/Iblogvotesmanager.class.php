<?php

require_once("../../Models/blogvotes.class.php");

/**
 * Interface IBlogVotesManager for the BlogVotesManager class
 * @author Lakhdar Gibril
 */
interface IBlogVotesManager {

    /**
     * Allow to create a new blogvotes in the database
     * @param BlogVotes $blogvotes : BlogVotes object to insert
     * @author Lakhdar Gibril
     */
    public function Create(BlogVotes $blogvotes);

    /**
     * Allow to delete a blogvotes in the database
     * @param BlogVotes $blogvotes : BlogVotes object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(BlogVotes $blogvotes);

    /**
     * Allow to update an existing blogvotes in the database
     * @param BlogVotes $blogvotes : updated BlogVotes object
     * @author Lakhdar Gibril
     */
    public function Modify(BlogVotes $blogvotes);

    /**
     * Allow to create a new blogvotes in the database
     * @param int $id : the specified id of the BlogVotes
     * @return BlogVotes a BlogVotes object
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : BlogVotes;

    /**
     * Allow to get all the existing BlogVotes in the database
     * @return array an array of BlogVotes object
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}
?>