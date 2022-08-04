<?php

namespace Projet\Models;

class Manager
{

    // Connexion to the database
    protected static function dbConnect()
    {
        try{
            $bdd = new \PDO('mysql:host=localhost;dbname=photo-famille;charset=utf8', 'root', '');
            $bdd->query("SET lc_time_names = 'fr_FR'");
            return $bdd;
        }        
        catch (\Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getId($tableId, $table, $column, $identifiant)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "SELECT {$tableId}
            FROM {$table}
            WHERE {$column} = '{$identifiant}'"
        );
        $req->execute();
        $query = $req->fetch();
        return $query[0];
    }
    
}