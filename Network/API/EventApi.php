<?php
require_once("./database.class.php");

/**
 * Class which play the role of an API for the event data
 * @author Lakhdar Gibril
 */
class EventApi {

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
     * Allow to get event data from the database
     * @param int $id : the id of the event 
     * @return array the array containing the event data
     * @author Lakhdar Gibril
     */
    public function GetEvent(int $id = 0) : array {
        $query = "select e.event_date, e.event_id, e.event_by, e.title, e.event_image, i.description,
                        u.uidUsers, u.userImg, i.headline as e_headline
                            from events e, event_info i, users u
                                where e.event_id = ? 
                                    and e.event_by = u.idUsers
                                        and e.event_id = i.event";
        $result = $this->database->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Allow to get all the events data from the database
     * @return array the array containing all the event data
     * @author Lakhdar Gibril
     */
    public function GetAllEvents() : array {
        $query = "select event_id, event_by, title, event_date, event_image
                    from events
                        order by event_date desc";
        $result = $this->database->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Allow to create a new event in the database
     * @param array $params : the array containing the data to input
     * @author Lakhdar Gibril
     */
    public function CreateEvent(array $params = []) : void {
        // checking if a user already exists with the given username
        $query = "select title from events where title = ?";
        $exist = $this->database->ExecuteNonQuery($query,$params['etitle']);
        if ($exist->fetchColumn() == 0) {
            $query = "insert into events(event_by, title, event_date, date_created, event_image) 
                        values (?,?,?,?,?)";
            $this->database->ExecuteQuery($query,array(
                $params['userId'],
                $params['etitle'],
                $params['edate'],
                date_create(),
                'event-cover.png'
            ));
            $identifier = $this->database->ExecuteNonQuery("select LAST_INSERT_ID() from events where title = ?", array($params['etitle']))->fetch(PDO::FETCH_ASSOC);

            $query = "insert into event_info (event, title, headline, description)
                        values (?,?,?,?)";
            $this->database->ExecuteQuery($query,array(
                $identifier,
                $params['etitle'],
                $params['ehead'],
                $params['edescription']
            ));
        } 
    }
}

?>