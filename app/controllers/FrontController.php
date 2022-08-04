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

}