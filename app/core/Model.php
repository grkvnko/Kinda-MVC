<?php

abstract class Model
{
    /**
     * Название компонента
     */
    static $module_name;

    /**
     * Данные модели для вывода
     */
    protected $data = [];

    /**
     * Заголовок всей страницы
     */
    protected $page_title = "";

    /**
     * Вид принадлежаший модели
     */
    protected $view;

    /**
     * Данные для OpenGraph
     * @var array
     */
    public $og = [];

    public function __construct(Array $vars = [])
    {
        $this->data = $this->getData($vars);
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