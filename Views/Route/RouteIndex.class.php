<?php
require_once("Route.class.php");
require_once("Network/Controllers/maincontroller.class.php");

/**
 * Represent the route to go for the index
 * @author Lakhdar Gibril 
 */
class RouteIndex extends Route{
    private MainController $controller;

    public function __construct(MainController $controller) {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get() {
        $this->controller->displayIndex();
    }
    public function post(array $params=[]) : void{
        $this->controller->displayIndex();
    }
}
?>