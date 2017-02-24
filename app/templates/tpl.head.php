<!DOCTYPE HTML>
<html lang="<?php echo mainframe::getCurrentLanguage(); ?>">
<head>
    <title><?= $view_data['page_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant+SC&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<? foreach ($view_data['page_css'] as $css_name): ?>
    <link rel="stylesheet" href="<?= Config::getSiteURL() ?>media/css/<?= $css_name ?>" type="text/css" media="all">
<? endforeach; ?>
<? foreach ($view_data['page_scripts'] as $js_name): ?>
    <script src="<?= Config::getSiteURL() ?>media/js/<?= $js_name ?>"></script>
<? endforeach; ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?= Config::getSiteURL() ?>media/img/fav.ico">

    <meta property="og:title" content="<?= $view_data['page_title'] ?>" />
    <meta property="og:description" content="<?= $view_data['og']['description'] ?>" />
    <meta property="og:image" content="<?= Config::getSiteURL() ?><?= $view_data['og']['image'] ?>" />
    <meta property="og:site_name" content="GRKVNKO" />
</head>
<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-92612808-1', 'auto');
    ga('send', 'pageview');

</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter43045909 = new Ya.Metrika({
                    id:43045909,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/43045909" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->