<? if ( isset($view_data['search_subject']) ): ?>

    <div style="height: 30px;">&nbsp;</div>
    <h2 class="section_title"><?php Translate::getWord('SEARCH'); ?></h2>
    <div class="tags_cloud">
        <a href="<?= Config::getSiteURL() ?>search/" class="tag_back">←</a>
        <em style="font-size: 28px"><?php Translate::getWord($view_data['search_subject_type']); ?></em>
        <h1 class="search_h1"><?=$view_data['search_subject']?></h1>
    </div>


    <? if ( count($view_data['found_data']) > 0 ): ?>
    <div style="height: 20px;">&nbsp;</div>
    <div id="post_prev">

    <?php foreach ($view_data['found_data'] as $preview_posts): ?>
    <div>
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
                    <a href="<? echo Config::getSiteURL(), 'pic/', $preview_thumbs, '.jpg'?>" class="img_link">
                        <img src="<? echo Config::getSiteURL(), 'pic/', $preview_thumbs, 's.jpg'?>">
                        <div class="preview_post_gallery_hover"></div>
                    </a>
                <? endforeach; ?>
            </div>
            <div class="preview_post_gallery_text"><?= Translate::getWord('PhotosCount') ?> <?= $preview_posts['total_photos'] ?></div>
        </div>
        <div style="clear: both"></div>
    </div>
    </div>
    <?php endforeach; ?>

    </div>

    <? else: ?>
        <h2 id="errData"><?php Translate::getWord('NotFound'); ?></h2>
    <? endif; ?>
    
<? else: ?>

    <div style="height: 30px;">&nbsp;</div>
    <h2 class="section_title"><?php Translate::getWord('SEARCH'); ?></h2>

    <div class="tags_cloud"><em><?php Translate::getWord('PLACES'); ?></em>
    <? foreach ($view_data['places'] as $places): ?>
        <a href="/search/place/<?= $places->place ?>">
        <?= $places->place ?></a>
    <? endforeach; ?>
    </div>
    <div class="tags_cloud"><em><?php Translate::getWord('TAGS'); ?></em>
        <? foreach ($view_data['tags'] as $tags): ?>
            <a href="/search/tag/<?= $tags->tag ?>">
                <?= $tags->tag ?></a>
        <? endforeach; ?>
    </div>

<? endif; ?>