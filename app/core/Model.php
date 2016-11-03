<?php

abstract class Model
{
    protected $data = [];
    protected $page_title = "";
    protected $view;
    public $og = [];
    static $module_name;

    public function __construct(Array $vars = [])
    {
        $this->data = $this->getData($vars);
        //$this->view =
    }

    protected function getData(Array $vars)
    {
        return [];
    }

    public function getViewData()
    {
        return [
            'data' => $this->data
        ];
    }

    public function getTitle()
    {
        return $this->page_title;
    }

    public function setTitle($str_title)
    {
        $this->page_title = $str_title;
    }

    public function addToTitle($str_title)
    {
        $this->page_title = $this->page_title . $str_title;
    }
}