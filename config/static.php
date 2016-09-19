<?php

class Config
{
    private static $site_url = '/';

    public static $db = [
        'user'    => 'root',
        'pass'    => '12341234',
        'db_name' => 'grk_beta',
        'host'    => 'localhost'
    ];

    public static function getSiteURL()
    {
        return self::$site_url;
    }

    public static function getDefaultLanguage()
    {
        return reset(Language::getLanguages());
    }
}