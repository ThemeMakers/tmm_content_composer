<?php
if (!defined('ABSPATH')) exit;

wp_enqueue_style('tmm_tooltipster');
wp_enqueue_script('tmm_tooltipster');
?>
<span title="<?php echo esc_attr($tooltip) ?>" class="highlight tooltip tooltipstered"><?php echo esc_html($content) ?></span>