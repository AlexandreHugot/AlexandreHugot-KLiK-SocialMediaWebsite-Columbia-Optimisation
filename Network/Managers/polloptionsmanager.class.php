<?php

require_once("../database.class.php");
require_once("Ipolloptionsmanager.class.php");
require_once("pollmanager.class.php");

/**
 * Class PollOptionsManager to access PollVotes data from the database
 * @author Lakhdar Gibril
 */
class PollOptionsManager extends Database implements IPollOptionsManager {

    public function Create(PollOptions $polloptions){
        $query = "INSERT INTO poll_options(id, poll_id, name, created, modified, status) 
                  VALUES (?,?,?,?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $polloptions->getId(),
            $polloptions->getPoll()->getId(),
            $polloptions->getName(),
            $polloptions->getCreated(),
            $polloptions->getModified(),
            $polloptions->getStatus()
        ))
    }

    public function Delete(PollOptions $polloptions){
        $query = "DELETE FROM poll_options WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $polloptions->getId()
        ))
    }

    public function Modify(PollOptions $polloptions){
        $query = "UPDATE poll_options SET poll_id = ?, name = ?, created = ?, modified = ?, status = ?
                  WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $polloptions->getPoll()->getId(),
            $polloptions->getName(),
            $polloptions->getCreated(),
            $polloptions->getModified(),
            $polloptions->getStatus(),
            $polloptions->getId()
        ))
    }

    public function GetById(int $id) : PollOptions{
        $polloptions = new PollOptions();
        $query = "SELECT * FROM poll_options WHERE id = ?";
        $result = $this->ExecuteNonQuery()->fetch(PDO::FETCH_ASSOC);
        if ($result == true) {
            $poll = new PollManager()->GetById(intval($result['poll_id']));
            $data = array(
                'Id' => intval($result['id']),
                'Poll' => $poll,
                'Name' => $result['name'],
                'Created' => $result['created'],
                'Modified' => $result['modified'],
                'Status' => $result['status'] 
            );

            $polloptions->hydrate($data);
        }
        return $polloptions;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM poll_options";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>