<?php

require_once("user.class.php");

/**
 * Class which represent a poll made by a user
 * @author Lakhdar Gibril
 */
class Poll {

    /**
     * ----------- Attributes -----------
    */
    private int $id = 0;
    private string $subject;
    private date $created;
    private date $modified;
    private int $status;
    private User $created_by;
    private string $poll_desc;
    private int $locked;
    
    /**
     * ----------- Properties -----------
    */

    /**
     * Get the poll ID.
     * @return int The ID of the poll.
     * @author Lakhdar Gibril
    */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Set the poll ID.
     * @param int $id The ID of the poll.
     * @author Lakhdar Gibril
    */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the subject of the poll.
     * @return string The subject of the poll.
     * @author Lakhdar Gibril
    */
    public function getSubject(): string
    {
        return $this->subject;
    }
    /**
     * Set the subject of the poll.
     * @param string $subject The subject of the poll.
     * @author Lakhdar Gibril
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * Get the creation date of the poll.
     * @return date The creation date of the poll.
     * @author Lakhdar Gibril
    */
    public function getCreated(): date
    {
        return $this->created;
    }
    /**
     * Set the creation date of the poll.
     * @param string $created The creation date of the poll.
     * @author Lakhdar Gibril
    */
    public function setCreated(string $created): void
    {
        $this->created = date_create($created);
    }

    /**
     * Get the last modified date of the poll.
     * @return date The last modified date of the poll.
     * @author Lakhdar Gibril
    */
    public function getModified() : date
    {
        return $this->modified;
    }
    /**
     * Set the last modified date of the poll.
     * @param string $modified The last modified date of the poll.
     * @author Lakhdar Gibril
    */
    public function setModified(string $modified): void
    {
        $this->modified = date_create($modified);
    }

    /**
     * Get the status of the poll.
     * @return int The status of the poll.
     * @author Lakhdar Gibril
    */
    public function getStatus(): int
    {
        return $this->status;
    }
    /**
     * Set the status of the poll.
     * @param int $status The status of the poll.
     * @author Lakhdar Gibril
    */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * Get the user who created the poll.
     * @return User The user who created the poll.
     * @author Lakhdar Gibril
    */
    public function getCreatedBy(): User
    {
        return $this->created_by;
    }
    /**
     * Set the user who created the poll.
     *
     * @param User $created_by The user who created the poll.
     * @author Lakhdar Gibril
     */
    public function setCreatedBy(User $created_by): void
    {
        $this->created_by = $created_by;
    }

    /**
     * Get the description of the poll.
     * @return string The description of the poll.
     * @author Lakhdar Gibril
    */
    public function getPollDesc(): string
    {
        return $this->poll_desc;
    }
    /**
     * Set the description of the poll.
     * @param string $poll_desc The description of the poll.
     * @author Lakhdar Gibril
    */
    public function setPollDesc(string $poll_desc): void
    {
        $this->poll_desc = $poll_desc;
    }

    /**
     * Get the lock status of the poll.
     * @return int The lock status of the poll.
     * @author Lakhdar Gibril
    */
    public function getLocked(): int
    {
        return $this->locked;
    }
    /**
     * Set the lock status of the poll.
     * @param int $locked The lock status of the poll.
     * @author Lakhdar Gibril
    */
    public function setLocked(int $locked): void
    {
        $this->locked = $locked;
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