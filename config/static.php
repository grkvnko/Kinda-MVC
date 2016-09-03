<?php

class Config
{
    private static $site_url = '/grkvnko.me/';

    public static $db = [
        'user'    => 'root',
        'pass'    => '12341234',
        'db_name' => 'grkvnko',
        'host'    => 'localhost'
    ];

    public static function getSiteURL()
    {
        return self::$site_url;
    }

    public static function getDefaultLanguage()
    {
        return reset(LangPak::getLanguages());
    }
}