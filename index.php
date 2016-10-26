<?php

$INDEX_DIR_ = __DIR__;

require_once 'app/core/loader.php';
require_once 'app/core/mainframe.php';

/*
//$lala = obj_post_p_pics::all(array('conditions' => array('pic_id = ?', 1)));
$lala2 = photostrm_pics::all(array('conditions' => array('pic_id = ?', 1)));

var_dump($lala2);

echo $lala2[0]->pic_id;
*/

mainframe::load();
mainframe::start();