<?php

namespace models;

use core\Core;
use core\utils;

class News
{
    protected static $tableName = 'Genre_news';
    protected static $userFirstName;
    protected static $userSecondName;

    public static function addNews($row,$path)
    {
        if(!empty($path)) {


            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/news/{$fileName}";
            } while (file_exists($newPath));
        }
        else{
            $newPath = "static/images/NOIMG.jpg";
        }
        move_uploaded_file($path,$newPath);
        $user = User::getCurrentAuthenticatedUser();

        $userFirstName = $user['Firstname'];
        $userSecondName = $user['Surname'];
        Core::getInstance()->db->insert(self::$tableName, [
            'Genre_ID'=>$row['Genre_ID'],
            'News_name'=>$row['News_name'],
            'short_discription'=>$row['short_discription'],
            'News_text_content'=>$row['News_text_content'],
            'Photo_link'=>"../../{$newPath}",
            'Author_name'=>"$userFirstName $userSecondName",
            'date'=> date('Y-m-d'),
            'day_time'=>time('h:m:s')

        ]);


    }
    public static function getNewsByAuthor($user)
    {

        $userFirstName = $user[0]['Firstname'];
        $userSecondName = $user[0]['Surname'];
        $name = "$userFirstName $userSecondName";
        $rows = Core::getInstance()->db->select(self::$tableName, '*', [
            'Author_name' => $name
        ]);
        return $rows;

    }
    public static function getNewsByAuthorAs($user)
    {

        $userFirstName = $user['Firstname'];
        $userSecondName = $user['Surname'];
        $name = "$userFirstName $userSecondName";
        $rows = Core::getInstance()->db->select(self::$tableName, '*', [
            'Author_name' => $name
        ]);
        return $rows;

    }
    public static function deleteNews($id)
    {
        Core::getInstance()->db->delete(self::$tableName, [
            'id' => $id
        ]);
    }

    public static function updateNews($id, $newRow)
    {
        $user = User::getCurrentAuthenticatedUser();

        $userFirstName = $user['Firstname'];
        $userSecondName = $user['Surname'];
        Core::getInstance()->db->Update(self::$tableName, [
            'Genre_ID'=>$newRow['Genre_ID'],
            'News_name'=>$newRow['News_name'],
            'short_discription'=>$newRow['short_discription'],
            'News_text_content'=>$newRow['News_text_content'],
            'Author_name'=>"$userFirstName $userSecondName",
            'date'=> date('Y-m-d')
        ], [
            'id' => $id
        ]);
    }
    public static function changePhoto($id,$newPhoto)
    {
        self::deletePhotoFile($id);
        do {
            $fileName = uniqid() . '.jpg';
            $newPath = "files/news/{$fileName}";
        } while (file_exists($newPath));
        move_uploaded_file($newPhoto,$newPath);
        Core::getInstance()->db->update(self::$tableName,[

            'Photo_link' =>"../../{$newPath}"
        ],[
            'id'=>$id
        ]);
    }
    public static function deletePhotoFile($id){
        $row = self::getNewsById($id);
        $photoPath = $row['Photo_link'];

        if(is_file($photoPath))
            unlink($photoPath);
    }

    public static function getNewsById($id)
    {
        $row = Core::getInstance()->db->select(self::$tableName, '*', [
            'id' => $id
        ]);
        if (!empty($row))
            return $row[0];
        else
            return null;
    }

    public static function getNewsInCategory($genre_id)
    {
        $rows = Core::getInstance()->db->select(self::$tableName, '*', [
            'Genre_ID' => $genre_id
        ]);
        return $rows;
    }
    public static function GetNews()
    {
        $rows = Core::getInstance()->db->select(self::$tableName);
        return $rows;
    }
    public static function getSortedNewsASC()
    {
        $rows = Core::getInstance()->db->sortByDate(self::$tableName);
        return $rows;
    }


}