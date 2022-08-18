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
            'INSERT INTO people (nom, prenom, dateOfBirth, isUser, email, password)
            VALUES (:nom, :prenom, :birth, "yes", :email, :password)');
        $req->execute($data);
        return $req;
    }

    // Get a user id from its email OK
    public function getEmail($email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT people_id FROM people WHERE email = ?");
        $req->execute(array($email));
        $query = $req->fetch();
        return $query;
    }

    // Save the user's branches OK
    public function createUserBranche($userId, $brancheId)
    {
        $bdd = $this->dbConnect();
            $req = $bdd->prepare(
                "INSERT INTO people_branches(people_id, branche_id)
                VALUES ('{$userId}', '{$brancheId}')");
            $req->execute();
        return $req;
    }
    
    // Get a user's information from its email for connexion OK
    public function userConnection($email)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT people_id, nom, prenom, dateOfBirth, picture, email, password, role FROM people WHERE email = ?');
        $req->execute(array($email));
        $query = $req->fetch();
        return $query;
    }

    public function setUserPicture($people_id, $filename)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "UPDATE people
            SET picture = '{$filename}'
            WHERE people_id = '{$people_id}'");
        $req->execute();
    return $req;
    }

}