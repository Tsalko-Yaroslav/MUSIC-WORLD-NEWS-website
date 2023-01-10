<?php

use core\DB;

include('config/database.php');


spl_autoload_register(function ($className) {
    $path = $className . '.php';
    include($path);
});


$core = core\Core::getInstance();
$core->Initialize();
\models\User::addUser('user', 'sssss', 'Yaros', 'ssss');

$core->Run();
$core->Done();