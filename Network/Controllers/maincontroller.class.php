<?php

require_once("../Views/view.class.php");
require_once("./API/UserApi.php");
require_once("./API/BlogApi.php");
require_once("./API/EventApi.php");
require_once("./API/PollApi.php");
require_once("./API/ForumApi.php");
require_once("basecontroller.class.php");

/**
 * Class MainController 
 * @author Lakhdar Gibril
 */
class MainController extends BaseController {

    /**
     * Method which allow to get the data from the manager 
     * @author Lakhdar Gibril
     */
    public function displayIndex() : void {
        /// Creating a new Index view
        $viewIndex = new View('Index');
        
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
}
?>