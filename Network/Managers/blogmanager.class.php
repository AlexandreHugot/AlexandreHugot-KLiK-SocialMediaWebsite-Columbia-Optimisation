<?php

require_once("../database.class.php");
require_once("Iblogmanager.class.php");
require_once("usermanager.class.php");

/**
 * Class BlogManager to access Blogs data from the database
 * @author Lakhdar Gibril
 */
class BlogManager extends Database implements IBlogManager {

    public function Create(Blog $blog) {
        $query = "INSERT INTO Blogs (blog_id, blog_title, blog_img, blog_by, blog_date, blog_votes, blog_content)
                  VALUES (?,?,?,?,?,?,?)";
        $result = $this->ExecuteQuery($query, array (
            $blog->getBlogId(),
            $blog->getBlogTitle(),
            $blog->getBlogImage(),
            $blog->getBlogBy()->getIdUsers(),
            $blog->getBlogDate(),
            $blog->getBlogVotes(),
            $blog->getBlogContent()
        ));
    }

    public function Delete(Blog $blog){
        $query = "DELETE FROM Blogs WHERE blog_id = ?";
        $result = $this->ExecuteQuery($query,array($blog->getBlogId()));
    }

    public function Modify(Blog $blog){
        $query = "UPDATE Blogs SET blog_title = ?, blog_img = ?, blog_by = ?, blog_date = ?, blog_votes = ?, blog_content = ?
                    WHERE blog_id = ? ";
        $result = $this->ExecuteQUery($query, array (
            
            $blog->getBlogTitle(),
            $blog->getBlogImage(),
            $blog->getBlogBy()->getIdUsers(),
            $blog->getBlogDate(),
            $blog->getBlogVotes(),
            $blog->getBlogContent(),
            $blog->getBlogId()
        ))
    }

    public function GetById(int $id) : Blog{
        /// Creating an empty Blog object
        $blog = new Blog();
        $query = "SELECT * FROM Blogs, users WHERE blog_id = ? AND blogs.blog_by = users.idUsers";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch(PDO::FETCH_ASSOC);
        if ($result == true) /// If the query return a row so it's true
        {
            $user = new UserManager()->GetById(intval($result['idUsers'])); 
            $data = array (
                'BlogId' => intval($result['blog_id']),
                'BlogTitle' => $result['blog_title'],
                'BlogImage' => $result['blog_img'],
                'BlogBy' => $user;
                'BlogDate' => $result['blog_date'],
                'BlogVotes' => intval($result['blog_votes']),
                'BlogContent' => $result['blog_content'] 
            )           
            $blog->hydrate($data);
        }
        return $blog;
         
    }

    public function GetAll() : array {
        $query = "SELECT * FROM Blogs JOIN users ON Blogs.blog_by = users.idUsers";
        return $this->ExecuteNonQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>