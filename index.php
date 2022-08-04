<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';



try
{

    $controllerFront = new \Projet\Controllers\FrontController();

    $controllerUser = new \Projet\Controllers\UserController();

    
    if (isset($_GET['action']))
    {
        if($_GET['action'] == "register"){
            $controllerFront->register();
        } 

        elseif($_GET['action'] == "createUserForm"){
            $controllerUser->createUserForm($_POST);
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