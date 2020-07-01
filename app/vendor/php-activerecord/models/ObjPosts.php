<?php

class ObjPosts extends ActiveRecord\Model
{
    public static function getPost()
    {
        $post = self::find([
            'name' => 'About',
            'lang' => mainframe::getCurrentLanguage()
        ]);
        return $post->text;
    }
}