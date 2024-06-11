<?php

require_once("poll.class.php");
require_once("polloptions.class.php");
require_once("user.class.php");
/**
 * Class PollVotes which represents votes made by a user for a poll
 * @author Lakhdar Gibril
 */
class PollVotes {

    /**
     * ----------- Attributes -----------
    */
    private int $id = 0;
    private Poll $poll;
    private PollOptions $pollOptions;
    private User $voteBy;

    /**
     * ----------- Properties -----------
    */

    /**
     * Get the ID of the vote.
     * @return int The ID of the vote.
     * @author Lakhdar Gibril
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Set the ID of the vote.
     * @param int $id The ID of the vote.
     * @author Lakhdar Gibril
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the poll associated with the vote.
     * @return Poll The poll associated with the vote.
     * @author Lakhdar Gibril
     */
    public function getPoll(): Poll
    {
        return $this->poll;
    }
    /**
     * Set the poll associated with the vote.
     * @param Poll $poll The poll associated with the vote.
     * @author Lakhdar Gibril
     */
    public function setPoll(Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * Get the poll options associated with the vote.
     * @return PollOptions The poll options associated with the vote.
     * @author Lakhdar Gibril
     */
    public function getPollOptions(): PollOptions
    {
        return $this->pollOptions;
    }
    /**
     * Set the poll options associated with the vote.
     * @param PollOptions $pollOptions The poll options associated with the vote.
     * @author Lakhdar Gibril
     */
    public function setPollOptions(PollOptions $pollOptions): void
    {
        $this->pollOptions = $pollOptions;
    }
    /**
     * Get the user who cast the vote.
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