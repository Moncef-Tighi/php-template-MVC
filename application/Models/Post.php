<?php
class Post extends \Model{

    public static function getAll()
    {    
        try {
            $db = static::connexion();
            $requete = $db->query('SELECT id, title, content FROM posts
                                ORDER BY created_at');
            $results = $requete->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
