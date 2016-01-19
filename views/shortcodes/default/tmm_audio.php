<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" preload="none" src="<?php echo esc_url($content) ?>"></audio>
<?php
wp_enqueue_style('tmm_mediaelement');
wp_enqueue_script('mediaelement');
