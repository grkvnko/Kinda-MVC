<?php

class RecommendationModel extends Model
{
    function getData($vars = [])
    {
        $view_data = [];
        $reg = [];
        //echo $vars['post_id'];
        $class_post_type = 'obj_post_' . $vars['post_type'];
        $record_count = $class_post_type::count()-1;

        for($i=0;$i<4;$i++) {
            $rand_record = mt_rand(0, $record_count); $z = 0;
            while (in_array($rand_record, $reg)) {
                $rand_record = mt_rand(0, $record_count);
                if ($z++ >30) break;
            }
            $reg[] = $rand_record;
            $post_data = $class_post_type::getPreviewData(null, $rand_record);
            $post_data += ['post_type' => $vars['post_type']];
            $view_data[] = $post_data;
        }

        return $view_data;
    }
}