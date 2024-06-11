<?php

require_once("../database.class.php");
require_once("Itopicmanager.class.php");

/**
 * Class TopicManager which manage to access on topics data
 * @author Lakhdar Gibril
 */
class TopicManager extends Database implements ITopicManager {

    public function Create(Topic $topic) : void {
        $this->ExecuteQuery();
    }

    public function Delete (Topic $topic) : void {
        $this->ExecuteQuery();
    }

    public function Modify (Topic $topic) : void { 
        $this->ExecuteQuery();
    }

    public function GetById (int $id) : Topic {
        $this->ExecuteNonQuery();
    }

    public function GetAll() : array {
        $this->ExecuteNonQuery();
    }
}
?>