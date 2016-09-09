<?php

class GalleryModel extends Model
{
    protected  function getData($vars = [])
    {
        // создать переменную сеанса и в нее записывать эти картинки
        // если человек вернется назад то показывать те же картинки что были до перехода

        $view_data = [];
        $reg = [];
        $posts_count = obj_post_p::count();

        for ($i=0;$i<4;$i++) {
            $take_post_ID = mt_rand(1, $posts_count); $z = 0;
            while (in_array($take_post_ID, $reg)) {
                $take_post_ID = mt_rand(1, $posts_count);
                if ($z++ >30) break;
            }
            $reg[] = $take_post_ID;

            $post_post_data = obj_post_p::getPreviewData($take_post_ID);
            $pics_count = sizeof($post_post_data['preview_thumbs']);

            $take_post_pic = mt_rand(1, $pics_count);
            $take_post_date = $post_post_data['date'];

            $selected_post_pic = Config::getSiteURL() . 'pic/' . $take_post_ID . '/' . $take_post_pic . 'b.jpg';

            $view_data[] = [ 'date' => $take_post_date, 'pic' => $selected_post_pic ];
        }

        return $view_data;
    }
}