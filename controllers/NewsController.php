<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Template;
use models\Category;
use models\News;
use models\User;

class NewsController extends Controller
{
    public function indexAction()
    {
        if (User::isAuthor())
            return $this->Render('views/news/index-admin.php', null);
        else
            return $this->Render();
    }

    public function addAction()
    {
        $categoriesList = Category::getCategories();
        if (Core::getInstance()->requestMethod === 'POST') {
            $errors = [];
            $_POST['News_name'] = trim($_POST['News_name']);

            if (empty($_POST['News_name']))
                $errors['News_name'] = 'Назва порожня';
            if (empty($_POST['Genre_ID']))
                $errors['Genre_ID'] = 'Категорія порожня';
            if (empty($_POST['short_discription']))
                $errors['short_discription'] = 'Короткий опис порожній';
            if (empty($errors)) {
                News::addNews($_POST);
                return $this->redirect('/news');
            } else {
                $model = $_POST;
                return $this->Render(null, [
                    'errors' => $errors,
                    'model' => $model,
                    'categories' => $categoriesList
                ]);


            }

        }
        return $this->Render(null, [
            'categories' => $categoriesList
        ]);
    }
}