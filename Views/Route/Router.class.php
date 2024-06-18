<?php

require_once("Network/Controllers/maincontroller.class.php");
require_once("RouteIndex.class.php");
require_once("RouteLogin.class.php");

/**
 * Class Router to manage the navigation on the software 
 * @author Lakhdar Gibril
 */
class Router {

    /**
     * ---------- Attributes ----------
     */
    private array $routeList;
    private array $controllerList;
    private string $action_key;

    /**
     * ---------- Constructor ----------
     */
    public function __construct(string $name_of_action_key = "action"){
        $this->CreateControllerList();
        $this->CreateRouteList();
        $this->action_key = $name_of_action_key;
    }

    /**
     * Create an array of controller for the data access
     * @author Lakhdar Gibril
     */
    public function CreateControllerList() : void {
        $this->controllerList = array (
            'main' => new MainController()
        );
    }

    /**
     * Create an array of route for the file routes. 
     * @author Lakhdar Gibril
     */
    public function CreateRouteList() : void {
        $this->routeList = array(
            "dashboard" => new RouteIndex($this->controllerList['main']),
            "login" => new RouteLogin($this->controllerList['main'])
        );
    }
    

    /**
     * Method which allow to redirect in an another page thanks to an action key
     * @param array $get : data of the get method 
     * @param array $post : data of the post method
     * @author Lakhdar Gibril
     */
    public function routing(array $get, array $post){
        if (isset($get["action"])){
            if(!empty($post)) $this->routeList[$get["action"]]->action($post,'POST');
            else $this->routeList[$get["action"]]->action($get);
        }
        else $this->routeList["login"]->action();
    }

}
?>