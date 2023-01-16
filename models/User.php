<?php

namespace models;

use core\Controller;
use core\Core;
use core\Template;
use core\utils;

class User
{
    protected static $tableName = 'User';
    protected static $tableName2 = 'Access_level_request';

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
        $updatesArr = Utils::filterArray($updatesArr, ['Lastname', 'Firstname', 'access_level']);
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

    public static function isAuthorByParams($user)
    {
        return $user['access_level'] == 2;
    }

    public static function isAuthor()
    {
        $user = User::getCurrentAuthenticatedUser();
        return $user['access_level'] == 2;
    }

    public static function requestAdd($request_text)
    {

        $user = self::getCurrentAuthenticatedUser();

            \core\Core::getInstance()->db->insert(
                self::$tableName2, [
                'user_id' => $user['id'],
                'request_text' => $request_text
            ]);

    }

    public static function deleteRequest($id)
    {
        Core::getInstance()->db->delete(self::$tableName2, [
            'user_id' => $id
        ]);
    }

    public static function getRequests()
    {
        $rows = Core::getInstance()->db->select(self::$tableName2);
        return $rows;
    }

    public static function getUserById($id)
    {
        $row = Core::getInstance()->db->select(self::$tableName, '*', [
            'id' => $id
        ]);
        return $row;
    }

    public static function getUserIdByName($name)
    {
        $array = explode(' ', $name);

        $row = Core::getInstance()->db->select(self::$tableName, 'id', [
            'Firstname' => $array[0],
            'Surname' => $array[1]
        ]);
        if (!empty($row))
            return $row[0];
        else
            return null;
    }
    public static function isRequestExist($id)
    {
        $user = \core\Core::getInstance()->db->select(self::$tableName2, '*', [
            'user_id' => $id
        ]);
        return empty($user);
    }

}