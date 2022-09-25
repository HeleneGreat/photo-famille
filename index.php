<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';



try
{

    $controllerFront = new \Projet\controllers\FrontController();

    $controllerUser = new \Projet\controllers\UserController();

    $controllerPicture = new \Projet\controllers\PictureController();

    $controllerBranche = new \Projet\controllers\BrancheController();

    $controllerComment = new \Projet\controllers\CommentController();

    
    if (isset($_GET['action']))
    {
        ////////////////////////////////////////
        /////////////// REGISTER ///////////////
        ////////////////////////////////////////
        if($_GET['action'] == "register"){
            $controllerFront->register();
        } 

        elseif($_GET['action'] == "createUserForm"){
            $controllerUser->createUserForm($_POST, $_FILES);
        }

        /////////////////////////////////////////
        /////////////// CONNEXION ///////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "login"){
            $controllerFront->login();
        }

        elseif($_GET['action'] == "loginForm"){
            $controllerUser->loginForm($_POST);
        }

        /////////////////////////////////////////
        //////////////// GALLERY ////////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "galerie"){
            if(isset($_GET['tag'])){
                $tag = $_GET['tag'];
                $controllerFront->galleryOfThisTag($tag);
            }else if(isset($_GET['owner'])){
                $owner = $_GET['owner'];
                $controllerFront->galleryOfThisOwner($owner);
            }else{
                $controllerFront->gallery();
            }
        }

        /////////////////////////////////////////
        ////////////// ONE PICTURE //////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "photo"){
            $picture_id = $_GET['id'];
            $controllerFront->onePicture($picture_id);
        }

        elseif($_GET['action'] == "updatePictureInfoForm"){
            $picture_id = $_GET['id'];
            $controllerPicture->updatePictureInfo($picture_id, $_POST);
        }
        
        elseif($_GET['action'] == "getpeople"){
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $controllerUser->getPeople($nom, $prenom);
        }

        elseif($_GET['action'] == "addTagOnPictureForm"){
            $picture_id = $_GET['id'];
            $controllerPicture->addTagOnPicture($picture_id, $_POST);
        }

        elseif($_GET['action'] == "deleteTagOnPicture"){
            $people_id = $_GET['people'];
            $picture_id = $_GET['picture'];
            $controllerPicture->deleteTagOnPicture($picture_id, $people_id);
        }

        elseif($_GET['action'] == "commentForm"){
            $picture_id = $_GET['id'];
            $controllerComment->commentForm($picture_id, $_POST);
        }

        elseif($_GET['action'] == "picture-delete"){
            $picture_id = $_GET['id'];
            $controllerPicture->deletePicture($picture_id);
        }

        /////////////////////////////////////////
        ////////////// FAMILY TREE //////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "ma-genealogie"){
            $controllerFront->genealogy();
        }

        /////////////////////////////////////////
        //////////////// COUSINS ////////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "mes-cousins"){
            $controllerFront->cousins();
        }

        /////////////////////////////////////////
        ///////////// USER PICTURES /////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "mes-photos"){
            $controllerFront->myPictures();
        }

        elseif($_GET['action'] == "addPictureForm"){
            $files = $controllerPicture->reArrangeArrayFiles($_FILES['picture']);
            $controllerPicture->addPicturesForm($files);
        }

        elseif($_GET['action'] == "selectionner-branches"){
            $controllerPicture->addBrancheToPicture();
        }

        elseif($_GET['action'] == "selectBrancheForm"){
            $controllerBranche->selectBrancheForm($_POST);
        }

        /////////////////////////////////////////
        //////////////// ACCOUNT ////////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "mon-compte"){
            $controllerFront->account();
        }

        /////////////////////////////////////////
        ////////////// DECONNEXION //////////////
        /////////////////////////////////////////
        elseif($_GET['action'] == "deconnexion"){
            session_unset();
            session_destroy();
            header('Location: index.php');
        }
        
    }

    else
    {
        $controllerFront->home();
    }

}

catch (Exception $e)
{
    // header('Location: index.php?action=error');
    // In developpement, change the error page by this to see the error message :
    echo $e->getMessage();
}

catch (Error $e)
{
    // header('Location: index.php?action=error');
    // In developpement, change the error page by this to see the error message :
    echo $e->getMessage();
}