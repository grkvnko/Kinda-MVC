<div id="photostream_page">
    <? /*echo 'page'.$view_data['page_num']; */ ?>
    <div id="photostream">
        <?php foreach ($view_data['pics_data'] as $preview_pic): ?>
            <a href="<?=Config::getSiteURL() ?>pic/<?=$preview_pic['pic']?>.jpg" class="img_link">
                <img src="<?=Config::getSiteURL() ?>pic/<?=$preview_pic['pic']?>b.jpg">
                <div class="preview_post_gallery_hover"></div>
            </a>
        <?php endforeach; ?>
    </div>
</div>