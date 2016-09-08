<div id="top_gallery">
    <ul class="top_gallery_ul">
        <? foreach ($view_data as $gallery): ?><li>
            <div style="background: url(<?= $gallery['pic'] ?>) no-repeat 40% 50%; -o-background-size: cover; background-size: cover;" class="top_gallery_div">
                <a href=""><div class="top_gallery_text"><?= $gallery['date'] ?></div></a>
            </div>
        </li><? endforeach; ?>

    </ul>
</div>
