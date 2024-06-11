<?php

require_once("../database.class.php");
require_once("Ipollmanager.class.php");

/**
 * Class PollManager which manage to access on polls data
 * @author Lakhdar Gibril
 */
class PollManager extends Database implements IPollManager {

    public function Create(Poll $poll) : void {

    }

    public function Delete (Poll $poll) : void {

    }

    public function Modify (Poll $poll) : void {
        
    }

    public function GetById (int $id) : Poll {

    }

    public function GetAll() : array {
        
    }
}
?>