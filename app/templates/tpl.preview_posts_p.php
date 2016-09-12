<?php
LangPak::setWords([
    'PhotosCount' => ['en' => 'total photos in post', 'ru' => 'всего фоточек']
]);
?>

<div class="prev_post">
    <div class="preview_post_title">
        <div class="preview_post_date js_date"> <?= $preview_posts['date'] ?> </div>
        <a href="<?php echo Config::getSiteURL(), 'post/', $preview_posts['post_type'], '/', $preview_posts['post_id']; ?>"
           class="preview_post_link"><span> <?= $preview_posts['preview_text'] ?> </span></a>
        <br>
        <? foreach ($preview_posts['tags'] as $tags): ?><a href="<?= Config::getSiteURL() ?>search/tag/<? echo $tags ?>" class="preview_post_tag"><?= $tags ?></a><? endforeach; ?>
    </div>
    <div class="preview_post_gallery">
        <div class="justified-gallery">
            <? foreach ($preview_posts['preview_pic'] as $preview_thumbs): ?>
                <a href="<? echo Config::getSiteURL(), 'pic/', $preview_posts['post_id'], '/', $preview_thumbs, '.jpg'?>">
                    <img src="<? echo Config::getSiteURL(), 'pic/', $preview_posts['post_id'], '/', $preview_thumbs, 's.jpg'?>">
                    <div class="preview_post_gallery_hover"></div>
                </a>
            <? endforeach; ?>
        </div>
        <div class="preview_post_gallery_text"><?= LangPak::getWord('PhotosCount') ?> <?= $preview_posts['total_photos'] ?></div>
    </div>
</div>
