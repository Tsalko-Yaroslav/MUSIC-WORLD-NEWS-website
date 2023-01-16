<?php

namespace controllers;

use core\Controller;
use models\Category;
use models\News;

class MainController extends Controller
{
    public function indexAction()
    {

        $category = Category::getCategories();
        $rows = News::GetNews();
        $mainRows = News::getSortedNewsASC();
        for ($i=4;$i<=count($mainRows);$i++)
        {
            unset($mainRows[$i]);
        }

        return $this->Render(null, [
            'category' => $category,
            'rows' => $rows,
            'mainRows'=>$mainRows
        ]);
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