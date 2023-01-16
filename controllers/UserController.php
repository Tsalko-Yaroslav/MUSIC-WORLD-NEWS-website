<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Error;
use models\News;
use models\User;

class UserController extends Controller
{
    public function indexAction()
    {
        $requests = User::getRequests();
        $user = User::getCurrentAuthenticatedUser();
        $news = News::getNewsByAuthorAs($user);
        if (User::isAuthor()) {
            return $this->Render('views/user/index-author.php', [
                'user' => $user,
                'rows' => $news
            ]);
        } else if (User::isAdmin()) {
            return $this->Render('views/user/index-admin.php', [
                'user' => $user,
                'requests' => $requests
            ]);
        } else {
            return $this->Render(null, [
                'user' => $user]);
        }
    }

    public function viewAction($params)
    {
        $id = intval($params[0]);
        $user = User::getUserById($id);
        $news = News::getNewsByAuthor($user);
        return $this->Render(null, [
            'user' => $user,
            'rows' => $news
        ]);
    }

    public function registerAction()
    {
        if (User::isUserAuthenticated())
            $this->redirect('/');
        if (Core::getInstance()->requestMethod === 'POST') {
            $errors = [];
            if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL))
                $errors['login'] = 'Помилка при введенні електронної пошти';
            if (User::isLoginExists($_POST['login']))
                $errors['login'] = 'Даний логін зайнято';
            if ($_POST['password'] != $_POST['password2'])
                $errors['password'] = 'Паролі не співпадають';
            /* валідація інших полів форми */
            if (count($errors) > 0) {
                $model = $_POST;
                return $this->render(null, [
                    'errors' => $errors,
                    'model' => $model
                ]);
            } else {

                User::addUser($_POST['login'], $_POST['password'], $_POST['Surname'], $_POST['Firstname']);
                $user = User::getUserByLoginAndPassword($_POST['login'], $_POST['password']);
                User::authenticateUser($user);
                return $this->RenderViews('register-success');

            }

        } else
            return $this->render();
    }

    public function loginAction()
    {
        if (User::isUserAuthenticated())
            $this->redirect('/');
        if (Core::getInstance()->requestMethod === 'POST') {
            $user = User::getUserByLoginAndPassword($_POST['login'], $_POST['password']);
            $error = null;
            if (empty($user)) {
                $error = 'Неправильний логін або пароль';
            } else {
                User::authenticateUser($user);
                $this->redirect('/');
            }
        }
        return $this->render(null, [
            'error' => $error
        ]);
    }

    public function logoutAction()
    {
        User::logoutUser();
        $this->redirect('/user/login');

    }

    public function requestAction()
    {
        $user = User::getCurrentAuthenticatedUser();

            if (Core::getInstance()->requestMethod === 'POST') {
                if(User::isRequestExist($user['id'])) {
                    User::requestAdd($_POST['request_text']);
                    return $this->RenderViews('index');
                }
                return $this->RenderViews('index');
            }
            return $this->Render();

    }

    public function addaccessAction($params)
    {
        if (User::isAdmin()) {
            $id = intval($params[0]);
            $user = User::getUserById($id);
            User::updateUser($id, ['access_level' => 2]);
            User::deleteRequest($id);
        } else {
            return $this->error('403', 'Немає доступу!');
        }
    }

    public function cancelaccessAction($params)
    {
        if (User::isAdmin()) {
            $id = intval($params[0]);
            User::deleteRequest($id);
        } else {
            return $this->error('403', 'Немає доступу!');
        }
    }
    public function error($code, $message)
    {
        return new Error($code, $message);
    }
}