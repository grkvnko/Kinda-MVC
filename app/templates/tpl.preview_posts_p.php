<?php
LangPak::setWords([
    'PhotosCount' => ['en' => 'total photos in post', 'ru' => 'всего фоточек']
]);
?>

<div class="prev_post">
    <div class="preview_post_title">
        <div class="preview_post_date"> <?= $preview_posts['date'] ?> </div>
        <a href="<?php echo Config::getSiteURL(), 'post/', $preview_posts['post_type'], '/', $preview_posts['post_id']; ?>"
           class="preview_post_link"><span> <?= $preview_posts['preview_text'] ?> </span></a>
        <br>
        <?php foreach ($preview_posts['tags'] as $tags): ?><a href='<?php echo Config::getSiteURL(), 'tag/', $tags; ?>'class='preview_post_tag'><?= $tags ?></a><?php endforeach; ?>
    </div>
    <div class="preview_post_gallery">
        <div class="justified-gallery">
            <?php foreach ($preview_posts['preview_thumbs'] as $preview_thumbs): ?><a href=""><img src="<?= Config::getSiteURL(), $preview_thumbs ?>">
                <div class="preview_post_gallery_hover"></div></a><?php endforeach; ?>
        </div>
        <div class="preview_post_gallery_text"><?php LangPak::getWord('PhotosCount'); echo ' ', $preview_posts['total_photos']; ?></div>
    </div>
</div>
