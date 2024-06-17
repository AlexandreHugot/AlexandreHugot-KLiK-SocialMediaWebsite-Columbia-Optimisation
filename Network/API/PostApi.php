<?php

require_once('./database.class.php');
require 'upload.inc.php';

/**
 * Class PostApi which allow to act like an API for post data or related
 * @author Lakhdar Gibril
 */
class PostApi {

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
     * Allow to get all the posts from the database thanks to a topic
     * @param string $topic : the topic of the post
     * @return array An array containing all the post Data
     * @author Lakhdar Gibril
     */
    public function GetAllPosts(string $topic) : array {
        $query = "select * from posts p, users u 
                    where p.post_topic=? 
                        and p.post_by=u.idUsers 
                            order by p.post_id";
        $result = $this->database->ExecuteNonQuery($query,array($topic))->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Allow to add a post in the database thanks to data from a form
     * @param array $params : array containing the data of the post
     * @author Lakhdar Gibril
     */
    public function CreatePost(array $params = []) : void {
        $query = "insert into posts(post_content, post_date, post_topic, post_by) 
                    values (?,?,?,?)";
        $this->database->ExecuteQuery($query,array(
            $params['reply-content'],
            date_create(),
            $params['topic'],
            $params['userId']
        ));
    }

    /**
     * Allow to delete a post in the database
     * @param int $id : id of the post to delete. 
     * @author Lakhdar Gibril
     */
    public function DeletePost(int $id = 0) : void {
        $query = "delete from posts where post_id = ?";
        $this->database->ExecuteQuery($query,array($id));
    }
}

?>