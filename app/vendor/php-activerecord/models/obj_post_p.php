<?php

class obj_post_p extends obj_post
{
    static $table_name = 'obj_post_p';

    private static function getPostRecords($post_id)
    {
        $local_language = mainframe::getCurrentLanguage();

        $query = "
        SELECT
            post.post_id,
            post.view,
            post.date,
            post.pics_array,
            GROUP_CONCAT( /* block lang for tags */
                DISTINCT IFNULL(tag_local_lang.tag, tag_default_lang.tag)
                ORDER BY tags.attr_id
                ASC SEPARATOR ',') AS tagsNameArray,
            GROUP_CONCAT( /* block lang for places */
                DISTINCT IFNULL(place_local_lang.place, place_default_lang.place)
                ORDER BY places.attr_id
                ASC SEPARATOR ',') AS placesNameArray,
            IFNULL(post_text_local_lang.post_text, post_text_default_lang.post_text) AS post_text,
            IFNULL(post_text_local_lang.preview_text, post_text_default_lang.preview_text) AS preview_text,
            IFNULL(post_text_local_lang.title, post_text_default_lang.title) AS title
        FROM
            obj_post_p AS post
            LEFT JOIN `obj_post_p_text` AS post_text_default_lang /* block lang for text */
                ON post.post_id = post_text_default_lang.post_id
                and post_text_default_lang.lang = 'ru'
            LEFT JOIN `obj_post_p_text` AS post_text_local_lang
                ON post.post_id = post_text_local_lang.post_id
                and post_text_local_lang.lang = '{$local_language}'
            LEFT JOIN `obj_post_p_tags` AS tags /* tags */
                ON tags.post_id = post.post_id
            LEFT JOIN `spr_tags` AS tag_default_lang /* block lang for tags */
                ON tags.attr_id = tag_default_lang.attr_id
                and tag_default_lang.lang = 'ru'
            LEFT JOIN `spr_tags` AS tag_local_lang
                ON tags.attr_id = tag_local_lang.attr_id
                and tag_local_lang.lang = '{$local_language}'
            LEFT JOIN `obj_post_p_places` AS places /* places */
                ON places.post_id = post.post_id
            LEFT JOIN `spr_places` AS place_default_lang /* block lang for tags */
                ON places.attr_id = place_default_lang.attr_id
                and tag_default_lang.lang = 'ru'
            LEFT JOIN `spr_places` AS place_local_lang
                ON places.attr_id = place_local_lang.attr_id
                and place_local_lang.lang = '{$local_language}'
            WHERE 
                post.post_id = {$post_id} 
            GROUP BY 
                post.post_id, post.date ";

        return self::find_by_sql($query);
    }

    private static function getPreviewRecords($post_id = null, $rand = null)
    {
        $local_language = mainframe::getCurrentLanguage();

        $query = "
        SELECT
            post.post_id,
            post.view,
            post.date,
            post.pics_array,
            post.pics_prev_array,
            GROUP_CONCAT(
                DISTINCT IFNULL(tag_local_lang.tag, tag_default_lang.tag) 
                ORDER BY tags.attr_id 
                ASC SEPARATOR ',') AS tagsNameArray,
            IFNULL(post_text_local_lang.preview_text, post_text_default_lang.preview_text) AS preview_text
        FROM
            obj_post_p AS post
            LEFT JOIN `obj_post_p_tags` AS tags
                ON tags.post_id = post.post_id
            LEFT JOIN `spr_tags` AS tag_default_lang /* block lang for tags*/
                ON tags.attr_id = tag_default_lang.attr_id
                and tag_default_lang.lang = 'ru'
            LEFT JOIN `spr_tags` AS tag_local_lang
                ON tags.attr_id = tag_local_lang.attr_id
                and tag_local_lang.lang = '{$local_language}'
            LEFT JOIN `obj_post_p_text` AS post_text_default_lang /* block lang for preview text*/
                ON post.post_id = post_text_default_lang.post_id
                and post_text_default_lang.lang = 'ru'
            LEFT JOIN `obj_post_p_text` AS post_text_local_lang
                ON post.post_id = post_text_local_lang.post_id
                and post_text_local_lang.lang = '{$local_language}' ";

        if($post_id === null) {
            $query .= 'GROUP BY post.post_id, post.date LIMIT ' . $rand . ', 1';
        } else {
            $query .= "WHERE post.post_id = {$post_id} GROUP BY post.post_id, post.date";
        }

        return self::find_by_sql($query);
    }

    public static function getPreviewData($post_id = null, $rand = null)
    {
        $post_records = self::getPreviewRecords($post_id, $rand);

        if (count($post_records) == 0) return null;

        $post_data['preview_text'] = $post_records[0]->preview_text;
        $post_data['post_id']      = $post_records[0]->post_id;
        $post_data['post_view']    = $post_records[0]->view;
        $post_data['date']         = $post_records[0]->date->format('Y-m-d');
        $post_data['total_photos'] = count(explode(',', $post_records[0]->pics_array));
        $post_data['preview_pic']  = [];

        $tags = explode(',', $post_records[0]->tagsnamearray);
        foreach ($tags as $key) {
            $post_data['tags'][] = $key;
        }

        $pics = explode(',', $post_records[0]->pics_prev_array);
        foreach ($pics as $pic_id) {
            try {
                $current_pic = photostrm_pics::find($pic_id);
                $post_data['preview_pic'][] = $current_pic->part . "/" . $current_pic->pic_id;
            } catch (ActiveRecord\RecordNotFound $e) {};
        }

        return $post_data;
    }

    public static function getPostData($post_id)
    {
        $post_records = self::getPostRecords($post_id);

        if (count($post_records) == 0) return null;

        $post_data['post_id']      = $post_records[0]->post_id;
        $post_data['post_view']    = $post_records[0]->view;
        $post_data['preview_text'] = $post_records[0]->preview_text;
        $post_data['date']         = $post_records[0]->date->format('Y-m-d');
        $post_data['title']        = $post_records[0]->title;
        $post_data['post_text']    = $post_records[0]->post_text;
        $post_data['places']       = [];
        $post_data['tags']         = [];
        $post_data['post_pics']    = [];
        
        if (strlen($post_records[0]->pics_array) > 0) {
            $pics_arr = explode(",", $post_records[0]->pics_array);
            foreach ($pics_arr as $pic_id) {
                try {
                    $current_pic = photostrm_pics::find($pic_id);
                    $post_data['post_pics'][] = $current_pic->part . "/" . $current_pic->pic_id;
                } catch (ActiveRecord\RecordNotFound $e) {};
            }
        }

        $tags = explode(',', $post_records[0]->tagsnamearray);
        if ($tags !== ['']) {
            foreach ($tags as $key) {
                $post_data['tags'][] = $key;
            }
        }

        $places = explode(',', $post_records[0]->placesnamearray);
        if ($places !== ['']) {
            foreach ($places as $key) {
                $post_data['places'][] = $key;
            }
        }

        return $post_data;
    }
}