<?php

require_once("../../Models/category.class.php");

/**
 * Interface ICategoryManager for the CategoryManager class
 * @author Lakhdar Gibril
 */
interface ICategoryManager {

    /**
     * Allow to create a new Category in the database
     * @param Category $category : Category object to insert
     * @author Lakhdar Gibril
     */
    public function Create(Category $category);

    /**
     * Allow to delete a Category in the database
     * @param Category $category : Category object to delete
     * @author Lakhdar Gibril
     */
    public function Delete(Category $category);

    /**
     * Allow to update an existing Category in the database
     * @param Category $category : updated Category object
     * @author Lakhdar Gibril
     */
    public function Modify(Category $category);

    /**
     * Allow to create a new Category in the database
     * @param int $id : the specified id of the Category
     * @return Category a Category object
     * @author Lakhdar Gibril
     */
    public function GetById(int $id) : Category;

    /**
     * Allow to get all the existing Category in the database
     * @return array an array of Category object
     * @author Lakhdar Gibril
     */
    public function GetAll() : array;
}
?>