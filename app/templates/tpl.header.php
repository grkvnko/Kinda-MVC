<?php
LangPak::set_words([
    'Photostream' => ['en' => 'Photostream', 'ru' => 'Фотопоток'],
    'Search' => ['en' => 'Search', 'ru' => 'Поиск'],
    'About' => ['en' => 'About', 'ru' => 'Инфо']
]);
?>
<header>
    <div>
        <ul id="full_menu">
            <li><a class="header_logo_a" href="<?php echo Config::getSiteURL(); ?>">GRKVNKO</a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>photostream"><?php LangPak::get_word('Photostream') ?></a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>search"><?php LangPak::get_word('Search') ?></a></li>
            <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>about"><?php LangPak::get_word('About') ?></a></li>
            <li id="menu_right"><a href="<?php echo Config::getSiteURL(); ?>lang/ru">RU</a> • <a href="<?php echo Config::getSiteURL(); ?>lang/en">EN</a></li>
            <li id="menu_button">≡</li>
        </ul>
    </div>
    <ul id="small_menu">
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>photostream">Фотопоток</a></li>
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>search"><?php LangPak::get_word('Search') ?></a></li>
        <li><a class="header_menu_a" href="<?php echo Config::getSiteURL(); ?>about"><?php LangPak::get_word('About') ?></a></li>
        <li><a href="">RU</a> • <a href="">EN</a></li>
    </ul>
</header>
<main>