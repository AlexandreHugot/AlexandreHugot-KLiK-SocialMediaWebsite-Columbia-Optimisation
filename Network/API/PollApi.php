<?php

require_once('BaseApi.php');

/**
 * Class which represent an API for the poll data
 * @author Lakhdar Gibril
 */
class PollApi extends BaseApi {

    
    /**
     *  ----------- Constructor -----------
    */

    /**
     * Natural constructor which allow to create a new instance Database class
     * @param Database $base : Database object to execute the request
     * @author Lakhdar Gibril
     */
    public function __construct(Database $base){
        parent::__construct($base);
    }
    
    /**
     *  ----------- Methods -----------
    */

    /**
     * Allow to get the poll data from the database
     * @param int $id : the id to get the poll
     * @return array the array containing the data about the poll
     * @author Lakhdar Gibril
     */
    public function GetPoll(int $id = 0) : array {
        $query = "";
    }

    /**
     * Allow to get all the polls data from the database
     * @return array return the array containing the data of all the polls
     * @author Lakhdar Gibril
     */
    public function GetAllPolls() : array {
        $query = "select p.id, p.subject, p.created, p.poll_desc, p.locked, 
                    (select count(*) 
                        from poll_votes v
                        where v.poll_id = p.id) as votes
                    from polls p 
                    order by votes desc";
        $result = $this->database->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }

    /**
     * Allow to create a poll in the database 
     * @param array $params : the data from the form to add in the database
     * @author Lakhdar Gibril
     */
    public function CreatePoll(array $params = []) : void {
        /// Verify if the subject is already existing in the database
        $query = "select subject from polls where subject=?";
        $exist = $this->database->ExecuteNonQuery($query,array($params['title']));
        if ($exist == 0){
            $query = "insert into polls(subject, created, modified, status, created_by, poll_desc, locked) 
                values (?,?,?,?,?,?,?)";
            $this->database->ExecuteQuery($query, array(
                $params['title'],
                date_create(),
                date_create(),
                1, /// Default status of the poll
                $params['userId'],
                $params['desc'],
                $params['is-locked']
            ));

            $options = $params['option'];
            $identifier = $this->database->ExecuteNonQuery("select LAST_INSERT_ID() from polls where subject = ?", array($params['title']))->fetch(PDO::FETCH_ASSOC);

            /// Add all the options 
            for ($index = 0; $index < sizeof($options); $index++){
                $query = "insert into poll_options (poll_id, name, created, modified, status) 
                    values (?,?,?,?,?)";
                $this->database->ExecuteQuery($query,array(
                    $identifier,
                    $options[$index],
                    date_create(),
                    date_create(),
                    1
                ));
            }
        }
    }

    /**
     * Allow to delete a poll from the database
     * @param int $id : the id of the poll to delete
     * @author Lakhdar Gibril
    */
    public function DeletePoll(int $id = 0) : void {
        $query = "delete from polls where id=?";
        $this->database->ExecuteQuery($query,array($id));
    }

    /**
     * Allow to return a limited number of poll data from the database
     * @param int $limit : the limit of the poll to get 
     * @return array return the array containing all the data about the polls
     * @author Lakhdar Gibril
     */
    public function GetLimitPoll(int $limit = 5) : array {
        $query = "select p.id, p.subject, p.created, p.poll_desc, p.locked, 
                        (select count(*) from poll_votes v
                            where v.poll_id = p.id) as votes
                                from polls p 
                                    order by votes desc
                                        LIMIT 5";
        $result = $this->database->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>