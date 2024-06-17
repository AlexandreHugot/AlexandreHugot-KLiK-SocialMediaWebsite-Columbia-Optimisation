<?php

require_once("./database.class.php");

/**
 * Represent a base controller for the other controllers
 * @author Lakhdar Gibril
 */
class BaseController {
    
    /**
     * --------- Attributs -----------
     */
    private Database $database;

    
    /**
     * --------- Constructor -----------
     */

    /**
     * Natural constructor of the class
     * @author Lakhdar Gibril
     */
    public function __construct() {
        $this->database = new Database("mysql:host=localhost;dbname=klik_database","root","");
    }

}

?>