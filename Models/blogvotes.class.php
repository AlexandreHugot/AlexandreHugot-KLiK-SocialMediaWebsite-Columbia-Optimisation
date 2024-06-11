<?php

require_once("blog.class.php");
require_once("user.class.php");

/**
 * Class which represent a vote of a user for a blog
 * @author Lakhdar Gibril 
 */
class BlogVotes {

    /**
     * ----------- Attributes -----------
    */
    private int $voteId = 0;
    private Blog $voteBlog;
    private User $voteBy;
    private date $voteDate;
    private int $vote;

    /**
     * ----------- Properties -----------
    */

    /**
     * Return the id of the blog vote
     * @return int the id of the blog vote
     * @author Lakhdar Gibril
     */
    public function getVoteId() : int {
        return $this->voteId;
    }
    /**
     * Update the id of the blog vote
     * @param int $voteId : the new id of the blog vote
     * @author Lakhdar Gibril
     */
    public function setVoteId(int $voteId) : void {
        $this->voteId = $voteId;
    }

    /**
     * Return the blog of the vote
     * @return Blog the blog of the specified vote
     * @author Lakhdar Gibril
     */
    public function getVoteBlog() : Blog {
        return $this->voteBlog;
    }
    /**
     * Update the blog of the vote
     * @param Blog $voteBlog Blog object for the update
     * @author Lakhdar Gibril
     */
    public function setVoteBlog(Blog $voteBlog) : void {
        $this->voteBlog = $voteBlog;
    }

    /**
     * Get the User of the vote
     * @return User the user who vote for the blog
     * @author Lakhdar Gibril
     */
    public function getVoteBy() : User {
        return $this->voteBy;
    }
    /**
     * Update the author of the blog vote
     * @param User $user : user of the vote
     * @author Lakhdar Gibril
     */
    public function setVoteBy(User $user) : void {
        $this->voteBy = $user;
    }

    /**
     * Return the date of the vote
     * @return date the date of the vote
     * @author Lakhdar Gibril
     */
    public function getVoteDate() : date {
        return $this->voteDate;
    }
    /**
     * Update the date of the blog vote
     * @param date $voteDate : the date of the blog vote
     * @author Lakhdar Gibril
     */
    public function setVoteDate(date $voteDate) : void {
        $this->voteDate = $voteDate;
    }

    /**
     * Return the number of vote 
     * @return int the number of blog votes
     * @author Lakhdar Gibril
     */
    public function getVote() : int {
        return $this->$vote;
    } 
    /**
     * Update the number of votes on the blog
     * @param int $votes : the number of votes
     * @author Lakhdar Gibril
     */
    public function setVote(int $votes) : void {
        $this->vote = $votes;
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