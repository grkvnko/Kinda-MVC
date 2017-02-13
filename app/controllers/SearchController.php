<?php

class SearchController extends Controller
{
    public function action($routes_arr, $action_way = null)
    {
        if ( count($routes_arr) > 0 ) {

            $search_subject = strip_tags(rawurldecode($routes_arr[1]));
            $page_num = normalizePage($routes_arr[3]);

            if ( in_array($routes_arr[0], obj_post_p_attr::getAttr() ) ) {

                $this->outView(
                    'search',
                    [
                        'search_subject' => $search_subject, 'search_subject_type' => $routes_arr[0],
                        'page_num' => $page_num,
                        'page_way' => 'search/' . $routes_arr[0] . '/' . $search_subject . '/page',
                        'page_source' => 'obj_post_p_attr'
                    ]
                );

            } else {
                $this->outView('search');
            }

        } else {
            $this->outView('search');
        }
    }
}

