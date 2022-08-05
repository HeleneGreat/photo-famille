<?php

namespace Projet\Controllers;

class UserController extends Controller
{

    public function createUserForm($post)
    {
        $user = new \Projet\Models\UserModel();
        // Create a new user
        $password = htmlspecialchars(($post['password']));
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            ':nom' => htmlspecialchars(($post['nom'])),
            ':prenom' => htmlspecialchars(($post['prenom'])),
            ':email' => htmlspecialchars(($post['email'])),
            ':password' => $passwordHash
        ];
        $isEmailUnique = $this->verifyEmail($data[':email']);
        if($isEmailUnique == false){
            // TODO
            echo "Cette adresse email est déjà associée à un compte";
        } else{
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

    // Verify if email is unique
    public function verifyEmail($email)
    {
        $uniqueEmail = new \Projet\Models\UserModel();
        $userEmail = $uniqueEmail->getEmail($email);
        if(empty($userEmail)){
            return true;
        }else{
            return false;
        }
    }

    // Connection form
    public function loginForm($post)
    {
        $email = $post['email'];
        $password = $post['password'];
        // Get correct password
        $user = new \Projet\Models\UserModel();
        $connectionUser = $user->userConnection($email);
        if(!empty($connectionUser)){
            // If password is correct => create a session
            $isPasswordCorrect = password_verify($password, $connectionUser['password']);
            if ($isPasswordCorrect){
                $_SESSION['user_id'] = $connectionUser['user_id'];
                $_SESSION['nom'] = $connectionUser['nom'];
                $_SESSION['prenom'] = $connectionUser['prenom'];
                $_SESSION['email'] = $connectionUser['email'];
                $_SESSION['password'] = $connectionUser['password'];
                $_SESSION['picture'] = $connectionUser['picture'];
                $_SESSION['role'] = $connectionUser['role'];
                header('Location: index.php?action=gallery');
            }
            else{
                // TODO
                echo "Problème mot de passe";
            }
        }else{
            // TODO
            echo "Problème adresse email";
        }

    }

   
    


}