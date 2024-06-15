<?php

require_once("../database.class.php");
require_once("Itopicmanager.class.php");
require_once("usermanager.class.php");
require_once("categorymanager.class.php");

/**
 * Class TopicManager which manage to access on topics data
 * @author Lakhdar Gibril
 */
class TopicManager extends Database implements ITopicManager {

    public function Create(Topic $topic) : void {
        $query = "INSERT INTO topics (topic_id,topic_subject,topic_date,topic_cat,topic_by) 
                  VALUES(?,?,?,?,?)";
        $result = $this->ExecuteQuery($query,array(
            $topic->getTopicId(),
            $topic->getTopicSuject(),
            $topic->getTopicDate(),
            $topic->getTopicCat(),
            $topic->getTopicBy()
        ));
    }

    public function Delete (Topic $topic) : void {
        $query = "DELETE FROM topics WHERE topic_id = ?";
        $result = $this->ExecuteQuery($query,array($topic->GetTopicId()));
    }

    public function Modify (Topic $topic) : void { 
        $query = "UPDATE topics SET topic_subject = ?, topic_date = ?, topic_cat = ?, topic_by = ?
        WHERE topic_id = ?";
        $result = $this->ExecuteQuery($query,array(
            $topic->getTopicSuject(),
            $topic->getTopicDate(),
            $topic->getTopicCat(),
            $topic->getTopicBy(),
            $topic->getTopicId()
        ));
    }

    public function GetById (int $id) : Topic {
        $topic = new Topic();
        $query = "SELECT * FROM topics WHERE topic_id = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) /// If the query return a result
        {
            $user = new UserManager()->GetById(intval($result['topic_by'])); //Calling the user manager to get a user by id
            $category = new CategoryManager()->GetById(intval($result['topic_cat'])); 

            $data = array(
                'TopicId' => intval($result['topic_id']),
                'TopicSubject' => $result['topic_subject'],
                'TopicDate' => $result['topic_date'],
                'TopicCat' => $category,
                'TopicBy' => $user
            );

            $topic->hydrate($data); /// Instanciate a new Topic object
        }
        return $topic;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM topics";
        $result = $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>