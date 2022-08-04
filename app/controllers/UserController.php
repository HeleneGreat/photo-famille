<?php

namespace Projet\Controllers;

class UserController extends Controller
{

    public function createUserForm($post){
        $user = new \Projet\Models\UserModel();
        // Create a new user
        $data = [
            ':nom' => htmlspecialchars(($post['nom'])),
            ':prenom' => htmlspecialchars(($post['prenom'])),
            ':email' => htmlspecialchars(($post['email'])),
            ':password' => htmlspecialchars(($post['password']))
        ];
        $user->createUserForm($data);
        // Get his ID
        $getUserId = new \Projet\Models\UserModel();
        $userId = $getUserId->getId("user_id", "users", "email", $data[':email']);
        foreach($post["branches"] as $branche)
        {
            // Get branches ID
            $getBrancheId = new \Projet\Models\UserModel();
            $brancheId = $getBrancheId->getId("branche_id", "branches", "name", $branche);
            // Add his branche
            $addBranche = new \Projet\Models\UserModel();
            $addBranche->createUserBranche($userId, $brancheId);
        }



        return $this->viewFront("home");
    }

}