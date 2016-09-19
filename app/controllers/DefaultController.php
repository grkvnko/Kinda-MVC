<?php

class DefaultController extends Controller
{
    public function __construct() {}
    
    public function setLanguage($routes_arr, $action_way = null)
    {
        if (Language::setCurrentLanguage($routes_arr[0]) && isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        }

        header('Location: ' . Config::getSiteURL());
    }
    
    public function mainPage($routes_arr, $action_way = null)
    {
        switch ($action_way) {
            case 'error404':
                $this->outView('Error404', [ 'page_num' => 1 ]);
                break;
            default:
                $this->selectPage([1]);
        }
    }

    public function selectPage($routes_arr, $action_way = null)
    {
        $this->outView('default', [ 'page_num' => normalizePage($routes_arr[0]) ]);
    }
}