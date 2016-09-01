<?php

class LangPak
{
    private static $words_arr;

    public static function set_words(array $words_arr)
    {
        self::$words_arr = $words_arr;
    }

    public static function get_word($text)
    {
        $lang = Registry::$reg['lang'];
        echo self::$words_arr[$text][$lang];
    }
}
