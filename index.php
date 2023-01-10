<?php

use core\DB;
include('config/database.php');
spl_autoload_register(function ($className) {
    $path = $className . '.php';
    include($path);
});

$db = new DB(DATABASE_HOST, DATABASE_LOGIN,
    DATABASE_PASSWORD, DATABASE_BASENAME);
$rows = $db->select("Genre","*",
[
    'Genre_name'=>'Рок',
]);
var_dump($rows);
/*$core = core\Core::getInstance();
$core->Initialize();
$core->Run();
$core->Done();*/