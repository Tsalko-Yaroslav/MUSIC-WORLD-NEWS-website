<?php

namespace models;

use core\Core;
use core\utils;

class User
{
    protected static $tableName = 'User';

    public static function addUser($login, $password, $lastName, $firstName)
    {
        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'login' => $login,
                'password' => self::hashPassword($password),
                'Firstname' => $lastName,
                'Surname' => $firstName
            ]
        );
    }
    public static function hashPassword($password)
    {
        return md5($password);
    }
    public static function removeUser($login)
    {

    }

    public static function updateUser($id, $updatesArr)
    {
        $updatesArr = Utils::filterArray($updatesArr, ['Lastname', 'Firstname']);
        \core\Core::getInstance()->db->update(self::$tableName, $updatesArr, [
            'id' => $id,

        ]);
    }

    public static function isLoginExists($login)
    {
        $user = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'login' => $login
        ]);
        return !empty($user);
    }

    public static function verifyUser($login, $password)
    {
        $User = \core\Core::getInstance()->db->select(
            self::$tableName, '*', [
            'login' => $login,
            'password' => $password
        ]);
        return !empty($User);
    }

    public static function getUserByLoginAndPassword($login, $password)
    {
        $user = \core\Core::getInstance()->db->select(
            self::$tableName, '*', [
            'login' => $login,
            'password' => self::hashPassword($password)
        ]);
        if (!empty($user))
            return $user[0];
        return null;
    }

    public static function authenticateUser($user)
    {
        $_SESSION['user'] = $user;
    }

    public static function logoutUser()
    {
        unset($_SESSION['user']);
    }

    public static function isUserAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public static function getCurrentAuthenticatedUser()
    {
        return $_SESSION['user'];
    }

    public static function isAdmin()
    {
        $user = User::getCurrentAuthenticatedUser();
        return $user['access_level'] == 3;
    }
    public static function isAuthor()
    {
        $user = User::getCurrentAuthenticatedUser();
        return $user['access_level'] >= 2;
    }

}