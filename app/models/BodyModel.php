<?php

class BodyModel extends Model
{
    protected function getData($vars = [])
    {
        Translate::setWords([
            'KindaDemo' => ['en' => 'Kinda-MVC demo site ', 'ru' => 'Kinda-MVC демо сайт '],
        ]);
        $this->setTitle(Translate::getWordS('KindaDemo'));
        return [];
    }
}