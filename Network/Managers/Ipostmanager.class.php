<?php

require_once("../../Models/post.class.php");

/**
 * An interface for the PostManager class
 * @author Lakhdar Gibril
 */
interface IPostManager {

    /**
     * Method which allow to create a Post in the database
     * @param Post $post : Post object to insert
     * @author Lakhdar Gibril
     */
    public function Create(Post $post);

    /**
     * Method which allow to delete a Post in the database
     * @param Post $post : Post object to delete
     * @author Lakhdar Gibril
     */

    public function Delete(Post $post);

    /**
     * Method which allow to modify a Post in the database
     * @param Post $post : Post object modified
     * @author Lakhdar Gibril
     */

    public function Modify(Post $post);

    /**
     * Method which allow to get a Post by his id
     * @param int $id : the id of the Post
     * @return Post Post object of the specified id
     * @author Lakhdar Gibril
    */
    public function GetById(int $id) : Post;

    /**
     * Allow to return all the existing Post in the database
     * @return array an array of Post objects
     */
    public function GetAll() : array;
} 

?>