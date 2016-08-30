<?php

abstract class obj_post extends ActiveRecord\Model
{
    static public function getPreviewData($post_id) { return []; }
    static public function getPostData($post_id) { return []; }

    static public function PostInstance($post_type) {
        $obj_post_by_type = 'obj_post_' . $post_type;

        if (!class_exists($obj_post_by_type)) {
            throw new ErrGetModelDataException("", ERR::FATAL_ERROR);
        }

        return $obj_post_by_type;
    }
}