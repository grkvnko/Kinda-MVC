<header>
    <div>
        <ul id="full_menu">
            <li><a class="header_logo_a" href="<?= Config::getSiteURL() ?>">Kinda-MVC</a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>photostream"><?php Translate::getWord('Photostream') ?></a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>search"><?php Translate::getWord('Search') ?></a></li>
            <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>about"><?php Translate::getWord('About') ?></a></li>
            <li id="menu_right"><? Language::getLangLinksList() ?></li>
            <li id="menu_button">≡</li>
        </ul>
    </div>
    <ul id="small_menu">
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>photostream"><?php Translate::getWord('Photostream') ?></a></li>
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>search"><?php Translate::getWord('Search') ?></a></li>
        <li><a class="header_menu_a" href="<?= Config::getSiteURL() ?>about"><?php Translate::getWord('About') ?></a></li>
        <li id="menu_right"><? Language::getLangLinksList() ?></li>
    </ul>
</header>
<main>