<?php
$images = explode('^', $titles);
$links = explode('^', $content);
$max = count($images)-1;
$uniqid = uniqid();
tmm_enqueue_script('owlcarousel');
tmm_enqueue_style('owlcarousel');
tmm_enqueue_style('owltheme');                                                            
tmm_enqueue_style('owltransitions');

$slides_count = ceil(count($images)/$items_per_slide);
?>
<?php if (!empty($images)){ ?>
	<div class="clients-items-<?php echo $uniqid ?> clients-items clearfix">
        
        <?php 
        $k=1;
        for ($s=0; $s<$slides_count; $s++){ ?>
            <div class="item">
                <ul>
                    <?php for ($i=$items_per_slide*($k-1); $i<($items_per_slide*$k); $i++){                        
                        if(isset($images[$i])){
                            ?>
                            <li>
                                <a href="<?php echo(!empty($links[$i]) ? esc_url($links[$i]) : '#') ?>"><img alt="" src="<?php echo esc_url(TMM_Content_Composer::resize_image($images[$i], '')) ?>"></a>
                            </li>
                            <?php
                            }
                        } ?>
                </ul>
            </div>
        <?php        
        
        $k++;
        } ?>
            
	</div>
    <script>
        jQuery(function() {		
            if (jQuery('.clients-items-<?php echo $uniqid ?> .item').length>1){
                jQuery('.clients-items-<?php echo $uniqid ?>').owlCarousel({
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