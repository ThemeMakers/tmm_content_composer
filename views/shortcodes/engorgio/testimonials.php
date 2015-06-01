<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div class="widget widget_testimonials">

	<?php	
    $uniqid = uniqid();
	
	$args = array();

	if ($show == 'mode1') {
		$args = array(
			'post_type' => TMM_Testimonial::$slug,
			'p' => $content,
            'suppress_filters' => false
		);
	} elseif ($show == 'mode2') {
		$args = array(
			'post_type' => TMM_Testimonial::$slug,
			'orderby' => 'rand',
			'posts_per_page' => $count,
             'suppress_filters' => false
		);
	} else {
		$args = array(
			'post_type' => TMM_Testimonial::$slug,
			'posts_per_page' => $count,
            'suppress_filters' => false
		);
	}

        $image_sizes = '50*50';
			
	$posts = get_posts($args);
		
	?>
        <div class="quotes quotes-<?php echo $uniqid ?> <?php echo (isset($content_color)) ? 'content_'.$content_color : ''; ?>">	
		
	<?php
		foreach ($posts as $post){ 
				
            $fonts_link = tmm_get_font_link( $post->ID );
            if(!empty($fonts_link)){
                wp_enqueue_style('tmm_google_fonts_'. uniqid(), $fonts_link, null, false);
            }
            ?>
                <div class="item">
                    <blockquote class="quote-text">
                        <?php echo do_shortcode($post->post_content); ?>
                    </blockquote>
                    <div class="quote-meta">
                        <div class="quote-author"><?php echo esc_html(get_the_title($post->ID)); ?><?php echo (get_post_meta($post->ID, 'position', true)) ? ', '. esc_html(get_post_meta($post->ID, 'position', true)) : '';  ?></div>
                        <?php if ($show_photo AND has_post_thumbnail($post->ID)) { ?>
                            <div class="quote-image"><img alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" src="<?php echo esc_js(TMM_Content_Composer::get_post_featured_image($post->ID, $image_sizes)); ?>"></div>
                        <?php
                        }
                        ?>
                    </div><!--/ .quote-meta-->

                </div>

            <?php
        }
		?>
        </div><!--/ .quotes-->	
        
        <script>
        jQuery(function() {		
            if (jQuery('.quotes-<?php echo $uniqid ?> .item').length>1){
                jQuery('.quotes-<?php echo $uniqid ?>').owlCarousel({                               
                    autoPlay : 5000,
                    stopOnHover : true,
                    navigation: false,
                    slideSpeed: 300,
                    singleItem: true,                
                    transitionStyle : "<?php echo (isset($animation_type)&&(!empty($animation_type))) ? esc_js($animation_type) : 'backSlide' ?>"
                });
            }          
        });
        </script>
	
<?php wp_reset_query(); ?>
</div><!--/ .widget-container-->


