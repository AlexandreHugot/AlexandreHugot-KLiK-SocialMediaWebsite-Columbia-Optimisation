<?php

/**
 * Class which represent a user who can use the social media
 * @author Lakhdar Gibril
 */
class User {
    
    /**
     * ----------- Attributes -----------
    */
    private int $idUsers = 0;
    private int $userLevel = 0;
    private string $f_name;
    private string $l_name;
    private string $uIdUsers;
    private string $emailUsers;
    private string $pwdUsers;
    private string $gender;
    private string $headline;
    private string $bio;
    private string $userImg; 

    /**
     * ----------- Properties -----------
    */
    /**
     * Get the ID of the user.
     * @return int The ID of the user.
     * @author Lakhdar Gibril
     */
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }

    /**
     * Set the ID of the user.
     * @param int $idUsers The ID of the user.
     * @author Lakhdar Gibril
     */
    public function setIdUsers(int $idUsers): void
    {
        $this->idUsers = $idUsers;
    }

    /**
     * Get the level of the user.
     * @return int The level of the user.
     * @author Lakhdar Gibril
     */
    public function getUserLevel(): int
    {
        return $this->userLevel;
    }

    /**
     * Set the level of the user.
     * @param int $userLevel The level of the user.
     * @author Lakhdar Gibril
     */
    public function setUserLevel(int $userLevel): void
    {
        $this->userLevel = $userLevel;
    }

    /**
     * Get the first name of the user.
     * @return string The first name of the user.
     * @author Lakhdar Gibril
     */
    public function getFName(): string
    {
        return $this->f_name;
    }

    /**
     * Set the first name of the user.
     * @param string $f_name The first name of the user.
     * @author Lakhdar Gibril
     */
    public function setFName(string $f_name): void
    {
        $this->f_name = $f_name;
    }

    /**
     * Get the last name of the user.
     * @return string The last name of the user.
     * @author Lakhdar Gibril
     */
    public function getLName(): string
    {
        return $this->l_name;
    }

    /**
     * Set the last name of the user.
     * @param string $l_name The last name of the user.
     * @author Lakhdar Gibril
     */
    public function setLName(string $l_name): void
    {
        $this->l_name = $l_name;
    }

    /**
     * Get the unique identifier of the user.
     * @return string The unique identifier of the user.
     * @author Lakhdar Gibril
     */
    public function getUIdUsers(): string
    {
        return $this->uIdUsers;
    }
    /**
     * Set the unique identifier of the user.
     * @param string $uIdUsers The unique identifier of the user.
     * @author Lakhdar Gibril
     */
    public function setUIdUsers(string $uIdUsers): void
    {
        $this->uIdUsers = $uIdUsers;
    }

    /**
     * Get the email address of the user.
     * @return string The email address of the user.
     * @author Lakhdar Gibril
     */
    public function getEmailUsers(): string
    {
        return $this->emailUsers;
    }
    /**
     * Set the email address of the user.
     * @param string $emailUsers The email address of the user.
     * @author Lakhdar Gibril
     */
    public function setEmailUsers(string $emailUsers): void
    {
        $this->emailUsers = $emailUsers;
    }

    /**
     * Get the password of the user.
     * @return string The password of the user.
     * @author Lakhdar Gibril
     */
    public function getPwdUsers(): string
    {
        return $this->pwdUsers;
    }

    /**
     * Set the password of the user.
     * @param string $pwdUsers The password of the user.
     * @author Lakhdar Gibril
     */
    public function setPwdUsers(string $pwdUsers): void
    {
        $this->pwdUsers = $pwdUsers;
    }

    /**
     * Get the gender of the user.
     * @return string The gender of the user.
     * @author Lakhdar Gibril
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Set the gender of the user.
     * @param string $gender The gender of the user.
     * @author Lakhdar Gibril
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * Get the headline of the user profile.
     * @return string The headline of the user profile.
     * @author Lakhdar Gibril
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }
    /**
     * Set the headline of the user profile.s
     * @param string $headline The headline of the user profile.
     * @author Lakhdar Gibril
     */
    public function setHeadline(string $headline): void
    {
        $this->headline = $headline;
    }

    /**
     * Get the biography of the user.
     * @return string The biography of the user.
     * @author Lakhdar Gibril
     */
    public function getBio(): string
    {
        return $this->bio;
    }
    /**
     * Set the biography of the user.
     * @param string $bio The biography of the user.
     * @author Lakhdar Gibril
     */
    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * Get the profile image of the user.
     * @return string The profile image of the user.
     * @author Lakhdar Gibril
     */
    public function getUserImg(): string
    {
        return $this->userImg;
    }
    /**
     * Set the profile image of the user.
     * @param string $userImg The profile image of the user.
     * @author Lakhdar Gibril
     */
    public function setUserImg(string $userImg): void
    {
        $this->userImg = $userImg;
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