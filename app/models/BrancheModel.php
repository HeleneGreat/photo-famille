<?php

namespace Projet\models;

class BrancheModel extends Manager
{
    // Return the user's branches ids OK
    public function getUserBranches($user_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT branches.branche_id, name
            FROM branches
            JOIN users_branches ON users_branches.branche_id = branches.branche_id
            JOIN users ON users_branches.user_id = users.user_id 
            WHERE users_branches.user_id = ?');
        $req->execute(array($user_id));
        $query = $req->fetchAll();
        return $query;
    }

    // Set the added picture's branches id OK
    public function setPictureBranche($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "INSERT INTO pictures_branches (picture_id, branche_id)
            VALUES (:picture_id, :branche_id)"
            );
        $req->execute($data);
    }

    // Modify the 'brancheDefined' column to "yes" once it is done OK
    public function setBrancheColumn($picture_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "UPDATE pictures
            SET brancheDefined = 'yes'
            WHERE picture_id = ?"
            );
        $req->execute(array($picture_id));
    }
}