<?php

namespace Projet\Models;

class UserModel extends Manager
{
    public function createUserForm($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            'INSERT INTO users (nom, prenom, email, password)
            VALUES (:nom, :prenom, :email, :password)');
        $req->execute($data);
        return $req;
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

}