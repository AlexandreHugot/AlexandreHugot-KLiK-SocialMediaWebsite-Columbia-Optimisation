<?php
    require_once("Ipostvotesmanager.class.php");
    require_once("../database.class.php");
    require_once("usermanager.class.php");
    
    /**
     * Class PostVotesManager to access PostVotes data
     * @author Lakhdar Gibril
     */
    class PostVotesManager extends Database implements IPostVotesManager {
    
        public function Create(PostVotes $postVotes){
            $query = "INSERT INTO postvotes (voteId, votePost, voteBy, voteDate, vote) 
                      VALUES (?, ?, ?, ?, ?)";
            $result = $this->ExecuteQuery($query,array(
                $postVotes->getVoteId(),
                $postVotes->getVotePost(),
                $postVotes->getVoteBy()->getIdUsers(),
                $postVotes->getVoteDate(),
                $postVotes->getVote()
            ));
        }
    
        public function Delete(PostVotes $postVotes){
            $query = "DELETE FROM postvotes WHERE voteId = ?";
            $result = $this->ExecuteQuery($query,array(
                $postVotes->getVoteId()
            ));
        }
    
        public function Modify(PostVotes $postVotes){
            $query = "UPDATE postsvotes SET votePost = ?, voteBy = ?, voteDate = ?, vote = ?
                      WHERE voteId = ?";
            $result = $this->ExecuteQuery($query,array(
                $postVotes->getVotePost(),
                $postVotes->getVoteBy()->getIdUsers(),
                $postVotes->getVoteDate(),
                $postVotes->getVote(),
                $postVotes->getVoteId()
            ));
        }
    
        public function GetById(int $id) : PostVotes {
            $postVote = new PostVotes();
            $query = "SELECT * FROM postsvotes WHERE voteId = ?";
            $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
            if ($result == true) {
                $user = new UserManager()->GetById(intval($result['voteBy']));
                $data = array(
                    'VoteId' => intval($result['voteId']),
                    'VotePost' => intval($result['votePost']),
                    'VoteBy' => $user,
                    'VoteDate' => $result['voteDate'],
                    'Vote' => $result['vote']
                );
                $postVote->hydrate($data);
            }
            return $postVote;
        }
    
        public function GetAll() : array {
            $query = "SELECT * FROM postsvotes";
            return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>