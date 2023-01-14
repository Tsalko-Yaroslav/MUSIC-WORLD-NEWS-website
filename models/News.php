<?php

namespace models;

use core\Core;
use core\utils;

class News
{
    protected static $tableName = 'Genre_news';

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


        Core::getInstance()->db->insert(self::$tableName, [
            'Genre_ID'=>$row['Genre_ID'],
            'News_name'=>$row['News_name'],
            'short_discription'=>$row['short_discription'],
            'News_text_content'=>$row['News_text_content'],
            'Photo_link'=>"../../{$newPath}",
            'Author_name'=>$row['Author_name'],
            'date'=> date('Y-m-d')

        ]);


    }

    public static function deleteNews($id)
    {
        Core::getInstance()->db->delete(self::$tableName, [
            'id' => $id
        ]);
    }

    public static function updateNews($id, $newRow)
    {
        $fieldsList = ['Genre ID', 'News_name', 'short_discription',
            'News_text_content', 'Photo_link', 'content_photo', 'Author_id', 'date'];
        $newRow = utils::filterArray($newRow, $fieldsList);
        Core::getInstance()->db->Update(self::$tableName, $newRow, [
            'id' => $id
        ]);
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

}