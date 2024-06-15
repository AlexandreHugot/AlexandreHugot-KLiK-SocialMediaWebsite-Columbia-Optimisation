<?php 

require_once("category.class.php");
require_once("user.class.php");

/**
 * Class which represent a topic for a Blog
 * @author Lakhdar Gibril
 */
class Topic {

    /**
     * ----------- Attributes -----------
    */
    private int $topic_id = 0;
    private string $topic_subject;
    private date $topic_date;
    private Category $topic_cat;
    private User $topic_by;

    
    /**
     * ----------- Properties -----------
    */

    /**
     * Get the ID of the topic.
     * @return int The ID of the topic.
     * @author Lakhdar Gibril
    */
    public function getTopicId(): int
    {
        return $this->topic_id;
    }
    /**
     * Set the ID of the topic.
     * @param int $topic_id The ID of the topic.
     * @author Lakhdar Gibril
     */
    public function setTopicId(int $topic_id): void
    {
        $this->topic_id = $topic_id;
    }

    /**
     * Get the subject of the topic.
     * @return string The subject of the topic.
     * @author Lakhdar Gibril
     */
    public function getTopicSubject(): string
    {
        return $this->topic_subject;
    }
    /**
     * Set the subject of the topic.
     * @param string $topic_subject The subject of the topic.
     * @author Lakhdar Gibril
     */
    public function setTopicSubject(string $topic_subject): void
    {
        $this->topic_subject = $topic_subject;
    }

    /**
     * Get the date the topic was created.
     * @return date The date the topic was created.
     * @author Lakhdar Gibril
     */
    public function getTopicDate(): date
    {
        return $this->topic_date;
    }
    /**
     * Set the date the topic was created.
     * @param string $topic_date The date the topic was created as a string.
     * @author Lakhdar Gibril
     */
    public function setTopicDate(string $topic_date): void
    {
        $this->topic_date = date_create($topic_date);
    }

    /**
     * Get the category associated with the topic.
     * @return Category The category associated with the topic.
     * @author Lakhdar Gibril
     */
    public function getTopicCat(): Category
    {
        return $this->topic_cat;
    }
    /**
     * Set the category associated with the topic.
     * @param Category $topic_cat The category associated with the topic.
     * @author Lakhdar Gibril
     */
    public function setTopicCat(Category $topic_cat): void
    {
        $this->topic_cat = $topic_cat;
    }

    /**
     * Get the user who created the topic.
     * @return User The user who created the topic.
     * @author Lakhdar Gibril
     */
    public function getTopicBy(): User
    {
        return $this->topic_by;
    }
    /**
     * Set the user who created the topic.
     * @param User $topic_by The user who created the topic.
     * @author Lakhdar Gibril
     */
    public function setTopicBy(User $topic_by): void
    {
        $this->topic_by = $topic_by;
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