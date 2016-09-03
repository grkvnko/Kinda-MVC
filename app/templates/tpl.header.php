<?php
LangPak::setWords([
    'Photostream' => ['en' => 'Photostream', 'ru' => 'Фотопоток'],
    'Search' => ['ru' => 'Поиск', 'en' => 'Search'],
    'About' => ['en' => 'About', 'ru' => 'Инфо']
]);
$LANGUAGES_LINKS = function () {
    foreach (LangPak::getLanguages() as $name => $language) {
        echo '<a class="header_menu_lang" href="', Config::getSiteURL(), 'lang/', $language, '">', $name , '</a>';
    }
};
?>
<header>
    <div>
        <ul id="full_menu">
            <li><a class="header_logo_a" href="<?php echo Config::getSiteURL(); ?>">GRKVNKO</a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>photostream"><?php LangPak::getWord('Photostream') ?></a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>search"><?php LangPak::getWord('Search') ?></a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>about"><?php LangPak::getWord('About') ?></a></li>
            <li id="menu_right"><?php $LANGUAGES_LINKS(); ?></li>
            <li id="menu_button">≡</li>
        </ul>
    </div>
    <ul id="small_menu">
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>photostream">Фотопоток</a></li>
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>search"><?php LangPak::getWord('Search') ?></a></li>
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>about"><?php LangPak::getWord('About') ?></a></li>
        <li id="menu_right"><?php $LANGUAGES_LINKS(); ?></li>
    </ul>
</header>
<main>