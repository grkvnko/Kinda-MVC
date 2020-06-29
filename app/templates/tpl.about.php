<article id="art_about">
    <?$post = ObjPosts::find( ['name' => 'About', 'lang' => Language::getSelectedLanguage()] );?>
    <?=$post->text?>
</article>