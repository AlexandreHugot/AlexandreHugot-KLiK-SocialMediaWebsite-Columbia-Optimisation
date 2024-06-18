<?php

/**
 * Abstract class Route which will allow to navigate on the website
 * @author Lakhdar Gibril
 */
abstract class Route {

    /**
     * Natural Constructor of the Route class
     * @author Lakhdar Gibril
     */
    public function __construct() {

    }

    /**
     * Methods which allow to call a post or get methods
     * @param array $params : array containing data
     * @param string $method : string cotaining the method to call (post or get)
     * @author Lakhdar Gibril
     */
    public function Action(array $params = [], string $method = 'GET') : void {
        if ($method == 'GET') $this->get();
        else $this->post($params); 
    }

    /**
     * Method which allow to get the param
     * @param array $list : a list of parameters containing string
     * @param string $paramName : the name of the parameter present in the array
     * @param bool $canBeEmpty : if the parameter can be empty true, else false
     * @return string 
     */

    protected function GetParams(array $list, string $paramName, bool $canBeEmpty = true) : string {
        if (isset($list[$paramName])) {
            if(!$canBeEmpty && empty($list[$paramName]))
                throw new Exception("Paramètre '$paramName' vide");
            return $list[$paramName];
        } 
        else throw new Exception("Paramètre '$paramName' absent");
    }

    /**
     * Method which allow to get data, it act like a get methods
     * @author Lakhdar Gibril
     */
    abstract function get();

    /**
     * Method which allow to post mixed data, it act like a post methods
     * @param array $params : an array with mixed data to post
     * @author Lakhdar Gibril
     */

    abstract function post(array $params = []) : void;
}

?>