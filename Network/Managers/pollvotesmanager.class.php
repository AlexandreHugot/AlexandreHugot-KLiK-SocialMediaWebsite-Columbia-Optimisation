<?php

require_once("../database.class.php");
require_once("Ipollvotesmanager.class.php");
require_once("pollmanager.class.php");
require_once("polloptionsmanager.class.php");
require_once("usermanager.class.php");

/**
 * Class PollVotesManager to access PollVotes data from the database
 * @author Lakhdar Gibril
 */
class PollVotesManager extends Database implements IPollVotesManager {

    public function Create(PollVotes $pollvotes){
        $query = "INSERT INTO poll_votes (id, poll_id, poll_option_id, vote_by) 
                  VALUES (?,?,?,?)";
        $result = $this->ExecuteQuery($query, array(
            $pollvotes->getId(),
            $pollvotes->getPoll()->getId(),
            $pollvotes->getPollOptions()->getId(),
            $pollvotes->getVoteBy()->getIdUsers()
        ));
    }

    public function Delete(PollVotes $pollvotes){
        $query = "DELETE FROM poll_votes WHERE id = ?";
        $result = $this->ExecuteQuery($query,array(
            $pollvotes->getId()
        ));
    }

    public function Modify(PollVotes $pollvotes){
        $query = "UPDATE poll_votes SET poll_id = ?, poll_option_id = ?, vote_by = ? WHERE id = ?";
        $result = $this->ExecuteQuery($query, array(
            $pollvotes->getPoll()->getId(),
            $pollvotes->getPollOptions()->getId(),
            $pollvotes->getVoteBy()->getIdUsers(),
            $pollvotes->getId()
        ))
    }

    public function GetById(int $id) : PollVotes{
        $pollvotes = new PollVotes();
        $query = "SELECT * FROM poll_votes WHERE poll_id = ?";
        $result = $this->ExecuteNonQuery($query,array($pollvotes->getPoll()->getId()))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) {
            $poll = new PollManager()->getById($result['poll_id']);
            $polloptions = new PollOptionsManager()->getById($result['poll_option_id']);
            $user = new UserManager()->getById($result['vote_by']);

            $data = array(
                'Id' => intval($result['id']),
                'Poll' => $poll,
                'PollOptions' => $polloptions,
                'VoteBy' => $user
            )

            $pollvotes->hydrate($data);
        }
        return $pollvotes;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM poll_votes";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>