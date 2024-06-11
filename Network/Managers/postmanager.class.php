<?php 

require_once("../database.class.php");
require_once("Ipostmanager.class.php");

/**
 * PostManager class for an access to post data
 * @author Lakhdar Gibril 
 */
class PostManager extends Database implements IPostManager {

    public function Create(Post $post) : void {

    }

    public function Delete (Post $post) : void {

    }

    public function Modify (Post $post) : void {
        
    }

    public function GetById (int $id) : Post {

    }

    public function GetAll() : array {
        
    }
}

?>