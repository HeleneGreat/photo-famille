<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';



try
{

    $controllerFront = new \Projet\Controllers\FrontController();

    $controllerUser = new \Projet\Controllers\UserController();

    $controllerPicture = new \Projet\Controllers\PictureController();

    
    if (isset($_GET['action']))
    {
        if($_GET['action'] == "register"){
            $controllerFront->register();
        } 

        elseif($_GET['action'] == "createUserForm"){
            $controllerUser->createUserForm($_POST);
        }

        elseif($_GET['action'] == "login"){
            $controllerFront->login();
        }

        elseif($_GET['action'] == "loginForm"){
            $controllerUser->loginForm($_POST);
        }

        elseif($_GET['action'] == "galerie"){
            $controllerFront->gallery();
        }

        elseif($_GET['action'] == "mes-photos"){
            $controllerPicture->myPictures($_SESSION['user_id']);
        }

        elseif($_GET['action'] == "addPictureForm"){
            $user_id = $_SESSION['user_id'];
            $controllerPicture->addPicturesForm($_FILES, $user_id);
        }

        elseif($_GET['action'] == "selectionner-branches"){
            $user_id = $_SESSION['user_id'];
            $controllerPicture->addBrancheToPicture($user_id);
        }

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