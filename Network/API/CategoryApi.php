<?php

require_once('BaseApi.php');

/**
 * Class CategoryApi which allow to manipulate category data
 * @author Lakhdar Gibril
 */
class CategoryApi extends BaseApi {

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
     * ----------- Methods -----------
    */

    /**
     * Allow to create a category from a form into the database
     * @param array $params : an array containing category data
     * @author Lakhdar Gibril
     */
    public function CreateCategory(array $params = []) : void {
        $query = "select cat_name from categories where cat_name = ?";
        $exist = $this->database->ExecuteNonQuery($query,array($params['cat_name']));
        ($exist->fetchColumn() == 0){
            $query = "insert into categories(cat_name, cat_description) 
                        values (?,?)";
            $this->database->ExecuteQuery($query,array(
                $params['cat_name'],
                $params['cat_description']
            ));
        }
    }
    
    /**
     * Allow to delete a category in the database
     * @param int $id : the id of the category
     * @author Lakhdar Gibril
     */
    public function DeleteCategory(int $id = 0) : void {
        $query = "delete from categories where cat_id = ?";
        $this->database->ExecuteQuery($query,array($id));
    }
}

?>