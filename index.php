<?php

spl_autoload_register(function ($className) {
    $path = $className . '.php';
    include($path);
});

$core = core\Core::getInstance();
$core->Initialize();
$core->Run();
$core->Done();