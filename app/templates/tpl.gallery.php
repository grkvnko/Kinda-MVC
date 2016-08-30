<div id="top_gallery">
    <ul class="top_gallery_ul">
        <?php foreach ($view_data as $gallery): ?><li>
            <div style="background: url(<?php echo $gallery['pic']; ?>) no-repeat 40% 50%; -o-background-size: cover; background-size: cover;" class="top_gallery_div">
                <a href=""><div class="top_gallery_text"><?php echo $gallery['date']; ?></div></a>
            </div>
        </li><?php endforeach; ?>

    </ul>
</div>
