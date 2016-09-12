<?php

class structure_default
{
    public static $page_structure = [
        'components' => [
            'Header',
            'Gallery',
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
            'justifiedGallery.min.css'
        ]
    ];
}