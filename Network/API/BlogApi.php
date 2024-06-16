<?php

require_once('./database.class.php');
require_once('upload.inc.php');

/**
 * Class which act like an api to get the blog data from the database 
 * @author Lakhdar Gibril
 */
class BlogApi {

    /**
     * ----------- Attributes -----------
     */
    private Database $database;
    
    /**
     *  ----------- Constructor -----------
     */

    /**
     * Natural constructor which allow to create a new instance Database class
     * @param Database $base : Database object to execute the request
     * @author Lakhdar Gibril
     */
    public function __construct(Database $base){
        $this->database = $base;
    }

    /**
     * ----------- Methods -----------
     */

     /**
      * Allow to get a Blog from the database
      * @param int $id : id of the blog
      * @return array an array of data from an sql request
      * @author Lakhdar Gibril
      */
    public function GetBlog(int $id = 0) : array {
        $query = "select * from blogs, users 
                    where blog_id = ? 
                        and blogs.blog_by = users.idUsers";
        $result = $this->database->ExecuteNonQuery($query, array($id))->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Allow to get all the Blogs from the database
     * @return array an array of data from an sql request 
     * @author Lakhdar Gibril
     */
    public function GetAllBlogs() : array {
        $query = "select * from Blogs, users 
                    where blogs.blog_by = users.idUsers";
        $result = $this->database->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Allow to create a blog by checking if the title is existing or not
     * @param array $params : the data related to the blogs
     * @author Lakhdar Gibril
     */
    public function CreateBlog(array $params = []) : void {
        /// Checking if the title is existing in the database
        $query = "select blog_title from blogs where blog_title = ?";
        $exist = $this->database->ExecuteNonQuery($query,$params['btitle']);
        if ($exist->fetchColumn() == 0){
            $query = "insert into blogs(blog_title, blog_by, blog_date, blog_content, blog_img) 
                    values (?,?,?,?,?)";
            $this->database->ExecuteQuery($query,array(
                $params['btitle'],
                $params['userId'],
                date_create(),
                $params['bcontent'],
                'blog-cover.png'
            ));
        }
    }

    /**
     * Allow to delete a blog in the database
     * @param int $id : the id of the blog
     * @author Lakhdar Gibril
     */
    public function DeleteBlog(int $id = 0) : void {
        $query = "delete from blogs where blog_id = ?";
        $this->database->ExecuteQuery($query,array($id));
    }

    /**
     * Allow to get a limit of blog from the database for the index page
     * @param int $limit : the limit number of blogs
     * @return array array with data of the blogs
     * @author Lakhdar Gibril 
     */
    public function GetLimitBlog(int $limit = 6) : array {
        $query = "select * from Blogs, users 
                    where blogs.blog_by = users.idUsers
                        order by blog_id desc, blog_votes asc
                            LIMIT ?";
        $result = $this->database->ExecuteNonQuery($query,array($limit))->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>