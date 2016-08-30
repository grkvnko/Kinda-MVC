<?php

class Page_selectorModel extends Model
{
    protected function getData($vars = [])
    {
        $page_num = $vars['page_num'];
        $pages_count = posts_list::getPreviewPagesCount();
        $page_num = ($page_num > $pages_count) ? $pages_count : $page_num;

        return [
            'page_num' => $page_num,
            'pages_count' => $pages_count
        ];
    }
}