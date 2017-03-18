<?php

include_once $INDEX_DIR_ . '/app/vendor/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function ($cfg) use ($INDEX_DIR_){
    $models_path = $INDEX_DIR_ . '/app/vendor/php-activerecord/models';
    $db_user =    Config::$db['user'];
    $db_pass =    Config::$db['pass'];
    $db_db_name = Config::$db['db_name'];
    $db_host =    Config::$db['host'];

    $cfg->set_model_directory($models_path);
    $cfg->set_connections(array(
            'development' => "mysql://$db_user:$db_pass@$db_host/$db_db_name"));
});