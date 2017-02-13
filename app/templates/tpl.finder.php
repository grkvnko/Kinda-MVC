<? if ( isset($view_data['search_subject']) ): ?>

    <h1>Найдено по: <?=$view_data['search_subject']?></h1>

<? foreach ($view_data['found_data'] as $found_data): ?>

    <h3><?=$found_data['preview_text']?></h3>
    <h4><?=$found_data['date']?></h4>

<? endforeach; ?>

<? endif; ?>