<?php

require_once("../database.class.php");
require_once("Ipollmanager.class.php");
require_once("usermanager.class.php");

/**
 * Class PollManager which manage to access on polls data
 * @author Lakhdar Gibril
 */
class PollManager extends Database implements IPollManager {

    public function Create(Poll $poll) : void {
        $query = "INSERT INTO polls(id, subject, created, modified, status, created_by, poll_desc, locked) 
                  VALUES (?,?,?,?,?,?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $poll->getId(),
            $poll->getSubject(),
            $poll->getCreated(),
            $poll->getModified(),
            $poll->getStatus(),
            $poll->getCreatedBy()->getIdUsers(),
            $poll->getPollDesc(),
            $poll->getLocked()
        ));
    }

    public function Delete (Poll $poll) : void {
        $query = "DELETE FROM polls WHERE id = ?";
        $result = $this->ExecuteQuery($query,array($poll->getId()));
    }

    public function Modify (Poll $poll) : void {
        $query = "UPDATE polls SET subject = ?, created = ?, modified = ?, status = ?, created_by = ?, poll_desc = ?, locked = ?
                  WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $poll->getSubject(),
            $poll->getCreated(),
            $poll->getModified(),
            $poll->getStatus(),
            $poll->getCreatedBy()->getIdUsers(),
            $poll->getPollDesc(),
            $poll->getLocked(),
            $poll->getId()
        ));
    }

    public function GetById (int $id) : Poll {
        $poll = new Poll();
        $query = "SELECT * FROM polls WHERE id = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) {
            
            $user = new UserManager()->GetById(intval($result['created_by']));
            $data = array(
                "Id" => intval($result['id']),
                "Subject" => $result['subject'],
                "Created" => $result['created'],
                "Modified" => $result['modified'],
                "Status" => $result['status'],
                "CreatedBy" => $user,
                "PollDesc" => $result['poll_desc'],
                "Locked" => $result['locked']
            )
            $poll->hydrate($data);
        }
        return $poll;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM polls";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>