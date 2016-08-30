<?php

class posts_list extends ActiveRecord\Model
{
    static $table_name = 'posts_list';
    const preview_post_on_page = 9;

    public static function getPreviewPostsByPage($page_num)
    {
        $preview_post_on_page = self::preview_post_on_page;
        $start = ($preview_post_on_page*$page_num) - $preview_post_on_page;

        $query = "
        SELECT *
        FROM
            `posts_list` AS post
        ORDER BY id DESC
        LIMIT {$start}, {$preview_post_on_page}
		";

        return self::find_by_sql($query);
    }

    public static function getPreviewPagesCount()
    {
        return ceil(self::count() / self::preview_post_on_page);
    }
}