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
            <li><a class="header_logo_a" href="<?php echo SITE_CONFIG::site_absolute_url; ?>">GRKVNKO</a></li>
            <li><a class="header_menu_a" href="keke"><?php LangPak::get_word('Photostream') ?></a></li>
            <li><a class="header_menu_a" href="keke"><?php LangPak::get_word('Search') ?></a></li>
            <li><?php echo '<a class="header_menu_a" href="', SITE_CONFIG::site_absolute_url, 'about">'; LangPak::get_word('About') ?></a></li>
            <li id="menu_right">RU • EN</li>
            <li id="menu_button">≡</li>
        </ul>
    </div>
    <ul id="small_menu">
        <li><a class="header_menu_a" href="keke">Фотопоток</a></li>
        <li><a class="header_menu_a" href="keke">Поиск</a></li>
        <li><?php echo '<a class="header_menu_a" href="', SITE_CONFIG::site_absolute_url, 'about">'; LangPak::get_word('About') ?></a></li>
        <li>RU • EN</li>
    </ul>
</header>
<main>