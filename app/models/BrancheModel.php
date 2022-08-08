<?php

namespace Projet\Models;

class BrancheModel extends Manager
{
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

}