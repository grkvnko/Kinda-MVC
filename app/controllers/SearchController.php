<?php

class SearchController extends Controller
{
    public function action($routes_arr)
    {
        $find_subject = strip_tags(rawurldecode($routes_arr[1]));

        if ($routes_arr[0] === 'tag') {

        } elseif ($routes_arr[0] === 'place') {

        } else {

        }

        $this->outView('search');
    }
}