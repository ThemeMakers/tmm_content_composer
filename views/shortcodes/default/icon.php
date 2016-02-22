<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if (!isset($icon_css_class)) { $icon_css_class = ""; }
?>
<div class="lc-iconbox">
        <i class="circle-icon <?php  echo esc_attr($icon_css_class) ?>"></i>

        <div class="iconbox-entry">
            <?php if (!empty($content)) { ?>
                <h4 class="iconbox-content-title">
                    <?php echo esc_html($content); ?>
                </h4>
            <?php } ?>
            <?php if (!empty($text)){ ?>
                <p>
                       <?php echo esc_html($text) ?>
                </p>	
            <?php } ?>
                <a class="read-more" href="<?php echo esc_url($url) ?>"><?php  esc_html_e('read more', 'tmm_content_composer') ?></a>

        </div><!--/ .iconbox-entry-->

</div><!--/ .iconbox-->
	
