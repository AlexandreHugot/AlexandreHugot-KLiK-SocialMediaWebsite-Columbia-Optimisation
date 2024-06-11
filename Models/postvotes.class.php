<?php

require_once("user.class.php");

/**
 * Class which represents votes made by a user of a poll
 * @author Lakhdar Gibril
 */
class PollVotes {

    /**
     * ----------- Attributes -----------
    */
    private int $voteId = 0;
    private int $votePost;
    private User $voteBy;
    private date $voteDate;
    private int $vote; 

    /**
     * ----------- Properties -----------
    */
    
    /**
     * Get the ID of the vote.
     * @return int The ID of the vote.
     * @author Lakhdar Gibril
     */
    public function getVoteId(): int
    {
        return $this->voteId;
    }

    /**
     * Set the ID of the vote.
     * @param int $voteId The ID of the vote.
     * @author Lakhdar Gibril
     */
    public function setVoteId(int $voteId): void
    {
        $this->voteId = $voteId;
    }

    /**
     * Get the ID of the post being voted on.
     * @return int The ID of the post being voted on.
     * @author Lakhdar Gibril
     */
    public function getVotePost(): int
    {
        return $this->votePost;
    }
    /**
     * Set the ID of the post being voted on.
     * @param int $votePost The ID of the post being voted on.
     * @author Lakhdar Gibril
     */
    public function setVotePost(int $votePost): void
    {
        $this->votePost = $votePost;
    }

    /**
     * Get the user who cast the vote.
     *
     * @return User The user who cast the vote.
     * @author Lakhdar Gibril
     */
    public function getVoteBy(): User
    {
        return $this->voteBy;
    }
    /**
     * Set the user who cast the vote.
     * @param User $voteBy The user who cast the vote.
     * @author Lakhdar Gibril
     */
    public function setVoteBy(User $voteBy): void
    {
        $this->voteBy = $voteBy;
    }

    /**
     * Get the date the vote was cast.
     * @return date The date the vote was cast.
     * @author Lakhdar Gibril
     */
    public function getVoteDate(): date
    {
        return $this->voteDate;
    }
    /**
     * Set the date the vote was cast.
     * @param date $voteDate The date the vote was cast.
     * @author Lakhdar Gibril
     */
    public function setVoteDate(date $voteDate): void
    {
        $this->voteDate = $voteDate;
    }

    /**
     * Get the value of the vote.
     * @return int The value of the vote.
     * @author Lakhdar Gibril
     */
    public function getVote(): int
    {
        return $this->vote;
    }
    /**
     * Set the value of the vote.
     * @param int $vote The value of the vote.
     * @author Lakhdar Gibril
     */
    public function setVote(int $vote): void
    {
        $this->vote = $vote;
    }

    /**
     * ----------- Methods -----------
    */
    
    /**
     * Method which allow to create a new object thanks to an array of data
     * @param array $donnees : the data to insert in the object
     * @author Lakhdar Gibril
     */
    public function hydrate(array $donnees) : void
    {
        foreach ($donnees as $key => $value)
        {
            // Getting the name of the setter method
            $method = 'set'.ucfirst($key);

            // if the given setter exist
            if (method_exists($this, $method))
            {
                // Calling the setter
                $this->$method($value);
            }
        }
    }
}
?>