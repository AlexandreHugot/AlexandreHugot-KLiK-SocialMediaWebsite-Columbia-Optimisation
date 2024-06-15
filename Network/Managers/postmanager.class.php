<?php 

require_once("../database.class.php");
require_once("Ipostmanager.class.php");
require_once("usermanager.class.php");
require_once("topicmanager.class.php");

/**
 * PostManager class for an access to post data
 * @author Lakhdar Gibril 
 */
class PostManager extends Database implements IPostManager {

    public function Create(Post $post) : void {
        $query = "INSERT INTO posts (post_id, post_content, post_date, post_topic, post_by, post_votes) 
                VALUES (?,?,?,?,?,?)";
        $result = $this->ExecuteQuery($query, array(
            $post->getId(),
            $post->getPostContent(),
            $post->getPostDate(),
            $post->getPostTopic()->getId(),
            $post->getPostBy()->getIdUsers(),
            $post->getPostVotes()
        ))
    }

    public function Delete (Post $post) : void {
        $query = "DELETE FROM posts WHERE post_id = ?";
        $result = $this->ExecuteQuery($query,array($post->getId()));
    }

    public function Modify (Post $post) : void {
        $query = "UPDATE posts SET post_content= ?, post_date = ?, post_topic = ?, post_by = ?, post_votes = ? 
                  WHERE post_id = ?";
        $result = $this->ExecuteQuery($query, array(
            $post->getPostContent(),
            $post->getPostDate(),
            $post->getPostTopic()->getId(),
            $post->getPostBy()->getIdUsers(),
            $post->getPostVotes(),
            $post->getId()
        ))

    }

    public function GetById (int $id) : Post {
        $post = new Post();
        $query = "SELECT * FROM posts WHERE post_id = ?";
        $result = $this->ExecuteNonQuery($query, array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true){
            $user = new UserManager()->GetById(intval($result['post_by']));
            $topic = new TopicManager()->GetById(intval($result['post_topic']));

            $data = array(
                'Id' => intval($result['post_id']),
                'PostContent' => $result['post_content'],
                'PostDate' => $result['post_date'],
                'PostTopic' => $topic,
                'PostBy' => $user,
                'PostVotes' => intval($result['post_votes'])
            )
            $post->hydrate($data),
        }
        return $post;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM posts";
        return $this->ExecuteNonQuery($query)->fetch(PDO::FETCH_ASSOC);
    }
}

?>