<div class="container_post">
    <h1><?php echo $view_data['title'] ?></h1><div id="post_date">• <?php echo $view_data['date'] ?> •</div>
    <div class="post_text">
        <?php

        echo PostStuff::parsePost($view_data['post_text'], $view_data['post_id']);

        ?>
    </div>
    <div id="post_tags">
        <?php

        foreach ($view_data['tags'] as $tag) {
            echo ' <a href="', Config::getSiteURL(),'tags/',$tag,'">#', $tag, '</a>';
        }

        ?>
    </div>
</div>
