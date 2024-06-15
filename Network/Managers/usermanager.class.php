<?php

require_once("../database.class.php");
require_once("Iusermanager.class.php");

class UserManager extends Database implements IUserManager {

    public function Create(User $user){
        $query = "INSERT INTO users(idUsers,userLevel,f_name,l_name,uidUsers,emailUsers,pwdUsers,gender,headline,bio,userImg)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $request = $this->ExecuteQuery($query,array(
            $user->getIdUsers(),
            $user->getUserLevel(),
            $user->getFName(),
            $user->getLName(),
            $user->getUIdUsers(),
            $user->getEmailUsers(),
            $user->getEmailUsers(),
            $user->getPwdUsers(),
            $user->getGender(),
            $user->getHeadline(),
            $user->getBio(),
            $user->getUserImg()
        ));         

    }

    public function Delete(User $user){
        $query = "DELETE FROM users WHERE idUsers = ?";
        $request = $this->ExecuteQuery($query,array($user->getIdUsers));
    }

    public function Modify(User $user){
        $query = "UPDATE users SET userLevel = ?, f_name = ?, l_name = ?, uidUsers = ?, 
        emailUsers = ?, pwdUsers = ?, gender = ?, headline = ?, bio = ?, userImg = ? 
        WHERE idUsers = ?";

        $result = $this->ExecuteQuery($query,array(
            $user->getUserLevel(),
            $user->getFName(),
            $user->getLName(),
            $user->getUIdUsers(),
            $user->getEmailUsers(),
            $user->getEmailUsers(),
            $user->getPwdUsers(),
            $user->getGender(),
            $user->getHeadline(),
            $user->getBio(),
            $user->getUserImg(),
            $user->getIdUsers()
        ))
    }

    public function GetById(int $id) : User{
        $user = new User();
        $query = "SELECT * FROM users WHERE idUsers = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch();
        if ($result == true) // If the query return a result
        {
            $data = array(
                'IdUsers' => intval($result['idUsers']),
                'UserLevel' => intval($result['userLevel']),
                'FName' => $result['f_name'],
                'LName' => $result['l_name'],
                'UIdUsers' => $result['uidUsers'],
                'EmailUsers' => $result['emailUsers'],
                'PwdUsers' => $result['pwdUsers'],
                'Gender' => $result['gender'],
                'Headline' => $result['headline'],
                'Bio' => $result['bio'],
                'UserImg' => $result['userImg']
            );

            $user->hydrate($data);
        }
        return $user;
        
    }

    public function GetAll() : array{
        $query = "SELECT * FROM users";
        $results = $this->ExecuteNonQuery($query)->fetchAll();
        return $results;
    }
}

?>