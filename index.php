<?php

$INDEX_DIR_ = __DIR__;

require_once 'app/core/loader.php';
require_once 'app/core/mainframe.php';

mainframe::load();
mainframe::start();