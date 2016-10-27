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

            $post_post_data = obj_post_p::find($take_post_ID);
            $take_post_pic_id = explode(',', $post_post_data->pics_prev_array)[0];
            try {
                $pic_obj = photostrm_pics::find($take_post_pic_id);
                $take_post_pic_part = $pic_obj->part;
            } catch (ActiveRecord\RecordNotFound $e) {
                $i--;
                array_pop($reg);
                continue;
            }

            $selected_post_pic = Config::getSiteURL() . 'pic/' . $take_post_pic_part . '/' . $take_post_pic_id . 'b.jpg';
            $selected_link_pic = Config::getSiteURL() . 'pic/' . $take_post_pic_part . '/' . $take_post_pic_id . '.jpg';

            $view_data[] = [ 'date' => $post_post_data->date->format('Y-m-d'),
                             'pic' => $selected_post_pic,
                             'link' => $selected_link_pic ];
        }

        return $view_data;
    }
}