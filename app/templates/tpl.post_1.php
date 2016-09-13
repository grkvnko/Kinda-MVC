<div class="container_post">
    <!--<div id="post_close"><a href="" onclick="window.history.back();"></a></div>-->
    <h1><?php echo $view_data['title'] ?></h1><div id="post_date">• <span class="js_date"><?php echo $view_data['date'] ?></span> •</div>
    <div class="post_text">
        <?php

        echo PostStuff::parsePost($view_data['post_text'], $view_data['post_id']);

        ?>
    </div>
    <div id="post_tags">
        <?php

        foreach ($view_data['places'] as $place) {
            echo ' <a href="', Config::getSiteURL(),'search/place/',$place,'">#', $place, '</a>';
        }

        ?>
        |
        <?php

        foreach ($view_data['tags'] as $tag) {
            echo ' <a href="', Config::getSiteURL(),'search/tag/',$tag,'">#', $tag, '</a>';
        }

        ?>
    </div>
</div>


<script language="JavaScript">

    function getCol() {
        if ($(window).width() < 680) { return 1; }
        else { return 2; }
    }

    $(document).ready(function () {
        $(window).load(function () {
            $('.post_text').BlocksIt({numOfCol: getCol(), offsetX: 0, offsetY: 0});
        }).resize(function () {
            $('.post_text').BlocksIt({numOfCol: getCol(), offsetX: 0, offsetY: 0});
        });
    });

</script>