<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" type="audio/mp3" preload="none" src="<?php echo $content ?>"></audio>
<?php
wp_enqueue_style('tmm_mediaelement');
wp_enqueue_script('mediaelement');
