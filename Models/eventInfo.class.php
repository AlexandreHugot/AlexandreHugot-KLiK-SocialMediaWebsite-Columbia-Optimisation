<?php

require_once("events.class.php");

/**
 * Class which represents the info of an event
 * @author Lakhdar Gibril
 */
class EventInfo{

    /**
     * ----------- Attributes -----------
    */
    private int $event_id = 0;
    private Events $event;
    private string $title;
    private string $headline;
    private string $description;

    /**
     * ----------- Properties -----------
    */

    /**
     * Return the value of the Event id
     * @return int the Event id
     * @author Lakhdar Gibril 
     */
    public function getEventId() : int {
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
     * Get the event object.
     * @return Events The event object.
     * @author Lakhdar Gibril
     */
    public function getEvent(): Events
    {
        return $this->event;
    }
    /**
     * Set the event object.
     * @param Events $event The event object.
     * @author Lakhdar Gibril
     */
    public function setEvent(Events $event): void
    {
        $this->event = $event;
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
     * Get the headline of the event.
     * @return string The headline of the event.
     * @author Lakhdar Gibril
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }
    /**
     * Set the headline of the event.
     * @param string $headline The headline of the event.
     * @author Lakhdar Gibril
     */
    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    /**
     * Get the description of the event.
     * @return string The description of the event.
     * @author Lakhdar Gibril
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * Set the description of the event.
     * @param string $description The description of the event.
     * @author Lakhdar Gibril
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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