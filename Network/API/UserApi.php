<?php

require_once('./database.class.php');
require 'upload.inc.php';

/**
 * Class UserApi which regroup all the SQL query found in the source code
 * @author Lakhdar Gibril
 */
class UserApi {

     /**
     * ----------- Attributes -----------
     */
    private Database $database;
    
    /**
     *  ----------- Constructor -----------
     */

    /**
     * Natural constructor which allow to create a new instance Database class
     * @param Database $base : Database object to execute the request
     * @author Lakhdar Gibril
     */
    public function __construct(Database $base){
        $this->database = $base;
    }

    
    /**
     * ----------- Methods -----------
     */

    /**
     * Allow to get a user if the data are correct
     * @param array $params : array containing the data put in the form 
     * @return array : array containing the data about the user
     * @author Lakhdar Gibril
     */
    public function GetUser (array $params = []) : array {
        $query = "select * from users where uidUsers = ?";
        $result = $this->ExecuteNonQuery($query,array(['mailuid']))->fetch(PDO::FETCH_ASSOC);
        $passwordCheck = password_verify($params['pwd'],$result['pwdUsers'])
        $data = [];
        if ($passwordCheck == true ){
            $data = array (
                'idUsers' => $result['idUsers'],
                'uidUsers' => $result['uidUsers'],
                'userLevel' => $result['userLevel'],
                'emailUsers' => $result['emailUsers'],
                'f_name' => $result['f_name'],
                'l_name' => $result['l_name'],
                'gender' => $result['gender'],
                'headline' => $result['headline'],
                'bio' => $result['bio'],
                'userImg' => $result['userImg'],
                'coverImg' => $result['coverImg']
            );
        }
        return $data;
    }

    /**
     * Allow to create a user thanks to data put in a form
     * @param array $params : users data as an array
     * @author Lakhdar Gibril
     */
    public function CreateUser(array $params = []) : void {
        // checking if a user already exists with the given username
        $query = "select uidUsers from users where uidUsers = ?";
        $exist = $this->database->ExecuteNonQuery($query,$params['uid']);
        if ($exist->fetchColumn() == 0){
            $query = "insert into users(uidUsers, emailUsers, f_name, l_name, pwdUsers, gender, headline, bio, userImg) 
                    values (?,?,?,?,?,?,?,?,?)";
            $this->database->ExecuteQuery($query,array(
                $params['uid'],
                $params['mail'],
                $params['f-name'],
                $params['l-name'],
                password_hash($params['pwd'],PASSWORD_DEFAULT),
                $params['gender'],
                $params['headline'],
                $params['bio'],
                'default.png'
            ));        
        }
    }

    /**
     * Allow to delete a user in the database
     * @param int $id : the id of the user to delete
     * @author Lakhdar Gibril
     */
    public function DeleteUser(int $id) : void {
        $query = "delete from users where idUsers = ?";
        $this->database->ExecuteQuery($query,array($id));
    }

    /**
     * Allow to update a user in the database
     * @param array $params : an array containing user data from a form
     * @author Lakhdar Gibril
     */
    public function UpdateUser(array $params = []) : void {
        $query = "update users 
                    set f_name=?, l_name=?, emailUsers=?, gender=?, headline=?, bio=?, userImg=?, pwdUsers=? 
                        where uidUsers=?";
        $this->database->ExecuteQuery($query,array(
            $params['f-name'],
            $params['l-name'],
            $params['email'],
            $params['gender'],
            $params['headline'],
            $params['bio'],
            $params['userImg'],
            password_has($params['pwd'],PASSWORD_DEFAULT),
            $params['userUid']
        ));
    }


    /**
     * Allow to get a user profile picture and username from the database
     * @param int $id : identifier of the user.
     * @return array an array containing the name of the user and his profile picture
     * @author Lakhdar Gibril
     */
    public function GetUserProfilePic(int $id) : array {
        $query = "select uidUsers, userImg from users WHERE idUsers = ?";
        $result = $this->database->ExecuteNonQuery($query,array($id))->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>