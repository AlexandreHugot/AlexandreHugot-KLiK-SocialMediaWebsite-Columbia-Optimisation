<?php

/**
 * Represent a category for a post, etc.
 * @author Lakhdar Gibril
 */
class Category {

    /**
     * ----------- Attributes -----------
    */
    private int $cat_id = 0;
    private string $cat_name;
    private string $cat_description;

    /**
     * ----------- Properties -----------
    */

    /**
     * Get the ID of the category.
     * @return int The ID of the category.
     * @author Lakhdar Gibril
     */
    public function getCatId(): int
    {
        return $this->cat_id;
    }
    /**
     * Set the ID of the category.
     * @param int $cat_id The ID of the category.
     * @author Lakhdar Gibril
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }

    /**
     * Get the name of the category.
     * @return string The name of the category.
     * @author Lakhdar Gibril
     */
    public function getCatName(): string
    {
        return $this->cat_name;
    }
    /**
     * Set the name of the category.
     * @param string $cat_name The name of the category.
     * @author Lakhdar Gibril
     */
    public function setCatName(string $cat_name): void
    {
        $this->cat_name = $cat_name;
    }

    /**
     * Get the description of the category.
     * @return string The description of the category.
     * @author Lakhdar Gibril
     */
    public function getCatDescription(): string
    {
        return $this->cat_description;
    }
    /**
     * Set the description of the category.
     * @param string $cat_description The description of the category.
     * @author Lakhdar Gibril
     */
    public function setCatDescription(string $cat_description): void
    {
        $this->cat_description = $cat_description;
    }

    /**
     * ----------- Methods -----------
    */
    
    /**
     * Method which allow to create a new object thanks to an array of data
     * @param array $donnees : the data to insert in the object
     * @author Lakhdar Gibril
     */
    public function hydrate(array $donnees) : void
    {
        foreach ($donnees as $key => $value)
        {
            // Getting the name of the setter method
            $method = 'set'.ucfirst($key);

            // if the given setter exist
            if (method_exists($this, $method))
            {
                // Calling the setter
                $this->$method($value);
            }
        }
    }
}

?>