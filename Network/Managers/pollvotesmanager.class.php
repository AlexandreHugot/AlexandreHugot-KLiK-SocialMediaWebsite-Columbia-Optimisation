<?php

require_once("../database.class.php");
require_once("Ipollvotesmanager.class.php");

/**
 * Class PollVotesManager to access PollVotes data from the database
 * @author Lakhdar Gibril
 */
class PollVotesManager extends Database implements IPollVotesManager {

    public function Create(PollVotes $pollvotes){

    }

    public function Delete(PollVotes $pollvotes){

    }

    public function Modify(PollVotes $pollvotes){

    }

    public function GetById(int $id) : PollVotes{

    }

    public function GetAll() : array {
        
    }
}
?>