<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" preload="none" src="<?php echo $content ?>"></audio>
<?php
wp_enqueue_style("tmm_cc_mediaelement");
wp_enqueue_script('tmm_cc_mediaelement');
