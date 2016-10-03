<?php

if (!isset($TPL_PAGE_cur_page)) {
    $TPL_PAGE_cur_page = $view_data['page_num'];
    $TPL_PAGE_page_count = $view_data['pages_count'];
    $TPL_PAGE_show_pages = 2;

    $TPL_PAGE_min_page = $TPL_PAGE_cur_page - $TPL_PAGE_show_pages;
    $TPL_PAGE_max_page = $TPL_PAGE_cur_page + $TPL_PAGE_show_pages;
    $TPL_PAGE_min_page = ($TPL_PAGE_min_page <= 0) ? 1 : $TPL_PAGE_min_page;
    $TPL_PAGE_max_page = ($TPL_PAGE_max_page > $TPL_PAGE_page_count) ? $TPL_PAGE_page_count : $TPL_PAGE_max_page;

    $TPL_LI_for_page = function($TPL_OUT_LINK, $TPL_OUT_PAGE = '∙∙∙') use ($TPL_PAGE_cur_page) {
        if ($TPL_OUT_PAGE == $TPL_PAGE_cur_page)
            echo '<li><em>', $TPL_OUT_PAGE, '</em></li>';
        else
            echo '<li><a href="', Config::getSiteURL(), 'page/', $TPL_OUT_LINK, '" class="a_page">', $TPL_OUT_PAGE, '</a></li>';
    };
}

?>

<div id="page_selector">
    <ul>
        <?php

        if ($TPL_PAGE_min_page <= 3) {
            for ($i = 1; $i < $TPL_PAGE_min_page; $i++)
                $TPL_LI_for_page($i,$i);
        } else {
            $TPL_LI_for_page(1, 1);
            $TPL_LI_for_page($TPL_PAGE_min_page-$TPL_PAGE_show_pages-1);
        }

        for ($i = $TPL_PAGE_min_page; $i <= $TPL_PAGE_max_page; $i++) {
            $TPL_LI_for_page($i, $i);
        }

        if ($TPL_PAGE_max_page >= $TPL_PAGE_page_count-2) {
            for ($i = $TPL_PAGE_max_page + 1; $i <= $TPL_PAGE_page_count; $i++)
                $TPL_LI_for_page($i, $i);
        } else {
            $TPL_LI_for_page($TPL_PAGE_max_page+$TPL_PAGE_show_pages+1);
            $TPL_LI_for_page($TPL_PAGE_page_count, $TPL_PAGE_page_count);
        }

        ?>
    </ul>
</div>
