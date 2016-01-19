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
$slides_count = ceil(count($images)/$items_per_slide);

?>
<?php if (!empty($images)){ ?>
	<div class="clients-items-<?php echo esc_attr($uniqid) ?> clients-items clearfix">

        <div class="item">
            <ul class="clients-items clearfix">
                <?php foreach ($images as $key => $img_src): ?>
                    <li class="<?php if ($animation) echo $animation ?>">
                        <a href="<?php echo(!empty($links[$key]) ? $links[$key] : '#') ?>"><img alt="" src="<?php echo TMM_Helper::resize_image($img_src, '') ?>"></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

	</div>
    <script>
        jQuery(function() {		
            if (jQuery('.clients-items-<?php echo esc_js($uniqid) ?> .item').length>1){
                jQuery('.clients-items-<?php echo esc_js($uniqid) ?>').owlCarousel({
                    autoPlay : 5000,
                    stopOnHover : true,					
                    navigation: false,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true,
                    theme : "owl-theme",
                    transitionStyle : "<?php echo (isset($animation_type)&&(!empty($animation_type))) ? esc_js($animation_type) : 'scaleToFade' ?>"

                });
            }
        });
    </script>
<?php }