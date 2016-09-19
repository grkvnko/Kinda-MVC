<?php

final class mainframe
{
    private static $instance;
    private static $site_config = [];
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
        self::$site_config['lang'] = Language::getSelectedLanguage();
        self::$router = new Router();
    }

    private function __clone() {}

    private function __wakeup() {}

    public static function start()
    {
        if (isset(self::$router)) {
            self::$router->run();
        } else {
            echo '';
        }
    }

    public static function getCurrentLanguage()
    {
        return self::$site_config['lang'];
    }
}