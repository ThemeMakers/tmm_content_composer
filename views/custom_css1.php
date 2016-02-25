<?php
$directory = TMM_CC_DIR."/scss/";
require TMM_CC_DIR.'/classes/scss.inc.php';

$scss = new scssc();

if (TMM::get_option('compress_css')){
	$scss->setFormatter("scss_formatter_compressed");
}

$scss->setImportPaths($directory);

// will search for `assets/stylesheets/mixins.scss'
echo $scss->compile('@import "style-lc.scss"');