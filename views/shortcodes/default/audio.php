<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" preload="none" src="<?php echo $content ?>" type="audio/mp3"></audio>
<?php
wp_enqueue_style("thememakers_theme_mediaelementplayer_css", TMM_THEME_URI . '/js/mediaelement/mediaelementplayer.css');
