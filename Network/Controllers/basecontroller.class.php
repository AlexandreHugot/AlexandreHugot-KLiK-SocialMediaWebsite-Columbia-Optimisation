<?php

require_once("Network/database.class.php");

/**
 * Represent a base controller for the other controllers
 * @author Lakhdar Gibril
 */
class BaseController {
    
    /**
     * --------- Attributs -----------
     */
    protected Database $database;

    
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