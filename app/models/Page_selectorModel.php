<?php

class Page_selectorModel extends Model
{
    protected function getData($vars = [])
    {
        $page_num = $vars['page_num'];
        $page_way = $vars['page_way'];
        $page_source = $vars['page_source'];
        
        $pages_count = $page_source::getPreviewPagesCount();
        $page_num = ($page_num > $pages_count) ? $pages_count : $page_num;

        return [
            'page_way' => $page_way,
            'page_num' => $page_num,
            'pages_count' => $pages_count
        ];
    }
}