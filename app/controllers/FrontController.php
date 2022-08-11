<?php

namespace Projet\controllers;

class FrontController extends Controller
{

    // "Accueil" page OK
    public function home()
    {
        return $this->viewFront("home");
    }

    // "Créer un compte" page OK
    public function register()
    {
        return $this->viewFront("register");
    }

    // "Se connecter" page OK
    public function login()
    {
        return $this->viewFront("login");
    }

    // "Arbre généalogique" page
    public function genealogy()
    {
        $user_id = $_SESSION['user_id'];
        return $this->viewRegistered("genealogy");
    }

    // "Mes cousins" page
    public function cousins()
    {
        $user_id = $_SESSION['user_id'];
        return $this->viewRegistered("cousins");
    }

    // "Mon compte" page
    public function account()
    {
        $user_id = $_SESSION['user_id'];
        return $this->viewRegistered("account");
    }

    // "Galerie photo" page OK
    public function gallery()
    {
        $user_id = $_SESSION['user_id'];
        $branches = new \Projet\models\BrancheModel();
        $userBranches = $branches->getUserBranches($user_id);
        $picture = new \Projet\models\PictureModel();
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
        return $this->viewRegistered("gallery", $userBranchesPictures);
    }

    // "Mes photos" page OK
    public function myPictures()
    {
        $user_id = $_SESSION['user_id'];
        $pictures = new \Projet\models\PictureModel();
        $userPictures = $pictures->getUserPictures($user_id);
        return $this->viewRegistered("my-pictures", $userPictures);
    }

    // "Une photo" page OK
    public function onePicture($picture_id)
    {
        $picture = new \Projet\models\PictureModel();
        $thisPicture = $picture->getPictureInfo($picture_id);
        return $this->viewRegistered("one-picture", $thisPicture);
    }

}