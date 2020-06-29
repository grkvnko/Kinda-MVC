<div id="top_gallery">
    <h2 class="section_title"><?= Translate::getWord('PHOTOSTREAM') ?></h2>
    <ul class="top_gallery_ul">
        <? foreach ($view_data as $gallery): ?><li>
            <div style="background: url(<?= $gallery['pic'] ?>) no-repeat 40% 50%; -o-background-size: cover; background-size: cover;" class="top_gallery_div">
                <a href="<?= $gallery['link'] ?>" class="img_link"><div class="top_gallery_text js_date"><?= $gallery['date'] ?></div></a>
            </div>
        </li><? endforeach; ?>

    </ul>
</div>
