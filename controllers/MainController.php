<?php

namespace controllers;

use core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->Render();
    }

    public function errorAction($code)
    {
        switch ($code) {
            case 404:
                return $this->Render('views/main/error.php');
                break;
            case 403:
                return $this->Render('views/main/error.php');
                break;
        }
    }
}