<?php

abstract class Model {

    protected static function connexion() {
        static $db=null;
        if ($db ===null) {
            $host = 'localhost';
            $dbname = 'mvc';
            $username = 'root';
            $password = '';
        
            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                              $username, $password);    
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }
}

?>