<div id="post_close_tab">
    <div><h1><?php echo $view_data['title'] ?></h1></div>
</div>

<div class="container_post center_container">
    <div id="post_close"><a href="" onclick="window.history.back();"></a></div>
    <center><h1><?php echo $view_data['title'] ?></h1><div id="post_date">• <?php echo $view_data['date'] ?> •</div></center>
    <div class="post_text">
    <?php

    echo PostStuff::parsePost($view_data['post_text'], $view_data['post_id']);

    ?>
    </div>
    <div id="post_tags">
    <?php

    foreach ($view_data['tags'] as $tag) {
        echo ' <a href="', SITE_CONFIG::site_absolute_url ,'tags/',$tag,'">#', $tag, '</a>';
    }

    ?>
    </div>
</div>