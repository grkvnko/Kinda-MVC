<?php

class PostController extends Controller
{
    public function showPost($routes_arr, $action_way = null)
    {
        $models_var = [
            'post_type' => $routes_arr[0],
            'post_id' => $routes_arr[1]
        ];

        $this->outView('post', $models_var);
    }
}