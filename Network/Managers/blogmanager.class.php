<?php

require_once("../database.class.php");
require_once("Iblogmanager.class.php");

/**
 * Class BlogManager to access Blogs data from the database
 * @author Lakhdar Gibril
 */
class BlogManager extends Database implements IBlogManager {

    public function Create(Blog $blog) {

    }

    public function Delete(Blog $blog){

    }

    public function Modify(Blog $blog){
        
    }

    public function GetById(int $id) : Blog{

    }

    public function GetAll() : array {
        
    }
}
?>