<?php

require_once('Network/database.class.php');

/**
 * Class which represent the base of an API which is for the access of the database
 * @author Lakhdar Gibril
 */
class BaseApi {

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
}
?>