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
        if (!isset($view_data['og'])) {
            $view_data['og'] = ['description' => 'Персональный фотоблог',
                                'image' => 'media/img/grkvnko.jpg'];
        }

        foreach (self::$templates[$elem] as $item) {
            include "app/templates/$item";
        }
    }
}