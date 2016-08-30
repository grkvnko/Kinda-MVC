<?php
/*
class DB
{
    static public $pdo;

    static function startConnection()
    {
        $db_user =    DB_access::$db['user'];
        $db_pass =    DB_access::$db['pass'];
        $db_db_name = DB_access::$db['db_name'];
        $db_host =    DB_access::$db['host'];

        self::$pdo = new PDO("mysql:host=$db_host;dbname=$db_db_name", "$db_user", "$db_pass");
    }
}
*/

require_once Registry::$reg['INDEX_DIR_'] . '/app/vendor/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function ($cfg) {
    $models_path = Registry::$reg['INDEX_DIR_'] . '/app/vendor/php-activerecord/models';
    $db_user =    DB_access::$db['user'];
    $db_pass =    DB_access::$db['pass'];
    $db_db_name = DB_access::$db['db_name'];
    $db_host =    DB_access::$db['host'];

    $cfg->set_model_directory($models_path);
    $cfg->set_connections(array(
        'development' => "mysql://$db_user:$db_pass@$db_host/$db_db_name"));
});