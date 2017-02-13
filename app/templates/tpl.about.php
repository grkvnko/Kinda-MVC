<?php
Translate::setWords([
    'LETTER_ABOUT' => [
        'en' => 'GRKVNKO.me - it\'s my personal blog (photoblog, codeblog, blogoblog).<br>
    All published pictures and videos created by myself, and belong to me.<br>
    To use the video and photo from blog you should get my permission.<br><br>
    Site made on PHP, the code is open-source<br>',
        'ru' => 'GRKVNKO.me - это мой персональный блог (фотоблог, кодоблог, блогоблог).<br>
    Все размещенные фотографии и видео сделаны мной.<br>
    Для использования фото- видео- материалов блога нужно получить мое разрешение.<br><br>
    Сайт написан на PHP, исходный код открыт<br>'
    ],
    'LETTER_SOC' => [
        'en' => 'My profiles<br>',
        'ru' => 'Я в соцсетях<br>'
    ],
    'LETTER_EMAIL' => [
        'en' => 'You can contact me by email<br>',
        'ru' => 'С вопросами и предложениями<br>'
    ]
]);
?>
<article id="art_about">
    <?= Translate::getWord('LETTER_ABOUT') ?>
    <a href="http://github.com/grkvnko/grkvnko.me" target="_blank">github.com/grkvnko/grkvnko.me</a><br><br>
    <?= Translate::getWord('LETTER_SOC') ?>
    <a href="http://vk.com/grkvnko" target="_blank">vk.com/grkvnko</a><br>
    <a href="http://github.com/grkvnko" target="_blank">github.com/grkvnko</a><br><br>
    <?= Translate::getWord('LETTER_EMAIL') ?>
    <a href="mailto:grkvnko@google.com">grkvnko@gmail.com</a>
</article>
