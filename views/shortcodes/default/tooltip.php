<?php
if (!defined('ABSPATH')) exit;

wp_enqueue_script('tmm_tooltipster');
?>
<span title="<?php echo esc_attr($tooltip) ?>" class="lc-tooltip"><?php echo esc_html($content) ?></span>