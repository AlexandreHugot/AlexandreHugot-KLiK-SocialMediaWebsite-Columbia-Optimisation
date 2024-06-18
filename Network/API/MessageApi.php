<?php

require_once('Network/database.class.php');

/**
 * Class which allow to get, post or update data in the database related to messages
 * @author Lakhdar Gibril
 */
class MessageApi {
    
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
     * Allow to get messages between two users. 
     * @param array $params : containing the data about the two users and conversation
     * @return array an array containing the messages
     * @author Lakhdar Gibril
     */
    public function GetMessage(array $params = []) : array {
        $query = "select * from messages where conversation_id = ?";
        $result = $this->database->ExecuteNonQuery($query,array(base64_decode($params['c_id'])))->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Allow to post a message to someone 
     * @param array $params : an array which contains data related to the conversation
     * @author Lakhdar Gibril
     */
    public function PostMessage(array $params = []) : void {
        $query = "insert into messages(conversation_id, user_from, user_to, message) 
                    values (?,?,?,?)";
        $this->database->ExecuteQuery($query,array(
            base64_decode($params['conversation_id']),
            base64_decode($params['user_from']),
            base64_decode($params['user_to']),
            $params['message']
        ))
    }

    /**
     * Allow to create a connection between two users.
     * @param array $params : an array containing the data related to the conversation
     * @author Lakhdar Gibril
     */
    public function CreateConversation(array $params = []) : void {
        $query = "insert into conversation(user_one, user_two) 
                    values (?,?)";
        $this->database->ExecuteQuery($query,array(
            $params['userId'],
            $params['id']
        ));
    }

    /**
     * Allow to get all the conversation of a user 
     * @param int $id : id of the user connected
     * @return array an array which contains all the conversation
     * @author Lakhdar Gibril
     */
    public function GetAllConversations(int $id = 0) : array {
        $query = "select * from users where idUsers != ?";
        $result = $this->database->ExecuteNonQuery($query,$id)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>