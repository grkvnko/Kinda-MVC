<?php

class obj_post_p_attr 
{
    const preview_post_on_page = 6;
    
    private static $attr = [
        'places' => 'place',
        'tags' => 'tag'
    ];

    public static $current_attr_type;
    public static $current_attr_value;

    public static function getAttr(){
        return self::$attr;
    }
    
    public static function getPreviewPostsByPage($page_num)
    {
        $srch_attr_name = array_search(self::$current_attr_type, self::getAttr());

        $srch_attr_spr = 'spr_' . $srch_attr_name;
        $srch_place = $srch_attr_spr::find(
            'all',
            ['conditions' => [self::$current_attr_type.' = ?', self::$current_attr_value]]
        );

        $start = (self::preview_post_on_page*$page_num) - self::preview_post_on_page;

        $srch_attr_obj = 'obj_post_p_' . $srch_attr_name;
        $found_posts = $srch_attr_obj::find('all',
            [
                'conditions' => ['attr_id = ?', $srch_place[0]->attr_id],
                'limit' => self::preview_post_on_page, 'offset' => $start
            ]
        );
        
        return $found_posts;
    }

    public static function getPreviewPagesCount()
    {
        $srch_attr_name = array_search(self::$current_attr_type, self::getAttr());

        $srch_attr_spr = 'spr_' . $srch_attr_name;
        $srch_attr = $srch_attr_spr::find(
            'all',
            [ 'conditions' => [self::$current_attr_type.' = ?', self::$current_attr_value] ]
        );

        $srch_attr_obj = 'obj_post_p_' . $srch_attr_name;
        $found_posts = $srch_attr_obj::find(
            'all',
            [ 'conditions' => ['attr_id = ?', $srch_attr[0]->attr_id] ]
        );

        return ceil(count($found_posts) / self::preview_post_on_page);
    }
}