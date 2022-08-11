<?php

namespace Projet\Controllers;

class FrontController extends Controller
{

    // "Accueil" page
    public function home()
    {
        return $this->viewFront("home");
    }

    // "Créer un compte" page
    public function register()
    {
        return $this->viewFront("register");
    }

    // "Se connecter" page
    public function login()
    {
        return $this->viewFront("login");
    }

    // "Arbre généalogique" page
    public function genealogy($user_id)
    {
        return $this->viewFront("genealogy");
    }

    // "Mes cousins" page
    public function cousins($user_id)
    {
        return $this->viewFront("cousins");
    }

    // "Mon compte" page
    public function account($user_id)
    {
        return $this->viewFront("account");
    }

    // "Galerie photo" page OK
    public function gallery($user_id)
    {
        $branches = new \Projet\Models\BrancheModel();
        $userBranches = $branches->getUserBranches($user_id);
        $picture = new \Projet\Models\PictureModel();
        $array = [];
        // Get all pictures of this user's branches
        for($i = 0; $i < sizeof($userBranches); $i++){
            $pics = $picture->getBranchePictures($userBranches[$i]['branche_id']);
            $array = array_unique(array_merge($array, $pics), SORT_REGULAR);
        }
        // Eliminate duplicated pictures
        $userBranchesPictures = [];
        $index = 0;
        $key_array = [];
        foreach($array as $val) {
            if (!in_array($val["picture_id"], $key_array)) {
                $key_array[$index] = $val["picture_id"];
                $userBranchesPictures[$index] = $val;
            }
            $index++;
        }
        // Sort them by 'picture_id' : from the last added to the oldest one
        usort($userBranchesPictures, function($a, $b) {
            return $b['picture_id'] - $a['picture_id'];
        });
        return $this->viewFront("gallery", $userBranchesPictures);
    }
    
        
    

    // "Mes photos" page OK
    public function myPictures($user_id)
    {
        $pictures = new \Projet\Models\PictureModel();
        $userPictures = $pictures->getUserPictures($user_id);
        return $this->viewFront("my-pictures", $userPictures);
    }

}