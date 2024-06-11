<?php

require_once("Ieventinfomanager.class.php");
require_once("../database.class.php");

/**
 * Class EventInfoManager to access EventInfo data
 * @author Lakhdar Gibril
 */
class EventInfoManager extends Database implements IEventInfoManager {

    public function Create(EventInfo $eventInfo){

    }

    public function Delete(EventInfo $eventInfo){

    }

    public function Modify(EventInfo $eventInfo){

    }

    public function GetById(int $id) : EventInfo {

    }

    public function GetAll() : array {

    }
}
?>