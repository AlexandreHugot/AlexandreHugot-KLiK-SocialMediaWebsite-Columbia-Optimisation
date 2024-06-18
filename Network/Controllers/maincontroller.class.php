<?php

require_once("Views/view.class.php");
require_once("Network/API/UserApi.php");
require_once("Network/API/BlogApi.php");
require_once("Network/API/EventApi.php");
require_once("Network/API/PollApi.php");
require_once("Network/API/ForumApi.php");
require_once("basecontroller.class.php");

/**
 * Class MainController 
 * @author Lakhdar Gibril
 */
class MainController extends BaseController {

    /**
     * Natural construct of the class;
     * @author Lakhdar Gibril 
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Method which allow to get the data from the fake api 
     * @author Lakhdar Gibril
     */
    public function displayIndex() : void {
        /// Creating a new Index view
        $viewIndex = new View('Dashboard');
        
        $ForumApi = new ForumApi($this->database);
        $dataForums = $ForumApi->GetLimitForum();

        $BlogApi = new BlogApi($this->database);        
        $dataBlogs = $BlogApi->GetLimitBlog();

        $EventApi = new EventApi($this->database);
        $dataEvents = $EventApi->GetLimitEvent();

        $PollApi = new PollApi($this->database);
        $dataPolls = $PollApi->GetLimitPoll();

        $viewIndex->generate(['listForums' => $dataForums, 'listBlogs' => $dataBlogs, 'listEvents' => $dataEvents, 'listPolls' => $dataPolls]);
    }

    /**
     * Method which allow to show the login form 
     * @author Lakhdar Gibril
     */
    public function displayLogin() : void {
        ///Creating a new Login view
        $viewLogin = new View('Login');
        $viewLogin->generate([]);
    }

    /**
     * Method which allow to check if the data given in the form is correct
     * @param array $params data given in the form to log in
     * @author Lakhdar Gibril
     */
    public function checkConnection(array $params = []) : User {
        
        $UserApi = new UserApi($this->database);
        $userData = $UserApi->GetUser($params);
        
        /// Order the array for the hydrate method of the User class
        $dataForHydrate = array (
            'IdUsers' => $userData['idUsers'],
            'UserLevel' => $userData['userLevel'],
            'FName' => $userData['f_name'],
            'LName' => $userData['l_name'],
            'UIdUsers' => $userData['uidUsers'],
            'EmailUsers' => $userData['emailUsers'],
            'PwdUsers' => $userData['pwdUsers'],
            'Gender' => $userData['gender'],
            'Headline' => $userData['headline'],
            'Bio' => $userData['bio'],
            'UserImg' => $userData['userImg']
        );

        $user = new User();
        $user->hydrate($dataForHydrate);

        return $user;
    }
}
?>