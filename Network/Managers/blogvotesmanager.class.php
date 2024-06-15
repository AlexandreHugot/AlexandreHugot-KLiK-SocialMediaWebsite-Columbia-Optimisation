<?php

require_once("Iblogvotesmanager.class.php");
require_once("../database.class.php");
require_once("blogmanager.class.php");
require_once("usermanager.class.php");

/**
 * BlogVotesManager class to access the BlogVotes data from the database
 * @author Lakhdar Gibril
 */
class BlogVotesManager extends Database implements IBlogVotesManager {

    public function Create(BlogVotes $blogvotes){
        $query = "INSERT INTO blogvotes (voteId, voteBlog, voteBy, voteDate, vote) VALUES (?,?,?,?,?)";
        $result = $this->ExecuteQuery($query, array (
            $blogvotes->getVoteId(),
            $blogvotes->getVoteBlog()->getBlogId(),
            $blogvotes->getVoteBy()->getIdUsers(),
            $blogvotes->getVoteDate(),
            $blogvotes->getVote()
        ));
    }

    public function Delete(BlogVotes $blogvotes){
        $query = "DELETE FROM blogvotes WHERE voteId = ?",
        $result = $this->ExecuteQuery($query,array($blogvotes->getVoteId()));
    }

    public function Modify(BlogVotes $blogvotes){
        $query = "UPDATE blogvotes SET voteBlog = ?, voteBy = ?, voteDate = ?, vote = ? WHERE voteId = ?";
        $result = $this->ExecuteQuery($query, array (            
            $blogvotes->getVoteBlog()->getBlogId(),
            $blogvotes->getVoteBy()->getIdUsers(),
            $blogvotes->getVoteDate(),
            $blogvotes->getVote()
            $blogvotes->getVoteId(),
        ));
    }

    public function GetById(int $id) : BlogVotes{
        $blogVotes = new BlogVotes();
        $query = "SELECT * FROM blogvotes WHERE voteId = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true){
            $blog = new BlogManager()->GetById(intval($result['voteBlog']));
            $user = new UserManager()->GetById(intval($result['voteBy']));

            $data = {
                'VoteId' => $result['voteId'],
                'VoteBlog' => $blog,
                'VoteBy' => $user,
                'VoteDate' => $result['voteDate'],
                'Vote' => $result['vote']
            };

            $blogVotes->hydrate($data);
        }

        return $blogVotes;

    }

    public function GetAll() : array{
        $query = "SELECT * FROM blogvotes";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>