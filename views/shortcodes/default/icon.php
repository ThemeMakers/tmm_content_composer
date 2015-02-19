<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if (!isset($icon_css_class)) { $icon_css_class = ""; }
?>
<div class="iconbox">
        <i class="circle-icon <?php  echo $icon_css_class ?>"></i>

        <div class="iconbox-entry">
            <?php if (!empty($content)) { ?>
                <h4 class="iconbox-content-title">
                    <?php echo $content; ?>
                </h4>
            <?php } ?>
            <?php if (!empty($text)){ ?>
                <p>
                       <?php echo $text ?>
                </p>	
            <?php } ?>
                <a class="read-more" href="<?php echo$url ?>">read more</a>
        </div><!--/ .iconbox-entry-->
</div><!--/ .iconbox-->
	
