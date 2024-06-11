<?php

require_once("../../Models/blog.class.php");

/**
 * Represent an interface for the BlogManager class
 * @author Lakhdar Gibril
 */
interface IBlogManager {

    /**
     * Methods allow to create a Blog object in the database
     * @param Blog $blog : the Blog object to insert
     * @author Lakhdar Gibril
     */
    public function Create(Blog $blog);

    /**
     * Methods allow to delete a Blog object existing in the database
     * @param Blog $blog : the Blog object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(Blog $blog);

    /**
     * Methods which allow to update a Blog object in the database 
     * @param Blog $blog : the Blog object to modify
     * @author Lakhdar Gibril
     */
    public function Modify(Blog $blog);

    /**
     * Method which allow to get a Blog thanks to the id
     * @param int $id : id of the Blog
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : Blog;

    /**
     * Method which allow to get all the Blog existing in the database
     * @return array an array of Blog object
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}
?>