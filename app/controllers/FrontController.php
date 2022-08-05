<?php

namespace Projet\Controllers;

class FrontController extends Controller
{

    // "Accueil" page
    public function home()
    {
        return $this->viewFront("home");
    }

    // "Créer un compte" page
    public function register()
    {
        return $this->viewFront("register");
    }

    // "Se connecter" page
    public function login()
    {
        return $this->viewFront("login");
    }

    // "Gallerie photo" page
    public function gallery()
    {
        return $this->viewFront("gallery");
    }

}