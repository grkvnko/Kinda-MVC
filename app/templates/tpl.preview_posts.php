<?php
$vars['show_title'] = (isset($vars['show_title']) ? $vars['show_title'] : true);
?>
<?php if ($view_data['show_title']): ?>
    <h2 class="section_title"><?= Translate::getWord('PUBLICATION') ?></h2>
<?php endif; ?>
<div id="post_prev">
<?php foreach ($view_data['post_data'] as $preview_posts): ?>
<?php //$x += 1; if ($x == 3) echo "<div><div class=\"prev_post\">tipa banner</div></div>"; ?>
<div>
<?php include "tpl.preview_posts_". $preview_posts['post_type'] .".php"; ?>
</div>
<?php endforeach; ?>
</div>