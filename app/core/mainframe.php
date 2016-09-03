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
        self::$site_config['lang'] = self::getSelectedLanguage();
        self::$router = new Router();
    }

    private function __clone() {}

    private function __wakeup() {}

    private static function getSelectedLanguage()
    {
        if(isset($_SESSION['lang'])) {
            $selected_lang = mb_substr($_SESSION['lang'], 0, 3);
            if(in_array($selected_lang, LangPak::getLanguages())) {
                return $selected_lang; 
            }
        }
        return Config::getDefaultLanguage();
    }

    public static function setSelectedLanguage($lang)
    {
        $lang = mb_substr($lang, 0, 3);
        if(in_array($lang, LangPak::getLanguages(), true)) {
            $_SESSION['lang'] = $lang;
            return true;
        }
        return false;
    }

    public static function getCurrentLanguage()
    {
        return self::$site_config['lang'];
    }

    public static function start()
    {
        if (isset(self::$router)) {
            self::$router->run();
        } else {
            echo '';
        }
    }
}