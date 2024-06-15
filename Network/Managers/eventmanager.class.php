<?php

require_once("Ieventmanager.class.php");
require_once("../database.class.php");
require_once("usermanager.class.php");

/**
 * Class EventManager for Event data access in the database
 * @author Lakhdar Gibril
 */
class EventManager extends Database implements IEventManager {

    public function Create(Event $event){
        $query = "INSERT INTO events (event_id, event_by, title, date_created, event_date, event_image)
                  VALUES(?,?,?,?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $event->getEventId(),
            $event->getEventBy(),
            $event->getTitle(),
            $event->getDateCreated(),
            $event->getEventDate(),
            $event->getEventImage()
        ));
    }

    public function Delete(Event $event){
        $query = "DELETE FROM events WHERE event_id = ?";
        $result = $this->ExecuteQuery($query,array($event->getEventId()));
    }

    public function Modify(Event $event){
        $query = "UPDATE events SET event_by = ?, title = ?, date_created = ?, event_date = ?, event_image = ? WHERE event_id = ?";
        $result = $this->ExecuteQuery($query, array(
            $event->getEventBy(),
            $event->getTitle(),
            $event->getDateCreated(),
            $event->getEventDate(),
            $event->getEventImage(),
            $event->getEventId()
        ))
    }

    public function GetById(int $id) : Event {
        $event = new Event();
        $query = "SELECT * FROM events WHERE event_id = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) /// If the query return a result so it's true
        {
            $user = new UserManager()->GetById(intval($result['event_by']));
            $data = array (
                'EventId' => $result['event_id'],
                'EventBy' => $user,
                'Title' => $result['title'],
                'DateCreated' => $result['date_created'],
                'EventDate' => $result['event_date'],
                'EventImage' => $result['event_image']
            );
            $event->hydrate(data);
        }
        return $event;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM events";
        $result = $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>