<?php

namespace Projet\controllers;

class PictureController extends Controller
{

    // Save the newly added pictures OK
    public function addPicturesForm($files, $user_id)
    {
        // 1) Verify picture file and get temporal filename OK
        $tempFilename = $this->verifyPictures($files);
        // 2) Save picture in 'pictures' table OK
        $this->saveNewPictures($user_id, $tempFilename);
        // 3) Get picture_id OK
        $pictureId = new \Projet\Models\PictureModel();
        $picture_id = $pictureId->getPictureId($tempFilename);
        // 4) Save picture on server OK
        $pictureFiles = [
            'user_id' => $user_id,
            'picture_id' => $picture_id,
            'tempFilename' => $tempFilename,
            'files' => $files['picture']['tmp_name']
        ];
        $filename = $this->savePictures($pictureFiles);
        // 5) rename filename in DB OK
        $renameFile = new \Projet\Models\PictureModel();
        $data = [
            ':picture_id' => $picture_id,
            ':newFilename' => $filename
        ];
        $renameFile->renameFile($data);
        // 6) User has to add a branche to each picture OK
        header('Location: index.php?action=selectionner-branches');
    }

    // Add new picture in DB with just owner_id and tempFilename OK
    public function saveNewPictures($user_id, $tempFilename)
    {
        $newpicture = new \Projet\Models\PictureModel();
        $data = [
            ':owner_id' => $user_id,
            ':tempFilename' => $tempFilename
        ];
        $newpicture->saveNewPictures($data);
    }

    // Page where the user has to choose the picture's branches OK
    public function addBrancheToPicture($user_id)
    {
        // Get user's branches
        $branches = new \Projet\Models\BrancheModel();
        $datas['branches'] = $branches->getUserBranches($user_id);
        // Get pictures without branches
        $pictures = new \Projet\Models\PictureModel();
        $datas['pictures'] = $pictures->getUserPictureWithoutBranche($user_id);
        // If user has more than one branche
        if(sizeof($datas['branches']) > 1)
        {
            return $this->viewFront("pictures-add-branches", $datas);
        } else {
            foreach($datas['pictures'] as $picture)
            {
                $branches = new \Projet\Models\BrancheModel();
                $branches->setPictureBranche($datas);
                $branche = new \Projet\Models\BrancheModel();
                $branche->setBrancheColumn($picture['picture_id']);
            }
            header('Location: index.php?action=mes-photos');
        }
    }
    
   

}