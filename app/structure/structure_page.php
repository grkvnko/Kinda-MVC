<?php

class structure_page
{
    public static $page_structure = [
        'components' => [
            'Header',
            'Separator',
            'Page_selector',
            'Preview_Posts',
            'Page_selector',
            'Footer'
        ],
        'page_scripts' => [
            'jquery.min.js',
            'lib.js',
            'jquery.justifiedGallery.min.js',
            'blocksit.min.js',
            'common.def.js',
            'common.js'
        ],
        'page_css' => [
            'style.css',
            'top_post.css',
            'header.css',
            'preview_post.css',
            'photostream.css',
            'justifiedGallery.min.css'
        ]
    ];
}