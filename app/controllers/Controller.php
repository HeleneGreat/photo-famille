<?php

namespace Projet\Controllers;

class Controller
{

    // Return a front view
    public function viewFront($viewName, $datas = null)
    {
        include('./app/views/' . $viewName . '.php');
    }


}