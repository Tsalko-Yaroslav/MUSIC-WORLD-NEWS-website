<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Error;
use models\Category;
use models\News;
use models\User;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $rows = Category::getCategories();
        return $this->Render(null, [
            'rows' => $rows
        ]);
    }

    public function error($code, $message)
    {
        return new Error($code, $message);
    }

    public function addAction()
    {
        if (!User::isAdmin())
            return $this->error('403', 'Немає доступу!');
        if (Core::getInstance()->requestMethod === 'POST') {
            $errors = [];
            $_POST['Genre_name'] = trim($_POST['Genre_name']);

            if (empty($_POST['Genre_name']))
                $errors['Genre_name'] = 'Назва категорії порожня';
            if (empty($errors)) {
                Category::addCategory($_POST['Genre_name'], $_POST['Genre_discription'], $_FILES['Genre_photolink']['tmp_name']);
                return $this->redirect('/Category/index');
            } else {
                $model = $_POST;
                return $this->Render(null, [
                    'errors' => $errors,
                    'model' => $model
                ]);

            }

        }
        return $this->Render();
    }


    public function editAction($params)
    {
        $id = intval($params[0]);
        if (!User::isAdmin())
            return $this->error('403', 'Немає доступу!');
        if ($id > 0) {
            $category = Category::getCategoryById($id);
            if (Core::getInstance()->requestMethod === 'POST') {


                $errors = [];
                $_POST['Genre_name'] = trim($_POST['Genre_name']);

                if (empty($_POST['Genre_name']))
                    $errors['Genre_name'] = 'Назва категорії порожня';
                if (empty($errors)) {
                    Category::updateCategory($id, $_POST['Genre_name'], $_POST['Genre_discription']);
                    if (!empty($_FILES['Genre_photolink']['tmp_name'])) {
                        Category::changePhoto($id, $_FILES['Genre_photolink']['tmp_name']);
                    }
                    return $this->redirect('/Category/index');
                } else {
                    $model = $_POST;
                    return $this->Render(null, [
                        'errors' => $errors,
                        'model' => $model,
                        'category' => $category
                    ]);

                }


            }

            return $this->Render(null, [
                'category' => $category
            ]);
        } else {
            return $this->error('403', 'Немає доступу!');
        }
    }

    public function deleteAction($params)
    {
        $id = intval($params[0]);
        $yes = boolval($params[1] === 'yes');
        if (!User::isAdmin())
            return $this->error(403, '');
        if ($id > 0) {
            $category = Category::getCategoryById($id);
            if ($yes) {
                $filePath = $category['Genres_photolink'];
                if (is_file($filePath))
                    unlink($filePath);

                Category::deleteCategory($id);
                return $this->redirect('/Category/index');
            }
            return $this->render(null, [
                'category' => $category
            ]);
        } else
            return $this->error(403, '');
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