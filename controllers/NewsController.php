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
        $rows = News::getNews();
        if (User::isAuthor())
            return $this->Render('views/news/index-admin.php', [
                'rows'=>$rows
            ]);
        else
            return $this->Render(null,[
                'rows'=>$rows
            ]);
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
            if (empty($_POST['Author_name']))
                $errors['Author_name'] = 'Не вказано ініціали автора';
            if (empty($errors)) {
                News::addNews($_POST,$_FILES['Photo_link']['tmp_name']);
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
    public function viewAction($params)
    {
        $id = intval($params[0]);
        $category = Category::getCategoryById($id);
        $news = News::getNewsInCategory($id);
        return $this->Render(null,[
            'category'=>$category,
            'news'=>$news
        ]);
    }
}