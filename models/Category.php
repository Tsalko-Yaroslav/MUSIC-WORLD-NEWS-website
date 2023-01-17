<?php

namespace models;

use core\Core;

class Category

{
    protected static $tableName = 'Genre';

    public static function addCategory($name, $discription, $path)
    {
        if (!empty($path)) {


            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/category/{$fileName}";
            } while (file_exists($newPath));
        } else {
            $newPath = "static/images/NOIMG.jpg";
        }
        move_uploaded_file($path, $newPath);
        Core::getInstance()->db->insert(self::$tableName, [
            'Genre_name' => $name,
            'Genre_discription' => $discription,
            'Genre_photolink' => "../../{$newPath}"
        ]);
    }

    public static function getCategoryById($id)
    {
        $rows = Core::getInstance()->db->select(self::$tableName, '*', [
            'id' => $id
        ]);
        if (!empty($rows)) {
            return $rows[0];
        } else
            return null;
    }

    public static function deletePhotoFile($id)
    {
        $row = self::getCategoryById($id);
        $photoPath = $row['Genre_photolink'];

        if (is_file($photoPath))
            unlink($photoPath);
    }

    public static function deleteCategory($id)
    {

        Core::getInstance()->db->delete(self::$tableName, [
            'id' => $id
        ]);
    }

    public static function changePhoto($id, $newPhoto)
    {
        self::deletePhotoFile($id);
        do {
            $fileName = uniqid() . '.jpg';
            $newPath = "files/category/{$fileName}";
        } while (file_exists($newPath));
        move_uploaded_file($newPhoto, $newPath);
        Core::getInstance()->db->update(self::$tableName, [

            'Genre_photolink' => "../../{$newPath}"
        ], [
            'id' => $id
        ]);
    }

    public static function updateCategory($id, $newName, $newDiscription)
    {
        Core::getInstance()->db->Update(self::$tableName, [
            'Genre_name' => $newName,
            'Genre_discription' => $newDiscription


        ], [
            'id' => $id
        ]);
    }

    public static function getCategories()
    {
        $rows = Core::getInstance()->db->select(self::$tableName);
        return $rows;
    }
}