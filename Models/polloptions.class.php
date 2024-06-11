<?php

require_once("poll.class.php");

/**
 * Class which represent the options of a poll
 * @author Lakhdar Gibril
 */
class PollOptions {

    /**
     * ----------- Attributes -----------
    */
    private int $id = 0;
    private Poll $poll;
    private string $name;
    private date $created;
    private date $modified;
    private int $status;

    
    /**
     * ----------- Properties -----------
    */

    /**
     * Get the ID of the item.
     * @return int The ID of the item.
     * @author Lakhdar Gibril
    */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * Set the ID of the item.
     * @param int $id The ID of the item.
     * @author Lakhdar Gibril
    */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the poll associated with the item.
     * @return Poll The poll associated with the item.
     * @author Lakhdar Gibril
    */
    public function getPoll(): Poll
    {
        return $this->poll;
    }
    /**
     * Set the poll associated with the item.
     * @param Poll $poll The poll associated with the item.
     * @author Lakhdar Gibril
    */
    public function setPoll(Poll $poll): void
    {
        $this->poll = $poll;
    }

    /**
     * Get the name of the item.
     * @return string The name of the item.
     * @author Lakhdar Gibril
    */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * Set the name of the item.
     * @param string $name The name of the item.
     * @author Lakhdar Gibril
    */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get the creation date of the item.
     * @return date The creation date of the item.
     * @author Lakhdar Gibril
    */
    public function getCreated(): date
    {
        return $this->created;
    }
    /**
     * Set the creation date of the item.
     * @param date $created The creation date of the item.
     * @author Lakhdar Gibril
    */
    public function setCreated(date $created): void
    {
        $this->created = $created;
    }

    /**
     * Get the last modified date of the item.
     * @return date The last modified date of the item.
     * @author Lakhdar Gibril
    */
    public function getModified(): date
    {
        return $this->modified;
    }
    /**
     * Set the last modified date of the item.
     * @param date $modified The last modified date of the item.
     * @author Lakhdar Gibril
    */
    public function setModified(date $modified): void
    {
        $this->modified = $modified;
    }

    /**
     * Get the status of the item.
     * @return int The status of the item.
     * @author Lakhdar Gibril
    */
    public function getStatus(): int
    {
        return $this->status;
    }
    /**
     * Set the status of the item.
     * @param int $status The status of the item.
     * @author Lakhdar Gibril
    */
    public function setStatus(int $status): void
    {
        $this->status = $status;
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