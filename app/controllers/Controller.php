<?php

namespace Projet\controllers;

class Controller
{

    // Return a front view OK
    public function viewFront($viewName, $datas = null)
    {
        include('./app/views/' . $viewName . '.php');
    }

    public function viewRegistered($viewName, $datas = null)
    {
        if(!empty($_SESSION)){
            include('./app/views/' . $viewName . '.php');
        }else{
            header('Location: index.php');
            // TODO MSG
            echo "Vous devez être connecté pour accéder à ce contenu";
        }
    }

    // Get the picture's filename OK
    public function verifyPictures($files, $i = null)
    {
        if(isset($files['picture'])){
            $tmpName = $files['picture']['tmp_name'][$i];
            $name = $files['picture']['name'][$i];
            $size = $files['picture']['size'][$i];
            $error = $files['picture']['error'][$i];
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

    // Save into the user's folder its new uploaded pictures OK
    public function savePictures($data, $i = null)
    {
        // Get the file extension
        $tabExtension = explode('.', $data['tempFilename'][$i]);
        $extension = strtolower(end($tabExtension));
        // Files are renamed like this example : "picture_22.png"
        $filename = filter_var("picture" . "_" . $data['picture_id'][$i] . "." . $extension);
        // Files are saved in the App folders
        move_uploaded_file($data['files'][$i], "./app/public/images/users/user_" . $data['people_id'] . "/" . $filename);
        return $filename;
    }

}