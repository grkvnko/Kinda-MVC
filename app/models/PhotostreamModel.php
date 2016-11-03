<?php

class PhotostreamModel extends Model
{
    protected function getData($vars = [])
    {
        $page_num = $vars['page_num'];
        $pics_data = [];

        $previewPicsList = photostrm_pics::getPreviewPicsByPage($page_num);
        foreach ($previewPicsList as $pic) {
            $pics_data[] = [ 'pic' => $pic->part.'/'.$pic->pic_id ];
        }

        return [ 'page_num' => $page_num,
                 'pics_data' => $pics_data ];
    }
}