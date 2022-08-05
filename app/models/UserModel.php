<?php

namespace Projet\Models;

class UserModel extends Manager
{

    /* ************************************** */
    /* ************ USER ACCOUNT ************ */
    /* ************************************** */
    
    public function createUserForm($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'INSERT INTO users (nom, prenom, email, password)
            VALUES (:nom, :prenom, :email, :password)');
        $req->execute($data);
        return $req;
    }

    public function getEmail($email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT user_id FROM users WHERE email = ?");
        $req->execute(array($email));
        $query = $req->fetch();
        return $query;
    }    

    public function createUserBranche($userId, $brancheId)
    {
        $bdd = $this->dbConnect();
            $req = $bdd->prepare(
                "INSERT INTO users_branches(user_id, branche_id)
                VALUES ('{$userId}', '{$brancheId}')");
            $req->execute();
        return $req;
    }
    
    // Information about user with this email
    public function userConnection($email)
        {
            $bdd = $this->dbConnect();
            $req = $bdd->prepare('SELECT user_id, nom, prenom, email, password, picture, role FROM users WHERE email = ?');
            $req->execute(array($email));
            $query = $req->fetch();
            return $query;
        }

}