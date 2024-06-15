<?php

require_once("../Views/view.class.php");
require_once("./Managers/usermanager.class.php");
require_once("./Managers/blogmanager.class.php");

/**
 * Class MainController 
 * @author Lakhdar Gibril
 */
class MainController {

    /**
     * Method which allow to get the data from the manager 
     * @author Lakhdar Gibril
     */
    public function displayIndex() : void {
        /// Creating a new Index view
        $viewIndex = new View('Index');
        
    }
}
?>