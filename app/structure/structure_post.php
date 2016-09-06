<?php

class structure_post
{
    public static $page_structure = [
        'components' => [
            'Header',
            'Post',
            'Footer'
        ],
        'page_scripts' => [
            'jquery.min.js',
            'jquery.justifiedGallery.min.js',
            'blocksit.min.js',
            'post.js',
            'common.def.js'
        ],
        'page_css' => [
            'style.css',
            'top_post.css',
            'header.post.css',
            'preview_post.css',
            'justifiedGallery.min.css',
            'post.css'
        ]
    ];
}