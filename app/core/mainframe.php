<?php

final class mainframe
{
    private static $instance;
    private static $site_config;
    private static $router;

    public static function load()
    {
        if (null === self::$instance) {
            static::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        self::$site_config = [];
        self::setLanguage();
        self::$router = new Router();
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private static function setLanguage(){
        // list of lang's
        $lang = 'ru';

        if(isset($_SESSION['lang'])) {
            $lang = $_SESSION['lang'];
        }

        self::$site_config['lang'] = $lang;
    }

    public static function start()
    {
        if (isset(self::$router)) {
            self::$router->run();
        } else {
            echo '';
        }
    }

    public static function getLanguage()
    {
        return self::$site_config['lang'];
    }
}