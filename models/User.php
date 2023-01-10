<?php

namespace models;

use core\Core;

class User
{
    protected static $tableName = 'User';

    public static function addUser($login, $password, $lastName, $firstName)
    {
        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'login' => $login,
                'password' => $password,
                'Firstname' => $lastName,
                'Surname' => $firstName
            ]
        );
    }

    public static function RemoveUser($login)
    {

    }

    public static function UpdateUser()
    {

    }
}