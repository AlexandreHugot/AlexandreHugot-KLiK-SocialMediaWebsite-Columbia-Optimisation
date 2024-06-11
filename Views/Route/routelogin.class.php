<?php

require_once("../../Network/usercontroller.class.php");
require_once("../../Network/maincontroller.class.php");
require_once("Route.class.php");

/**
 * Route for the login page of the application
 * @author Lakhdar Gibril
 */
class RouteLogin extends Route {

    private UserController $userController;
    private MainController $mainController;

    /**
     * Natural constructor of the class
     * @param
     * @author Lakhdar Gibril
     */
    public function __construct(UserController $userController, MainController $mainController)
    {
        parent::__construct();
        $this->userController = $userController;
        $this->mainController = $mainController;
    }

    public function get() : array {
    }
}
?>