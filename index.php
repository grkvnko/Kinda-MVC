<?php

$INDEX_DIR_ = __DIR__;

require_once('config/static.php');
require_once('app/lib/library.php');
require_once('app/lib/db.php');
require_once('app/core/router.php');

$router = new Router();
$router->run();


