<?php

class photostrm_pics extends ActiveRecord\Model
{
    static $table_name = 'photostrm_pics';
    const preview_pics_on_page = 24;

    public static function getPreviewPicsByPage($page_num)
    {
        $preview_pics_on_page = self::preview_pics_on_page;
        $start = ($preview_pics_on_page*$page_num) - $preview_pics_on_page;

        $query = "
        SELECT *
        FROM
            `photostrm_pics` AS pics
        ORDER BY pic_id DESC
        LIMIT {$start}, {$preview_pics_on_page}
		";

        return self::find_by_sql($query);
    }

    public static function getPreviewPagesCount()
    {
        return ceil(self::count() / self::preview_pics_on_page);
    }
}