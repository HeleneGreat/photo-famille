<?php

namespace Projet\models;

class UserModel extends Manager
{

    /* ************************************** */
    /* ************ USER ACCOUNT ************ */
    /* ************************************** */
    // Create a user account OK
    public function createUserForm($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'INSERT INTO users (nom, prenom, email, password)
            VALUES (:nom, :prenom, :email, :password)');
        $req->execute($data);
        return $req;
    }

    // Get a user id from its email OK
    public function getEmail($email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT user_id FROM users WHERE email = ?");
        $req->execute(array($email));
        $query = $req->fetch();
        return $query;
    }

    // Save the user's branches OK
    public function createUserBranche($userId, $brancheId)
    {
        $bdd = $this->dbConnect();
            $req = $bdd->prepare(
                "INSERT INTO users_branches(user_id, branche_id)
                VALUES ('{$userId}', '{$brancheId}')");
            $req->execute();
        return $req;
    }
    
    // Get a user's information from its email for connexion OK
    public function userConnection($email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT user_id, nom, prenom, email, password, picture, role FROM users WHERE email = ?');
        $req->execute(array($email));
        $query = $req->fetch();
        return $query;
    }

}