<article id="recommend">
    <h2 class="h2_caption"><?= Translate::getWord('RELATED CONTENT') ?></h2>
<?
foreach ($view_data as $post) {
    echo '<a href="', Config::getSiteURL(), 'post/', $post['post_type'], '/', $post['post_id'], '" class="reco">
    <div class="img_reco" style="background: url(', "'/pic/", $post['preview_pic'][0], "b.jpg')", ' no-repeat 40% 50%;-o-background-size: cover;background-size: cover;">
        <div class="top_gallery_text js_date">', $post['date'],'</div></div><span>', $post['preview_text'],'</span></a>';
}
?>
</article>