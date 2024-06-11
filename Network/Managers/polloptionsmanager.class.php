<?php

require_once("../database.class.php");
require_once("Ipolloptionsmanager.class.php");

/**
 * Class PollOptionsManager to access PollVotes data from the database
 * @author Lakhdar Gibril
 */
class PollOptionsManager extends Database implements IPollOptionsManager {

    public function Create(PollOptions $polloptions){

    }

    public function Delete(PollOptions $polloptions){

    }

    public function Modify(PollOptions $polloptions){

    }

    public function GetById(int $id) : PollOptions{

    }

    public function GetAll() : array {
        
    }
}

?>