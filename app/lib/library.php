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
    static function parsePost($post_text, $post_pics)
    {
        $post_text = str_replace('<#', '<div class="grid">', $post_text);
        $post_text = str_replace('<p#', '<p>', $post_text);
        $post_text = str_replace('#p>', '</p>',  $post_text);
        $post_text = str_replace('#>', '</div>',  $post_text);

        foreach ($post_pics as $pic) {
            $_post_img = '<a href="' . Config::getSiteURL() . 'pic/' . $pic . '.jpg" class="img_link">' .
                            '<img src="' . Config::getSiteURL() . 'pic/' . $pic . 'b.jpg"></a>';
            $post_text = preg_replace('#<pic>#', $_post_img, $post_text, 1);
        }

        return $post_text;
    }
}