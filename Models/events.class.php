<?php

require_once("user.class.php");

/**
 * Class which represent an event with a name, a date made by a user
 * @author Lakhdar Gibril
 */
class Events {

    /**
     * ----------- Attributes -----------
    */
    private int $event_id = 0;
    private User $event_by;
    private string $title;
    private date $date_created;
    private date $event_date;
    private string $event_image;

    /**
     * ----------- Properties -----------
    */

    /**
     * Get the event ID.
     * @return int The ID of the event.
     * @author Lakhdar Gibril
     */
    public function getEventId(): int
    {
        return $this->event_id;
    }
    /**
     * Set the event ID.
     * @param int $event_id The ID of the event.
     * @author Lakhdar Gibril
     */
    public function setEventId(int $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * Get the user who created the event.
     * @return User The user who created the event.
     * @author Lakhdar Gibril
     */
    public function getEventBy(): User
    {
        return $this->event_by;
    }
    /**
     * Set the user who created the event.
     * @param User $event_by The user who created the event.
     * @author Lakhdar Gibril
     */
    public function setEventBy(User $event_by): void
    {
        $this->event_by = $event_by;
    }

    /**
     * Get the title of the event.
     * @return string The title of the event.
     * @author Lakhdar Gibril
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * Set the title of the event.
     * @param string $title The title of the event.
     * @author Lakhdar Gibril
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Get the creation date of the event.
     * @return date The creation date of the event.
     * @author Lakhdar Gibril
     */
    public function getDateCreated(): date
    {
        return $this->date_created;
    }
    /**
     * Set the creation date of the event.
     * @param date $date_created The creation date of the event.
     * @author Lakhdar Gibril
     */
    public function setDateCreated(date $date_created): void
    {
        $this->date_created = $date_created;
    }

    /**
     * Get the date of the event.
     * @return date The date of the event.
     * @author Lakhdar Gibril
     */
    public function getEventDate(): date
    {
        return $this->event_date;
    }
    /**
     * Set the date of the event.
     * @param date $event_date The date of the event.
     * @author Lakhdar Gibril
     */
    public function setEventDate(date $event_date): void
    {
        $this->event_date = $event_date;
    }

    /**
     * Get the image of the event.
     * @return string The image of the event.
     * @author Lakhdar Gibril
     */
    public function getEventImage(): string
    {
        return $this->event_image;
    }
    /**
     * Set the image of the event.
     * @param string $event_image The image of the event.
     * @author Lakhdar Gibril
     */
    public function setEventImage(string $event_image): void
    {
        $this->event_image = $event_image;
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