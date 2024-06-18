<?php
require_once("Views/Route/Router.class.php");
    try {
        $router = new Router();
        $router->routing($_GET, $_POST);
    }
    catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
?>