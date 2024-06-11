<?php

require_once("Iblogvotesmanager.class.php");
require_once("../database.class.php");

/**
 * BlogVotesManager class to access the BlogVotes data from the database
 * @author Lakhdar Gibril
 */
class BlogVotesManager extends Database implements IBlogVotesManager {

    public function Create(BlogVotes $blogvotes){

    }

    public function Delete(BlogVotes $blogvotes){

    }

    public function Modify(BlogVotes $blogvotes){

    }

    public function GetById(int $id) : BlogVotes{

    }

    public function GetAll() : array{

    }

}
?>