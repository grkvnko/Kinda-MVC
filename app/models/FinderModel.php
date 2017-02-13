<?php

class FinderModel extends Model
{
    protected function getData($vars = [])
    {
        if ( !isset($vars['search_subject']) ) {
            return [];
        }

        obj_post_p_attr::$current_attr_type = $vars['search_subject_type'];
        obj_post_p_attr::$current_attr_value = $vars['search_subject'];

        $found_posts = obj_post_p_attr::getPreviewPostsByPage($vars['page_num']);
        $found_data = [];

        foreach ($found_posts as $post) {
            $found_data[] = obj_post_p::getPreviewData($post->post_id);
        }

        $view_data = ['found_data' => $found_data, 'search_subject' => $vars['search_subject']];
        return $view_data;
    }
}