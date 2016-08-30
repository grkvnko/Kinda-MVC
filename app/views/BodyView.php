<?php

class BodyView
{
    static $module_name = "Body";
    static $templates = [
        'header' => [
            'tpl.head.php'
        ],
        'footer' => [
            'tpl.foot.php'
        ]
    ];

    static public function render($elem, $view_data = [])
    {
        foreach (self::$templates[$elem] as $item) {
            include "app/templates/$item";
        }
    }
}