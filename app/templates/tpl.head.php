<!DOCTYPE HTML>
<html lang="<?= mainframe::getCurrentLanguage(); ?>">
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
    <link rel="shortcut icon" type="image/x-icon" href="<?= Config::getSiteURL() ?>media/img/favicon.png">
    <meta property="og:title" content="<?= $view_data['page_title'] ?>" />
    <meta property="og:description" content="<?= $view_data['og']['description'] ?>" />
    <meta property="og:image" content="<?= Config::getSiteURL() ?><?= $view_data['og']['image'] ?>" />
    <meta property="og:site_name" content="Kinda-MVC demo site" />
</head>
<body>