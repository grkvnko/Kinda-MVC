<?php

class Translate
{
    private static $words_arr = [];

    public static function getDictionary() {
        return self::$words_arr;
    }

    public static function setWords(array $words_arr)
    {
        self::$words_arr = array_merge(self::$words_arr, $words_arr);
    }

    public static function getWord($text)
    {
        $text_find = self::$words_arr[$text][mainframe::getCurrentLanguage()];
        echo (isset($text_find)) ? $text_find : self::$words_arr[$text][Config::getDefaultLanguage()];
    }

    public static function getWordS($text)
    {
        $text_find = self::$words_arr[$text][mainframe::getCurrentLanguage()];
        return (isset($text_find)) ? $text_find : self::$words_arr[$text][Config::getDefaultLanguage()];
    }
}