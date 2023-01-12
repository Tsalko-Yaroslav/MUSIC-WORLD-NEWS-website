<?php

namespace core;

class utils
{
    public static function filterArray($arr, $fieldsList)
    {
        $newArray = [];
        foreach ($arr as $key => $value)
            if (in_array($key, $fieldsList))
                $newArray[$key] = $value;
        return $newArray;
    }
}