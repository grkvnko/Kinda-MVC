<?php

class ErrorModel extends Model
{
    public static $module_name = "Error";

    protected  function getData($vars = [])
    {
        return [ 'error' => 0 ];
    }
}