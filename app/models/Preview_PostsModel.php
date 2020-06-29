<?php

class Preview_PostsModel extends Model
{
    protected function getData($vars = [])
    {
        $page_num = (isset($vars['page_num'])) ? $vars['page_num'] : 1;
        $vars['show_title'] = (isset($vars['show_title']) ? $vars['show_title'] : true);

        $post_data = [];
        $pages_count = posts_list::getPreviewPagesCount();
        $page_num = ($page_num > $pages_count) ? $pages_count : $page_num;

        $previewPostsList = posts_list::getPreviewPostsByPage($page_num);
        foreach ($previewPostsList as $post) {
            $class_post_type = 'obj_post_' . $post->post_type;
            $previewData = $class_post_type::getPreviewData($post->post_id);

            if ($previewData == null) continue;

            $post_data[] = ['post_type' => $post->post_type] + $previewData;
        }

        $view_data = [
            'page_num' => $page_num,
            'post_data' => $post_data,
            'show_title' => $vars['show_title'],
        ];

        $this->setTitle(" (".Translate::getWordS('Page')." {$page_num})");

        return $view_data;
    }
}