<?php

class GalleryModel extends Model
{
    protected  function getData($vars = [])
    {
        $view_data = [];
        $reg = [];
        $posts_count = obj_post_p::count()-1;
        $taken_post = null;
        $taken_post_ID = null;

        for ($i=0;$i<4;$i++) {
            while (in_array($taken_post_ID, $reg) || $taken_post_ID === null) {
                $taken_post_row = mt_rand(0, $posts_count); $z = 0;
                $taken_post = obj_post_p::find('all', [ 'limit' => 1, 'offset' => $taken_post_row ]);
                $taken_post_ID = $taken_post[0]->post_id;
                if ($z++ >30) break;
            }
            $reg[] = $taken_post_ID;

            $taken_post_pic_id = explode(',', $taken_post[0]->pics_prev_array)[0];
            try {
                $pic_obj = photostrm_pics::find($taken_post_pic_id);
                $taken_post_pic_part = $pic_obj->part;
            } catch (ActiveRecord\RecordNotFound $e) {
                $i--;
                array_pop($reg);
                continue;
            }

            $selected_post_pic = Config::getSiteURL() . 'pic/' . $taken_post_pic_part . '/' . $taken_post_pic_id . 'b.jpg';
            $selected_link_pic = Config::getSiteURL() . 'pic/' . $taken_post_pic_part . '/' . $taken_post_pic_id . '.jpg';

            $view_data[] = [ 'date' => $taken_post[0]->date->format('Y-m-d'),
                             'pic' => $selected_post_pic,
                             'link' => $selected_link_pic ];
        }

        return $view_data;
    }
}