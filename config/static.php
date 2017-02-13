<?php

class Config
{
    private static $site_path = '/';

    public static $db = [
        'user'    => 'root',
        'pass'    => '123412341',
        'db_name' => 'grk_beta',
        'host'    => 'localhost'
    ];

    public static function getSiteURL()
    {
        return self::$site_path;
    }
    
    public static function getRealURL()
    {
        $CUT_REQUEST_URI = mb_substr($_SERVER['REQUEST_URI'], 0, 120);
        $m_request_uri = htmlentities($CUT_REQUEST_URI, ENT_QUOTES | ENT_HTML401);

        return $_SERVER["HTTP_HOST"] . $m_request_uri;
    }

    public static function getDefaultLanguage()
    {
        return reset(Language::getLanguages());
    }
}