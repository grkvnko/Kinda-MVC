<?php

class ERR
{
    const NO_DATA_FOR_VIEW = 1;
    const FATAL_ERROR = 100;
}

function normalizePage($page_num)
{
    $page_num = mb_substr($page_num, 0, 5);
    $page_num = (int) $page_num;
    $page_num = ($page_num<=0)?1:$page_num;
    return $page_num;
}

function varDump($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

class ErrGetModelDataException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}

class NoDataException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
    
    public function outMessage()
    {
        if ($this->getCode() == ERR::NO_DATA_FOR_VIEW) {
            echo '<center>Error load module ', $this->getMessage(), '</center>';
        }
    }
}



class PostStuff 
{
    static function parsePost($post_text, $post_id)
    {
        $post_text = str_replace('<#', '<div class="grid">', $post_text);
        $post_text = str_replace('#>', '</div>',  $post_text);
        $post_text = str_replace('<p#', '<p>', $post_text);
        $post_text = str_replace('#p>', '</p>',  $post_text);
        $post_text = str_replace('#pic_', '<img src="'.SITE_CONFIG::site_absolute_url.'pic/'. $post_id .'/',  $post_text);
        $post_text = str_replace('_pic#', '.jpg">',  $post_text);
        return $post_text;
    }
}