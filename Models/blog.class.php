<?php

require_once("user.class.php");

/**
 * Class which represent a blog made by a user
 * @author Lakhdar Gibril
 */
class Blog {

    /**
     * ----------- Attributes -----------
     */
    private int $blog_id = 0; 
    private string $blog_title;
    private string $blog_img;
    private User $blog_by;
    private date $blog_date;
    private int $blog_votes;
    private string $blog_content;

    /**
     * ----------- Properties -----------
     */

    /**
     * Return the id of the blog
     * @return int blog's id
     * @author Lakhdar Gibril
     */
    public function getBlogId() : int {
        return $this->blog_id;
    }
    /**
     * Allow to update the value of the blog id with a new one
     * @param int $id : the new id of the blog (0 per default)
     * @author Lakhdar Gibril
     */
    public function setBlogId(int $id) : void {
        $this->blog_id = $id;
    }

    /**
     * Allow to get the title of the blog.
     * @return string the value of the blog title
     * @author Lakhdar Gibril
     */
    public function getBlogTitle() : string {
        return $this->blog_title;
    }
    /**
     * Allow to update the value of the blog title with a new one
     * @param string $title : the new title of the blog
     * @author Lakhdar Gibril
     */
    public function setBlogTitle(string $title) : void {
        $this->blog_title = $title;
    } 

    /**
     * Allow to get the path to the image of the blog
     * @return string the path to the image as a string
     * @author Lakhdar Gibril
     */
    public function getBlogImage() : string {
        return $this->blog_img; 
    }
    /**
     * Allow to update the path of the blog image 
     * @param string $image : the path to the image as a string
     * @author Lakhdar Gibril
     */
    public function setBlogImage(string $image) {
        $this->blog_img = $image;
    }

    /**
     * Allow to get the user who made the blog
     * @return User the user who made the blog
     * @author Lakhdar Gibril
     */
    public function getBlogBy() : User {
        return $this->blog_by; 
    } 
    /**
     * Allow to update the author of the blog
     * @param User $user : the user who made the blog
     * @author Lakhdar Gibril
     */
    public function setBlogBy(User $user) {
        $this->blog_by = $user;
    }

    /**
     * Allow to get the creation date of the blog
     * @return date the date when the blog was made
     * @author Lakhdar Gibril
     */
    public function getBlogDate() : date {
        return $this->blog_date;
    }
    /**
     * Allow to update the creation date of the blog
     * @param date $blogDate : the new creation date of the blog
     * @author Lakhdar Gibril
     */
    public function setBlogDate(date $blogDate) : void {
        $this->blog_date = $blogDate;
    }

    /**
     * Allow to get the number of vote on a blog
     * @return int the number of vote
     * @author Lakhdar Gibril
     */
    public function getBlogVotes() : int {
        return $this->blog_votes;
    }
    /**
     * Allow to update the number of vote on a blog
     * @param int $blogVotes : the number of votes on the blog
     * @author Lakhdar Gibril
     */
    public function setBlogVotes(int $blogVotes) : void {
        $this->blog_votes = $blogVotes;
    }

    /**
     * Allow to get the content of blog
     * @return string the content of the blog
     * @author Lakhdar Gibril
     */
    public function getBlogContent() : string {
        return $this->blog_content;
    }
    /**
     * Allow to update blog content
     * @param string $content : the new content of the blog
     * @author Lakhdar Gibril
     */
    public function setBlogContent(string $content) : void {
        $this->blog_content = $content;
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