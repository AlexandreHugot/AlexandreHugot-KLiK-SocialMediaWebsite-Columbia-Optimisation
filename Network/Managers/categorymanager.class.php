<?php

require_once("Icategorymanager.class.php");
require_once("../database.class.php");

/**
 * CategoryManager class to access the category data from the database
 * @author Lakhdar Gibril
 */
class CategoryManager extends Database implements ICategoryManager{

    public function Create(Category $category) {
        $query = "INSERT INTO categories (cat_name,cat_description) VALUES (?,?)";
        $this->ExecuteQuery($query,array($category->getCatName(), $category->getCatDesc()));
    }

    public function Delete(Category $category){
        $query = "DELETE FROM categories WHERE cat_id = ? ";
        $this->ExecuteQuery($query,array($category->getCatId()));
    }

    public function Modify(Category $category){
        $query = "UPDATE categories SET cat_name = ?, cat_description = ? WHERE cat_id = ?";
        $this->ExecuteQuery($query,array($category->getCatName(),$category->getCatDesc(), $category->getCatId()));
    }

    public function GetById(int $id) : Category {
        /// Creating an empty category in case this one not existing
        $category = new Category();
        $query = "SELECT * FROM categories WHERE cat_id = ?";
        $result = $this->ExecuteNonQuery($query,array($id))->fetch();
        if ($result == true) /// If the query return a result
        {
            $data = array (
                'CatId' => intval($result['cat_id']),
                'CatName' => $result['cat_name'],
                'CatDesc' => $result['cat_description']
            )

            $category->hydrate($data);
        }
        return $category;
    }

    public function GetAll() : array {
        $query = "SELECT * FROM categories";
        $results = $this->ExecuteNonQuery($query)->fechAll();
        return $results;
    } 
}
?>