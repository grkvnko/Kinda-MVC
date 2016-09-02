<?php

session_start();

spl_autoload_register('__autoload');

function __autoload($class_name)
{
    $arr_class_files = [
        'app/controllers/' . $class_name . '.php',
        'app/models/' . $class_name . '.php',
        'app/views/' . $class_name . '.php',
        'app/core/' . $class_name . '.php',
        'app/lib/' . $class_name . '.php',
        'app/structure/' . $class_name . '.php'
    ];

    foreach ($arr_class_files as $item) {
        if (file_exists($item)) {
            require_once $item;
            break;
        }
    }
}

require_once('config/static.php');
require_once('app/lib/library.php');
require_once('app/lib/db.php');
require_once('app/core/router.php');