<article id="recommend">
<?
foreach ($view_data as $elem) {
    echo '<a href="', Config::getSiteURL(), 'post/', $elem['post_type'], '/', $elem['post_id'], '" class="reco">
    <div class="img_reco" style="background: url(', "'/pic/", $elem['post_id'], "/", $elem['preview_pic'][0], "b.jpg')", ' no-repeat 40% 50%;-o-background-size: cover;background-size: cover;">
        <div class="top_gallery_text js_date">12.12.12</div>
    </div>
    <span>', $elem['preview_text'],'</span></a>';
}
?>
</article>