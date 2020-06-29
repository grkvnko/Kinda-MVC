<?php

abstract class Controller
{
    public function action($routes_arr)
    {
        echo "action ", get_class($this);
    }

    /**
     * Получает данные со всех моделей входяших в структуру страницы ($structure_name)
     * и возвращает данные в виде массива.
     *
     * @param string $structure_name
     * @param array $models_var
     * @return array
     */
    private function getData($structure_name = 'default', $models_var = [])
    {
        $structure = 'structure_' . $structure_name;
        $view_data = [];

        $current_model = new BodyModel();
        $view_data['page_title'] = $current_model->getTitle();
        $view_data['og'] = $models_var['og'];

        foreach ($structure::$page_structure['components'] as $component) {
            $current_model_class = $component . 'Model';
            if (class_exists($current_model_class)) {
                $current_model = new $current_model_class($models_var);
                $view_data['page_title'] = $view_data['page_title'] . $current_model->getTitle();
                $view_data[$component] = $current_model->getViewData();
                if ($current_model->og<>[]) $view_data['og'] = $current_model->og;
            } else {
                //$view_data[$component]['error'] = 100;
                //throw new ErrGetModelDataException("", ERR::FATAL_ERROR);
            }
        }

        $view_data['error'] = 'OK';

        return $view_data;
    }

    /**
     * Последовательно выводит все представления входящие в структуру страницы ($structure_name) 
     *
     * @param string $structure_name
     * @param array $view_data
     */
    private function renderView($structure_name = 'default', $view_data = [])
    {
        $structure = 'structure_' . $structure_name;

        $temp['page_title'] = $view_data['page_title'];
        $temp['og']         = $view_data['og'];
        $view_data_body = $structure::$page_structure + $temp;

        BodyView::render('header', $view_data_body);

        foreach ($structure::$page_structure['components'] as $component) {
            try {
                $current_view = $component . 'View';
                $current_view = new $current_view;
                $current_view->render($view_data[$component]['data']);
            } catch (NoDataException $e) {
                $e->outMessage();
            }
        }

        BodyView::render('footer');
    }

    /**
     * Вывод готовой страницы по имени структуры ($structure_name)
     * 
     * @param string $structure_name
     * @param array $models_var
     */
    public function outView($structure_name = 'default', $models_var = [])
    {
        try {
            try {
                $view_data = $this->getData($structure_name, $models_var);
                $this->renderView($structure_name, $view_data);
            } catch (ErrGetModelDataException $e) {
                $view_data = $this->getData('error404',
                    [
                        'page_num' => 1,
                        'page_source' => 'posts_list',
                        'page_way' => 'page'
                    ]
                );
                $this->renderView('error404', $view_data);
            }
        } catch (ActiveRecord\DatabaseException $e) {
            $this->renderView('error', $this->getData('error') );
            echo $e->getMessage();
        }
    }
}