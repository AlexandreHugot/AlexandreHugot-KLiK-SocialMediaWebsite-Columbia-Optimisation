<?php

require_once("topic.class.php");
require_once("user.class.php");

/**
 * Class which represent a post made by a user
 * @author Lakhdar Gibril
 */
class Post {

    
    /**
     * ----------- Attributes -----------
    */
    private int $post_id = 0;
    private string $post_content;
    private date $post_date;
    private Topic $post_topic;
    private User $postBy;
    private int $post_votes;

    /**
     * ----------- Propriétés -----------
    */

    /**
     * Get the content of the post.
     * @return string The content of the post.
     * @author Lakhdar Gibril
     */
    public function getPostContent(): string
    {
        return $this->post_content;
    }
    /**
     * Set the content of the post.
     * @param string $post_content The content of the post.
     * @author Lakhdar Gibril
     */
    public function setPostContent(string $post_content): void
    {
        $this->post_content = $post_content;
    }

    /**
     * Get the date of the post.
     * @return date The date of the post.
     * @author Lakhdar Gibril
     */
    public function getPostDate(): date
    {
        return $this->post_date;
    }
    /**
     * Set the date of the post.
     * @param date $post_date The date of the post.
     * @author Lakhdar Gibril
     */
    public function setPostDate(date $post_date): void
    {
        $this->post_date = $post_date;
    }

    /**
     * Get the topic associated with the post.
     * @return Topic The topic associated with the post.
     * @author Lakhdar Gibril
     */
    public function getPostTopic(): Topic
    {
        return $this->post_topic;
    }
    /**
     * Set the topic associated with the post.
     * @param Topic $post_topic The topic associated with the post.
     * @author Lakhdar Gibril
     */
    public function setPostTopic(Topic $post_topic): void
    {
        $this->post_topic = $post_topic;
    }

    /**
     * Get the user who created the post.
     * @return User The user who created the post.
     * @author Lakhdar Gibril
     */
    public function getPostBy(): User
    {
        return $this->postBy;
    }
    /**
     * Set the user who created the post.
     * @param User $postBy The user who created the post.
     * @author Lakhdar Gibril
    */
    public function setPostBy(User $postBy): void
    {
        $this->postBy = $postBy;
    }

    /**
     * Get the number of votes the post has received.
     * @return int The number of votes the post has received.
     * @author Lakhdar Gibril
     */
    public function getPostVotes(): int
    {
        return $this->post_votes;
    }
    /**
     * Set the number of votes the post has received.
     * @param int $post_votes The number of votes the post has received.
     * @author Lakhdar Gibril
    */
    public function setPostVotes(int $post_votes): void
    {
        $this->post_votes = $post_votes;
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