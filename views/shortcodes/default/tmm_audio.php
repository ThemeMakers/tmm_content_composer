<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio preload="none" src="<?php echo esc_url($content) ?>"></audio>
<?php
wp_enqueue_script( 'wp-mediaelement', false, array('jquery'), false, true );
