<?php

class obj_post_p extends obj_post
{
    static $table_name = 'obj_post_p';

    private static function getPostRecords($post_id)
    {
        $local_language = mainframe::getLanguage();

        $query = "
        SELECT
            post.post_id,
            post.date,
            post.pics_array,
            GROUP_CONCAT( /* block lang for tags */
                DISTINCT IFNULL(tag_local_lang.tag, tag_default_lang.tag) 
                ORDER BY tags.tag_id 
                ASC SEPARATOR ',') AS tagsNameArray,
            IFNULL(post_text_local_lang.post_text, post_text_default_lang.post_text) AS post_text,
            IFNULL(post_text_local_lang.title, post_text_default_lang.title) AS title
        FROM
            obj_post_p AS post
            LEFT JOIN `obj_post_p_tags` AS tags
                ON tags.post_id = post.post_id
            LEFT JOIN `spr_tags` AS tag_default_lang /* block lang for tags */
                ON tags.tag_id = tag_default_lang.tag_id
                and tag_default_lang.lang = 'ru'
            LEFT JOIN `spr_tags` AS tag_local_lang
                ON tags.tag_id = tag_local_lang.tag_id
                and tag_local_lang.lang = '{$local_language}'
            LEFT JOIN `obj_post_p_text` AS post_text_default_lang /* block lang for text */
                ON post.post_id = post_text_default_lang.post_id
                and post_text_default_lang.lang = 'ru'
            LEFT JOIN `obj_post_p_text` AS post_text_local_lang
                ON post.post_id = post_text_local_lang.post_id
                and post_text_local_lang.lang = '{$local_language}'
        WHERE
          post.post_id = {$post_id}
        GROUP BY 
          post.post_id, post.date
		";

        return self::find_by_sql($query);
    }

    private static function getPreviewRecords($post_id)
    {
        $local_language = mainframe::getLanguage();

        $query = "
        SELECT
            post.post_id,
            post.date,
            post.pics_array,
            post.pics_prev_array,
            GROUP_CONCAT(
                DISTINCT IFNULL(tag_local_lang.tag, tag_default_lang.tag) 
                ORDER BY tags.tag_id 
                ASC SEPARATOR ',') AS tagsNameArray,
            IFNULL(post_text_local_lang.preview_text, post_text_defaul_lang.preview_text) AS preview_text
        FROM
            obj_post_p AS post
            LEFT JOIN `obj_post_p_tags` AS tags
                ON tags.post_id = post.post_id
            LEFT JOIN `spr_tags` AS tag_default_lang /* block lang for tags*/
                ON tags.tag_id = tag_default_lang.tag_id
                and tag_default_lang.lang = 'ru'
            LEFT JOIN `spr_tags` AS tag_local_lang
                ON tags.tag_id = tag_local_lang.tag_id
                and tag_local_lang.lang = '{$local_language}'
            LEFT JOIN `obj_post_p_text` AS post_text_defaul_lang /* block lang for preview text*/
                ON post.post_id = post_text_defaul_lang.post_id
                and post_text_defaul_lang.lang = 'ru'
            LEFT JOIN `obj_post_p_text` AS post_text_local_lang
                ON post.post_id = post_text_local_lang.post_id
                and post_text_local_lang.lang = '{$local_language}'
        WHERE
          post.post_id = {$post_id}
        GROUP BY 
          post.post_id, post.date
		";

        return self::find_by_sql($query);
    }

    public static function getPreviewData($post_id)
    {
        $post_records = self::getPreviewRecords($post_id);

        if (count($post_records) == 0) return null;

        $post_data['preview_text'] = $post_records[0]->preview_text;
        $post_data['post_id']      = $post_records[0]->post_id;
        $post_data['date']         = $post_records[0]->date;
        $post_data['total_photos'] = count(explode(',', $post_records[0]->pics_array));

        $tags = explode(',', $post_records[0]->tagsnamearray);
        foreach ($tags as $key) {
            $post_data['tags'][] = $key;
        }

        $pics = explode(',', $post_records[0]->pics_prev_array);
        foreach ($pics as $key) {
            $post_data['preview_thumbs'][] = 'pic/' . $post_data['post_id'] . '/' . $key . 's.jpg';
        }

        return $post_data;
    }

    public static function getPostData($post_id)
    {
        $post_records = self::getPostRecords($post_id);

        if (count($post_records) == 0) return null;

        $post_data['post_id']      = $post_records[0]->post_id;
        $post_data['date']         = $post_records[0]->date;
        $post_data['title']        = $post_records[0]->title;
        $post_data['post_text']    = $post_records[0]->post_text;

        $tags = explode(',', $post_records[0]->tagsnamearray);
        foreach ($tags as $key) {
            $post_data['tags'][] = $key;
        }

        return $post_data;
    }
}