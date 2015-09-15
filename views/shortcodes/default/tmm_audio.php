<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" preload="none" src="<?php echo $content ?>"></audio>
<?php
wp_enqueue_script("tmm_theme_mediaelementplayer_js", TMM_CC_URL . '/js/shortcodes/mediaelement/mediaelement-and-player.min.js');
wp_enqueue_style("tmm_theme_mediaelementplayer_css", TMM_CC_URL . '/js/shortcodes/mediaelement/jquery.mediaelementplayer.css');
