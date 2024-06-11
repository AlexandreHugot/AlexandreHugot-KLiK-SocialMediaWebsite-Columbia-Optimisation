<?php

/**
 * Class which represent a database for phpmyadmin, we can connect and execute query
 * @author Lakhdar Gibril
 */
class Database {

    private PDO $base;
    private bool $connected = false;

    /**
     * Getter getBase which allow to get our database 
     * @return PDO a PDO object which represent our database
     * @author Lakhdar Gibril
     */
    public function getBase() : PDO {
        return $this->$base;
    }

    /**
     * Natural constructor of the Database class, allow us to connect to the database
     * @param string $database : represent the path to the database for example : 'mysql:host=localhost;dbname=test'
     * @param string $username : string which contain the username to access the database
     * @param string $password : string which contain the password to access the database
     * @author Lakhdar Gibril
    */
    public __construct(string $database, string $username, string $password){
        
        // Connect to the database with a persistent connection.
        $this->base = new PDO($database,$username,$password, array(PDO::ATTR_PERSISTENT => true));
        $this->connected = true;
    }

    /**
     * Methods which allow to execute a query in the database
     * @param string $query : a string containing the query.
     * @param array $params : an array of string containing the parameters.
     * @author Lakhdar Gibril
     */
    protected function ExecuteQuery(string $query, array $params = []) : void {
        $request = $this->base->prepare($query);
        $request->execute($params); 
    }

    /**
     * Methods which allow to execute a query in the database and return the result
     * @param string $query : a string containing the query.
     * @param array $params : an array of string containing the parameters.
     * @return PDOStatement the result of the query
     * @author Lakhdar Gibril
    */
    protected function ExecuteNonQuery(string $query, array $params = []) : PDOStatement|false {
        $request = $this->base->prepare($query);
        if ($params === []) $request->execute();
        else $request->execute($params);
        return $request;
    }
}   

?>