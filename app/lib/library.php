<?php

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


class PostStuff
{
    static function parsePost($post_text, $post_id)
    {
        $_post_picture = '<a href="' . Config::getSiteURL() . 'pic/' . $post_id . '/"><img src="' . Config::getSiteURL() . 'pic/' . $post_id . '/';

        $post_text = str_replace('<#', '<div class="grid">', $post_text);
        $post_text = str_replace('<p#', '<p>', $post_text);
        $post_text = str_replace('#pic_', $_post_picture,  $post_text);
        $post_text = str_replace('_pic#', 'b.jpg"></a>',  $post_text);
        $post_text = str_replace('#p>', '</p>',  $post_text);
        $post_text = str_replace('#>', '</div>',  $post_text);
        return $post_text;
    }
}