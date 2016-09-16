<?php

class RecommendationModel extends Model
{
    function getData($vars = [])
    {
        $view_data = [
            '1',
            '2',
            '3',
            '4',
            $vars['post_id'],
            $vars['post_type']
        ];

        return $view_data;
    }
}