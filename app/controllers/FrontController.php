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
        $people_id = $_SESSION['people_id'];
        return $this->viewRegistered("genealogy");
    }

    // "Mes cousins" page
    public function cousins()
    {
        $people_id = $_SESSION['people_id'];
        // Get user's branches
        $branche = new \Projet\models\BrancheModel();
        $userBranches = $branche->getUserBranches($people_id);
        // Get his cousins = users with the same branches
        $cousin = new \Projet\models\BrancheModel();
        $userCousins = [];
        foreach ($userBranches as $branche_id)
        {
            $userCousins += $cousin->getCousins($branche_id['branche_id']);
        }
        return $this->viewRegistered("cousins", $userCousins);
    }

    // "Mon compte" page
    public function account()
    {
        $people_id = $_SESSION['people_id'];
        return $this->viewRegistered("account");
    }

    // "Galerie photo" page OK
    public function gallery($tag_id)
    {
        $picture = new \Projet\models\PictureModel();
        // To show all pictures from the user's cousins
        if($tag_id == ""){
            $people_id = $_SESSION['people_id'];
            $branches = new \Projet\models\BrancheModel();
            $userBranches = $branches->getUserBranches($people_id);
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
        // To show all pictures of this taggued person
        }else{
            $userBranchesPictures = $picture->getTagPictures($tag_id);
        }
        return $this->viewRegistered("gallery", $userBranchesPictures);
    }

    // "Mes photos" page OK
    public function myPictures()
    {
        $people_id = $_SESSION['people_id'];
        $pictures = new \Projet\models\PictureModel();
        $userPictures = $pictures->getUserPictures($people_id);
        return $this->viewRegistered("my-pictures", $userPictures);
    }

    // "Une photo" page OK
    public function onePicture($picture_id)
    {
        $picture = new \Projet\models\PictureModel();
        $data['picture'] = $picture->getPictureInfo($picture_id);
        $people = new \Projet\models\PictureModel();
        $data['people'] = $people->getPicturePeople($picture_id);
        $comment = new \Projet\models\CommentModel();
        $data['comment']= $comment->getPictureComments($picture_id);
        return $this->viewRegistered("one-picture", $data);
    }

}