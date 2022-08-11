<?php

namespace Projet\controllers;

class BrancheController extends Controller
{

    // Save in DB each picture's branche_id OK
    public function selectBrancheForm($user_id, $post)
    {
        $length = sizeof($post['branche']);
        for($i = 0; $i < $length; $i++ )
        {
            $key = array_keys($post['branche'])[$i];
            $picture_id = explode("-", $key)[0];
            $branche_id = explode("-", $key)[1];
            $data = [
                ':picture_id' => $picture_id,
                ':branche_id' => $branche_id
            ];
            // Set picture branche in liaison table
            $branches = new \Projet\models\BrancheModel();
            $branches->setPictureBranche($data);
            // Update "brancheDefined" column in pictures table
            $brancheColumn = new \Projet\models\BrancheModel();
            $brancheColumn->setBrancheColumn($picture_id);
        }
        header('Location: index.php?action=mes-photos');

    }

}