<?php

class Language 
{
    private static $languages = ['РУС' => 'ru', 'ENG' => 'en'];

    public static function getLanguages()  
    {
        return self::$languages;
    }

    public static function getSelectedLanguage()
    {
        if(isset($_SESSION['lang'])) {
            $selected_lang = mb_substr($_SESSION['lang'], 0, 3);
            if(in_array($selected_lang, self::getLanguages())) {
                return $selected_lang;
            }
        }
        return Config::getDefaultLanguage();
    }

    public static function setCurrentLanguage($lang)
    {
        $lang = mb_substr($lang, 0, 3);
        if(in_array($lang, self::getLanguages(), true)) {
            $_SESSION['lang'] = $lang;
            return true;
        }
        return false;
    }

    public static function getLangLinksList()
    {
        foreach (self::$languages as $name => $language) {
            echo '<a class="header_menu_lang" href="', Config::getSiteURL(), 'lang/', $language, '">', $name , '</a>';
        }
        return true;
    }
}