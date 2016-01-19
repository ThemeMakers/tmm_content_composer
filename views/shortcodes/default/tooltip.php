<?php
if (!defined('ABSPATH')) exit;

wp_enqueue_style('tmm_tooltipster');
wp_enqueue_script('tmm_tooltipster');
?>
<a href="<?php echo $link ?>" target="<?php echo $link_target ?>"
   <?php if (!empty($tooltip)): ?> class="highlight tooltip tooltipstered" title="<?php echo $tooltip ?>" <?php endif; ?>>
   <?php echo $content ?>
</a>