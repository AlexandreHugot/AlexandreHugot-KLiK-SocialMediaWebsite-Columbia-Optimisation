<?php

require_once("../database.class.php");
require_once("Iusermanager.class.php");

class UserManager extends Database implements IUserManager {

    public function Create(User $user){

    }

    public function Delete(User $user){

    }

    public function Modify(User $user){

    }

    public function GetById(int $id) : User{

    }

    public function GetAll() : array{

    }
}

?>