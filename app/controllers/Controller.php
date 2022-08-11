<?php

namespace Projet\Controllers;

class Controller
{

    // Return a front view
    public function viewFront($viewName, $datas = null)
    {
        include('./app/views/' . $viewName . '.php');
    }

    // Save the picture uploaded and return its filename
    public function verifyPictures($files)
    {
        if(isset($files['picture'])){
            $tmpName = $files['picture']['tmp_name'][0];
            $name = $files['picture']['name'][0];
            $size = $files['picture']['size'][0];
            $error = $files['picture']['error'][0];
        };
        // Get the file extension
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        // Extensions accepted
        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
        // Max size accepted in octet (1000000 octets = 1 Mo)
        $maxSize = 1000000;
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            return $name;
        }
        // TODO MSG
        else { echo "Une erreur est survenue. Vous devez ajouter une image de profil. La taille du fichier est limitée à 1 Mo. "; }
    }

    public function savePictures($data)
    {
        // Get the file extension
        $tabExtension = explode('.', $data['tempFilename']);
        $extension = strtolower(end($tabExtension));
        // Files are renamed like this example : "picture_22.png"
        $filename = filter_var("picture" . "_" . $data['picture_id'] . "." . $extension);
        // Files are saved in the App folders
        move_uploaded_file($data['files'][0], "./app/public/images/users/user_" . $data['user_id'] . "/" . $filename);
        return $filename;
    }

}