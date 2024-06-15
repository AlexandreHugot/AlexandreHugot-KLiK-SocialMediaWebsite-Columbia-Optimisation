<?php

require_once("Ieventinfomanager.class.php");
require_once("../database.class.php");
require_once("eventmanager.class.php");

/**
 * Class EventInfoManager to access EventInfo data
 * @author Lakhdar Gibril
 */
class EventInfoManager extends Database implements IEventInfoManager {

    public function Create(EventInfo $eventInfo){
        $query = "INSERT INTO event_info (event_id,event,title,headline,description) VALUES (?,?,?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $eventInfo->getEventId(),
            $eventInfo->getEvent()->getEventId(),
            $eventInfo->getTitle(),
            $eventInfo->getHeadline(),
            $eventInfo->getDescription() 
        ));
    }

    public function Delete(EventInfo $eventInfo){
        $query = "DELETE FROM event_info WHERE event_id = ?";
        $result = $this->ExecuteQuery($query,array($eventInfo->getEventId()));
    }

    public function Modify(EventInfo $eventInfo){
        $query = "UPDATE event_info SET title = ?, headline = ?, description = ? WHERE event_id = ?";
        $result = $this->ExecuteQuery($query,array(
            $eventInfo->getTitle(),
            $eventInfo->getHeadline(),
            $eventInfo->getDescription() 
        ))
    }

    public function GetById(int $id) : EventInfo {
        $eventInfo = new EventInfo();
        $query = "SELECT * FROM event_info WHERE event_id = ?";
        $result = $this->ExecuteNonQuery($query, array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) {

            $event = new EventManager()->GetById(intval($result['event']));

            $data = {
                'EventId' => intval($result['event_id']),
                'Event' => $event,
                'Title' => $result['title'],
                'Headline' => $result['headline'],
                'Description' => $result['description']
            };

            $eventInfo->hydrate($data);
        }
        return $eventInfo;

    }

    public function GetAll() : array {
        $query = "SELECT * FROM event_info";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>