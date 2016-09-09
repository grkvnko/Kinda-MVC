<?php

class Preview_PostsModel extends Model
{
    protected function getData($vars = [])
    {
        $page_num = (isset($vars['page_num'])) ? $vars['page_num'] : 1;

        $post_data = [];
        $pages_count = posts_list::getPreviewPagesCount();
        $page_num = ($page_num > $pages_count) ? $pages_count : $page_num;

        $previewPostsList = posts_list::getPreviewPostsByPage($page_num);
        foreach ($previewPostsList as $post) {
            $class_post_type = 'obj_post_' . $post->post_type;
            $post_data[] = ['post_type' => $post->post_type] + $class_post_type::getPreviewData($post->post_id);
        }

        $view_data = [
            'page_num' => $page_num,
            'post_data' => $post_data
        ];

        $this->setTitle(" (страница {$page_num})");

        return $view_data;
    }
}