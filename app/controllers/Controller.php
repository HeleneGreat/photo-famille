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
    public function verifyPictures($files)
    {
        if(isset($files['picture'])){
            $tmpName = $files['picture']['tmp_name'];
            $name = $files['picture']['name'];
            $size = $files['picture']['size'];
            $error = $files['picture']['error'];
        } else {
            $tmpName = $files['tmp_name'];
            $name = $files['name'];
            $size = $files['size'];
            $error = $files['error'];
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
    public function savePictures($data)
    {
        // Get the file extension
        $tabExtension = explode('.', $data['tempFilename']);
        $extension = end($tabExtension);
        // Files are renamed like this example : "picture_22.png"
        $filename = strtolower(filter_var("picture" . "_" . $data['picture_id'] . "." . $extension));
        // Files are saved in the App folders
        move_uploaded_file($data['files'], "./app/public/images/users/user_" . $data['people_id'] . "/" . $filename);
        return $filename;
    }

    // Re-arrange $_FILES array when uploading multiple pictures to always have the same $_Files array structure
    // https://www.php.net/manual/en/features.file-upload.multiple.php
    function reArrangeArrayFiles($files) {
        $file_array = array();
        $file_count = count($files['name']);
        $file_keys = array_keys($files);
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_array['picture'][$i][$key] = $files[$key][$i];
            }
        }
        return $file_array;
    }

}