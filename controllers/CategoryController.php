<?php

namespace controllers;
use core\Controller;
use core\Core;
use models\Category;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $rows = Category::getCategories();
        return $this->Render(null,[
            'rows'=>$rows
        ]);
    }
    public function addAction()
    {
        if(Core::getInstance()->requestMethod==='POST' )
        {


            Category::addCategory($_POST['Genre_name'],$_POST['Genre_discription'],$_FILES['Genre_photolink']['tmp_name']);
            return $this->redirect('/Category/index');

        }
        return $this->Render();
    }
}