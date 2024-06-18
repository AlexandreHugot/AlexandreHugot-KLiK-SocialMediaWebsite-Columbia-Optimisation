<?php

require_once("Route.class.php");
require_once("Network/Controllers/usercontroller.class.php");
require_once("Network/Controllers/maincontroller.class.php");

/**
 * Class which represent the route for the login page
 * @author Lakhdar Gibril
 */
class RouteLogin extends Route {

    /**
     * ---------- Attributes ----------
     */
    private MainController $maincontroller;

    /**
     * ---------- Methods ----------
     */

    /**
     * Natural constructor of the class
     * @param MainController $maincontroller : maincontroller to access to the index
     * @author Lakhdar Gibril
     */
    public function __construct(MainController $maincontroller) {
        parent::__construct();
        $this->maincontroller = $maincontroller;
    }

    public function get() {
        $this->maincontroller->displayLogin();
    } 

    public function post(array $params = []) : void {
        $this->mainController->displayLogin();

        $login_submit = parent::getParam($_POST,'login-submit',true);

        if (isset($login_submit)) {

            try {
                $datas = array (
                    'mailuid' => parent::getParam($_POST,'mailuid',false),
                    'pwd' => parent::getParam($_POST,'pwd',false),
                );
    
                $user = $this->maincontroller->checkConnection($datas);
                
                /// We create a session with the user data 
                session_start();
                $_SESSION['userId'] = $user->getUserId();
                $_SESSION['userUid'] = $user->getUIdUsers();
                $_SESSION['userLevel'] = $user->getUserLevel();
                $_SESSION['emailUsers'] = $user->getEmailUsers();
                $_SESSION['f_name'] = $user->getFName();
                $_SESSION['l_name'] = $user->getLName();
                $_SESSION['gender'] = $user->getGender();
                $_SESSION['headline'] = $user->getHeadline();
                $_SESSION['bio'] = $user->getBio();
                $_SESSION['userImg'] = $user->getUserImg();
    
                $this->maincontroller->displayIndex();
            } 
            
            catch (Exception $exception) {
                $this->mainController->displayLogin();
            }
        }
    }


}

?>