<?php

class AboutModel extends Model
{
    public static $module_name = "About";

    protected function getData($vars = [])
    {
        $view_data["text"] = ObjPosts::getPost();

        if ($view_data == null)
            throw new ErrGetModelDataException("", ERR::NO_DATA_FOR_VIEW);

        return $view_data;
    }
}