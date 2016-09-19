<?php
Translate::setWords([
    'Photostream' => ['en' => 'Photostream', 'ru' => 'Фотопоток'],
    'Search' => ['ru' => 'Поиск', 'en' => 'Search'],
    'About' => ['en' => 'About', 'ru' => 'Инфо']
]);
$LANGUAGES_LINKS = function () {
    foreach (Language::getLanguages() as $name => $language) {
        echo '<a class="header_menu_lang" href="', Config::getSiteURL(), 'lang/', $language, '">', $name , '</a>';
    }
};
?>
<header>
    <div>
        <ul id="full_menu">
            <li><a class="header_logo_a" href="<?= Config::getSiteURL() ?>">GRKVNKO</a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>photostream"><?php Translate::getWord('Photostream') ?></a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>search"><?php Translate::getWord('Search') ?></a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>about"><?php Translate::getWord('About') ?></a></li>
            <li id="menu_right"><?= $LANGUAGES_LINKS() ?></li>
            <li id="menu_button">≡</li>
        </ul>
    </div>
    <ul id="small_menu">
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>photostream">Фотопоток</a></li>
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>search"><?php Translate::getWord('Search') ?></a></li>
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>about"><?php Translate::getWord('About') ?></a></li>
        <li id="menu_right"><?= $LANGUAGES_LINKS() ?></li>
    </ul>
</header>
<main>