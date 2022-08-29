<?php

namespace Projet\controllers;

class UserController extends Controller
{

    // Create a new user OK
    public function createUserForm($post, $files)
    {
        $user = new \Projet\models\UserModel();
        // Create a new user
        $password = htmlspecialchars(($post['password']));
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            ':nom' => htmlspecialchars(($post['nom'])),
            ':prenom' => htmlspecialchars(($post['prenom'])),
            ':birth' => htmlspecialchars($post['birth']),
            ':email' => htmlspecialchars(($post['email'])),
            ':password' => $passwordHash
        ];
        $isEmailUnique = $this->verifyEmail($data[':email']);
        if($isEmailUnique == false){
            // TODO MSG
            echo "Cette adresse email est déjà associée à un compte";
        } else{
            $user->createUserForm($data);
            // Get his ID
            $getUserId = new \Projet\models\UserModel();
            $people_id = $getUserId->getId("people_id", "people", "email", $data[':email']);
            foreach($post["branches"] as $branche)
            {
                // Get branches ID
                $getBrancheId = new \Projet\models\UserModel();
                $brancheId = $getBrancheId->getId("branche_id", "branches", "name", $branche);
                // Add his branche
                $addBranche = new \Projet\models\UserModel();
                $addBranche->createUserBranche($people_id, $brancheId);
            }
            // Create an image folder for the user
            mkdir("./app/public/images/users/user_" . $people_id);
            // Verify picture file and get its filename
            $pictureFilename = $this->verifyPictures($files);
            // Save picture on server
            $pictureFiles = [
                'people_id' => $people_id,
                'picture_id' => htmlspecialchars(($post['prenom'])),
                'tempFilename' => $pictureFilename,
                'files' => $files['picture']['tmp_name']
            ];
            $filename = $this->savePictures($pictureFiles);
            // Save picture in DB
            $picture = new \Projet\models\UserModel();
            $picture->setUserPicture($people_id, $filename);
            header('Location: index.php');
        }
    }

    // Verify if email is unique OK
    public function verifyEmail($email)
    {
        $uniqueEmail = new \Projet\models\UserModel();
        $userEmail = $uniqueEmail->getEmail($email);
        if(empty($userEmail)){
            return true;
        }else{
            return false;
        }
    }

    // Connection form OK
    public function loginForm($post)
    {
        $email = $post['email'];
        $password = $post['password'];
        // Get correct password
        $user = new \Projet\models\UserModel();
        $connectionUser = $user->userConnection($email);
        if(!empty($connectionUser)){
            // If password is correct => create a session
            $isPasswordCorrect = password_verify($password, $connectionUser['password']);
            if ($isPasswordCorrect){
                $_SESSION['people_id'] = $connectionUser['people_id'];
                $_SESSION['nom'] = $connectionUser['nom'];
                $_SESSION['prenom'] = $connectionUser['prenom'];
                $_SESSION['birth'] = $connectionUser['birth'];
                $_SESSION['picture'] = $connectionUser['picture'];
                $_SESSION['email'] = $connectionUser['email'];
                $_SESSION['password'] = $connectionUser['password'];
                $_SESSION['role'] = $connectionUser['role'];
                header('Location: index.php?action=galerie');
            }
            else{
                // TODO MSG
                echo "Problème mot de passe";
            }
        }else{
            // TODO MSG
            echo "Problème adresse email";
        }
    }

    public function getPeople($nom, $prenom)
    {          
        $user = new \Projet\models\UserModel();
        $results = $user->getPeople($nom, $prenom);
        if(empty($results)){
            echo "Aucun résultat";
        }else{
            foreach($results as $people){
                echo "<p class='proposition rounded-50 center'>";
                echo "<span class='prenom'>" .$people['prenom'] . "</span>" . " ";
                echo "<span class='nom'>" . $people['nom'] . "</span>";
                echo "</p>";
            }
        }
    }


}