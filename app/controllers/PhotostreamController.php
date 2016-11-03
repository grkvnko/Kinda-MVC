<?php

class PhotostreamController extends Controller
{
    public function action($routes_arr, $action_way)
    {
        $page = 1;

        if (count($routes_arr) && ($routes_arr[0] == 'page')) {
            $page = (int)$routes_arr[1];
        }

        $this->outView('photostream', ['page_num' => $page, 'page_way' => 'photostream/page', 'page_source' => 'photostrm_pics']);
    }
}