<?php
$images = explode('^', $titles);
$links = explode('^', $content);
$max = count($images)-1;
$uniqid = uniqid();
if (!class_exists('TMM')) {
    tmm_enqueue_script('owlcarousel');
    tmm_enqueue_style('owlcarousel');
    tmm_enqueue_style('owltheme');
    tmm_enqueue_style('owltransitions');
}
$slides_count = count($images);
?>
<?php if (!empty($images)){ ?>
	<div class="lc-clients clients-items-<?php echo esc_attr($uniqid) ?>">
        
        <?php
        for ($s=0; $s<$slides_count; $s++){ ?>
            <a href="<?php echo(!empty($links[$s]) ? $links[$s] : '#') ?>"><img alt="" src="<?php echo esc_url(TMM_Content_Composer::resize_image($images[$s], '')) ?>"></a>
        <?php

        } ?>
            
	</div>
    <script>
        jQuery(function() {		
            if (jQuery('.clients-items-<?php echo esc_js($uniqid) ?> a').length>1){
                jQuery('.clients-items-<?php echo esc_js($uniqid) ?>').owlCarousel({

                    items:              <?php echo esc_js($items_per_slide) ?>,
                    loop:               true,
                    nav:                false,
                    dots:               false,
                    autoplay:           true,
                    autoplayTimeout:    5000,
                    responsiveClass:    true,
                    itemElement:        'li',
                    stageElement:       'ul'

                });
            }
        });
    </script>
<?php }