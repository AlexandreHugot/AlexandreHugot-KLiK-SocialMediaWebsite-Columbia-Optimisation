<?php

require_once('./database.class.php');

/**
 * Class which allow to get, post or update data in the database related to forums
 * @author Lakhdar Gibril
 */
class ForumApi {


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

    public function GetLimitForum(int $limit = 6) : array {
        $query = "select topic_id, topic_subject, topic_date, topic_cat, topic_by, userImg, idUsers, uidUsers, cat_name, 
                    (select sum(post_votes) from posts
                        where post_topic = topic_id) as upvotes
                            from topics, users, categories 
                                where topics.topic_by = users.idUsers
                                    and topics.topic_cat = categories.cat_id
                                        order by topic_id desc, upvotes asc 
                                            LIMIT ?";
        $result = $this->database->ExecuteNonQuery($query,array($limit))->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>