<?php

require_once("user.class.php");

/**
 * Class which represent a conversation between two differents users
 * @author Lakhdar Gibril
 */
class Conversation {

    /**
     * ----------- Attributes -----------
    */
    private int $id = 0;
    private User $user_one;
    private User $user_two;

    /**
     * ----------- Properties -----------
    */

    /**
     * Allow to get the id of the conversation
     * @return int the conversation id
     * @author Lakhdar Gibril
     */
    public function getId() : int {
        return $this->$id;
    }
    /**
     * Update the conversation id
     * @param int $id : the id of the conversation
     * @author Lakhdar Gibril
     */
    public function setId(int $id) : void {
        $this->id = $id;
    }

    /**
     * Get one of the user of the conversation
     * @return User User object of the conversation
     * @author Lakhdar Gibril
     */
    public function getUserOne() : User {
        return $this->user_one;
    }
    /**
     * Update one of the user of the conversation
     * @param User $user : User object of the conversation
     * @author Lakhdar Gibril
     */
    public function setUserOne(User $user) : void {
        $this->user_one = $user;
    }

    /**
     * Get one of the user of the conversation
     * @return User User object of the conversation
     * @author Lakhdar Gibril
     */
    public function getUserTwo() : User {
        return $this->user_two;
    }
    /**
     * Update one of the user of the conversation
     * @param User $user : User object of the conversation
     * @author Lakhdar Gibril
     */
    public function setUserTwo(User $user) : void {
        $this->user_two = $user;
    }

    /**
     * Allow to get the Users of the conversation
     * @return array a list of users of the conversation
     * @author Lakhdar Gibril
     */
    public function getUsers() : array {
        $listUser = array(
            'user_one' => $this->user_one,
            'user_two' => $this->user_two);
        return $listUser;
    }

    /**
     * ----------- Methods -----------
    */
    
    /**
     * Method which allow to create a new object thanks to an array of data
     * @param array $donnees : the data to insert in the object
     * @author Lakhdar Gibril
     */
    public function hydrate(array $donnees) : void
    {
        foreach ($donnees as $key => $value)
        {
            // Getting the name of the setter method
            $method = 'set'.ucfirst($key);

            // if the given setter exist
            if (method_exists($this, $method))
            {
                // Calling the setter
                $this->$method($value);
            }
        }
    }
}
?>