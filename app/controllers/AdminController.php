<?php

class AdminController extends Controller
{
    public function __construct() {}
    
    public function start($routes_arr, $action_way = null)
    {
        $this->outView('admin_auth');
    }
}