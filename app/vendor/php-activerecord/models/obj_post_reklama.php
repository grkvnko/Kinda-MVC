<?php

class obj_post_reklama extends obj_post
{
    static $table_name = 'obj_post_reklama';

    public static function getPreviewData($post_id)
    {
        $obj_post = self::find($post_id);
        $post_data['text'] = $obj_post->text;
        return $post_data;
    }
}