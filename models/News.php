<?php

namespace models;

use core\Core;
use core\utils;

class News
{
    protected static $tableName = 'Genre_news';

    public static function addNews($row)
    {
        $fieldsList = ['Genre_ID', 'News_name', 'short_discription',
            'News_text_content','News_text_content_2', 'Photo_link','content_photo','content_photo_2', 'Author_id', 'date'];
        $row = utils::filterArray($row, $fieldsList);

        Core::getInstance()->db->insert(self::$tableName, $row);
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
            'News_text_content', 'Photo_link', 'content_photo','Author_id', 'date'];
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
        $rows = Core::getInstance()->db->select(self::$tableName,'*',[
           'Genre_ID' => $genre_id
        ]);
        return $rows;
    }

}