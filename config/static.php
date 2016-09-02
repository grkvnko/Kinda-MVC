<?php

class Config
{
    public static $db = [
        'user'    => 'root',
        'pass'    => '12341234',
        'db_name' => 'grk_beta',
        'host'    => 'localhost'
    ];

    private static $site_url = '/grkvnko.me/';

    public static function getSiteURL()
    {
        return self::$site_url;
    }
}