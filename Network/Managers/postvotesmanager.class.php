<?php
    require_once("Ipostvotesmanager.class.php");
    require_once("../database.class.php");
    
    /**
     * Class PostVotesManager to access PostVotes data
     * @author Lakhdar Gibril
     */
    class PostVotesManager extends Database implements IPostVotesManager {
    
        public function Create(PostVotes $postVotes){
    
        }
    
        public function Delete(PostVotes $postVotes){
    
        }
    
        public function Modify(PostVotes $postVotes){
    
        }
    
        public function GetById(int $id) : PostVotes {
    
        }
    
        public function GetAll() : array {
            
        }
    }
?>