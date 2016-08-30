<?php

class PostModel extends Model
{
    protected function getData($vars = [])
    {
        $post_id = $vars['post_id'];
        $obj_post_by_type = obj_post::PostInstance($vars['post_type']);

        $post_id = normalizePage($post_id);
        $view_data = $obj_post_by_type::getPostData($post_id);

        if ($view_data == null) throw new ErrGetModelDataException("", ERR::NO_DATA_FOR_VIEW);

        $this->setTitle(": " . $view_data['title']);

        return $view_data;
    }
}