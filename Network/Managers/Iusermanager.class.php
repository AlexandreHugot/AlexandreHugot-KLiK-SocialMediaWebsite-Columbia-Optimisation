<?php

require_once("../../Models/user.class.php");

/**
 * An interface for the UserManager class
 * @author Lakhdar Gibril
 */
interface IUserManager {

    /**
     * Method which allow to create a user in the database
     * @param User $user : User object to insert
     * @author Lakhdar Gibril
     */
    public function Create(User $user);

    /**
     * Method which allow to delete a user in the database
     * @param User $user : User object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(User $user); 

    /**
     * Method which allow to update a user in the database
     * @param User $user : updated User object
     * @author Lakhdar Gibril
     */
    public function Modify(User $user);

    /**
     * Method which allow to get a user thanks to an id
     * @param int $id : identifier of the user
     * @return User a User object of the specifier identifier
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : User;

    /**
     * Method which allow to get all the existing user
     * @return array an array of User
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;

}

?>