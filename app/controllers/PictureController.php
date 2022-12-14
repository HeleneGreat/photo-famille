<?php

namespace Projet\controllers;

class PictureController extends Controller
{

    // Save the newly added pictures OK
    public function addPicturesForm($files)
    {
        $people_id = $_SESSION['people_id'];
        // 1) Verify picture file and get temporal filename OK
        for($i = 0; $i < sizeof($files['picture']); $i++){
            $tempFilename = $this->verifyPictures($files['picture'][$i]);
            // 2) Save picture in 'pictures' table OK
            $this->saveNewPictures($people_id, $tempFilename);
            // 3) Get picture_id OK
            $pictureId = new \Projet\models\PictureModel();
            $picture_id = $pictureId->getPictureId($tempFilename);
            // 4) Save picture on server OK
            $pictureFiles = [
                'people_id' => $people_id,
                'picture_id' => $picture_id,
                'tempFilename' => $tempFilename,
                'files' => $files['picture'][$i]['tmp_name']
            ];
            $filename = $this->savePictures($pictureFiles);
            // 5) rename filename in DB OK
            $renameFile = new \Projet\models\PictureModel();
            $data = [
                ':picture_id' => $picture_id,
                ':newFilename' => $filename
            ];
            $renameFile->renameFile($data);
        }
        // 6) User has to add a branche to each picture OK
        header('Location: index.php?action=selectionner-branches');
    }

    // Add new picture in DB with just owner_id and tempFilename OK
    public function saveNewPictures($people_id, $tempFilename)
    {
        $newpicture = new \Projet\models\PictureModel();
        $data = [
            ':owner_id' => $people_id,
            ':tempFilename' => $tempFilename
        ];
        $newpicture->saveNewPictures($data);
    }

    // Page where the user has to choose the picture's branches OK
    public function addBrancheToPicture()
    {
        $people_id = $_SESSION['people_id'];
        // Get user's branches
        $branches = new \Projet\models\BrancheModel();
        $datas['branches'] = $branches->getUserBranches($people_id);
        // Get pictures without branches
        $pictures = new \Projet\models\PictureModel();
        $datas['pictures'] = $pictures->getUserPictureWithoutBranche($people_id);
        // If user has more than one branche
        if(sizeof($datas['branches']) > 1)
        {
            return $this->viewRegistered("pictures-add-branches", $datas);
        } else {
            foreach($datas['pictures'] as $picture)
            {
                $branches = new \Projet\models\BrancheModel();
                $branches->setPictureBranche($datas);
                $branche = new \Projet\models\BrancheModel();
                $branche->setBrancheColumn($picture['picture_id']);
            }
            header('Location: index.php?action=mes-photos');
        }
    }

    // Update the picture information
    public function updatePictureInfo($picture_id, $post){
        $picture = new \Projet\models\PictureModel();
        $data = [
            ':picture_id' => $picture_id,
            ':dayPicture' => htmlspecialchars($post['day']),
            ':monthPicture' => htmlspecialchars($post['month']),
            ':yearPicture' => htmlspecialchars($post['year']),
            ':locationPicture' => htmlspecialchars($post['location']),
            ':descriptionPicture' => htmlspecialchars($post['description'])
        ];
        $picture->updatePictureInfo($data);
        header(('Location: index.php?action=photo&id=' . $picture_id));
    }


    // Add a tag to a picture OK
    public function addTagOnPicture($picture_id, $post)
    {
        $nom = $post['nom'];
        $prenom = $post['prenom'];
        $people_id = $post['people_id'];
        // If the person is not already in DB, create it
        $people = new \Projet\models\userModel();
        $exist = $people->getPeople($nom, $prenom);
        if(empty($exist)){
            $newPeople = new \Projet\models\userModel();
            $newPeople->createPeople($nom, $prenom);
            $thisPeople = new \Projet\models\userModel();
            $people_id = $thisPeople->getPeopleId($nom, $prenom)['people_id'];
        }
        // Get this picture tags
        $tagged = new \Projet\models\PictureModel();
        $alreadyTagged = $tagged->getPicturePeople($picture_id);
        $choice = true;
        // If this person is already tagged, choice = false
        for($i = 0; $i < sizeof($alreadyTagged); $i++){
            if($people_id == $alreadyTagged[$i]['people_id']){
                $choice = false;
            }
        }
        // If this person is not already tagged, tag her
        if($choice == true){
            $newTag = new \Projet\models\PictureModel();
            $newTag->setPictureTag($picture_id, $people_id);
        }else{
            // TODO MSG "cette personne est d??j?? identifi??e"
        }
        header('Location: index.php?action=photo&id=' . $picture_id);
    }

    // Delete this picture tag OK
    public function deleteTagOnPicture($picture_id, $people_id)
    {
        $picture = new \Projet\models\PictureModel();
        $picture->deleteTagOnPicture($picture_id, $people_id);
        header('Location: index.php?action=photo&id=' . $picture_id);
    }
   
    // Delete this picture OK
    public function deletePicture($picture_id)
    {
        // Delete all branches associated with this picture
        $tags = new \Projet\models\BrancheModel();
        $tags->deletePictureBranches($picture_id);
        // Delete all tags associated with this picture
        $tags = new \Projet\models\PictureModel();
        $tags->deletePictureTags($picture_id);
        // Delete all comments associated with this picture
        $comments = new \Projet\models\CommentModel();
        $comments->deletePictureComments($picture_id);
        // Delete this picture
        $picture = new \Projet\models\PictureModel();
        $picture->deletePicture($picture_id);
        // TODO MSG confirmation photo supprim??e
        header('Location: index.php?action=galerie');
    }
}