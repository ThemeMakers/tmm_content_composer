<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<<<<<<< HEAD
<audio controls="control" preload="none" src="<?php echo $content ?>"></audio>
=======
<audio preload="none" src="<?php echo esc_url($content) ?>"></audio>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
<?php
wp_enqueue_script('mediaelement');
wp_enqueue_style("tmm_mediaelement");
