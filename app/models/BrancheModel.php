<?php

namespace Projet\models;

class BrancheModel extends Manager
{
    // Return the user's branches ids OK
    public function getUserBranches($people_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT branches.branche_id, name
            FROM branches
            JOIN people_branches ON people_branches.branche_id = branches.branche_id
            JOIN people ON people_branches.people_id = people.people_id 
            WHERE people_branches.people_id = ?');
        $req->execute(array($people_id));
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

    // Get users who have this branche
    public function getCousins($branche_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'SELECT people.people_id, nom, prenom, picture
            FROM people
            JOIN people_branches ON people_branches.people_id = people.people_id
            JOIN branches ON people_branches.branche_id = branches.branche_id 
            WHERE people_branches.branche_id = ?
            AND people.isUser = "yes"');
        $req->execute(array($branche_id));
        $query = $req->fetchAll();
        return $query;
    }
}