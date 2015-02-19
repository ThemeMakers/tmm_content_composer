<?php
if (!defined('ABSPATH')) exit;

wp_enqueue_style('tmm_tooltipster');
wp_enqueue_script('tmm_tooltipster');
?>
<span title="<?php echo $tooltip ?>" class="highlight tooltip tooltipstered"><?php echo $content ?></span>