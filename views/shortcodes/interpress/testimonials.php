<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="lc-testimonials">

	<?php

    wp_enqueue_script('tmm_cycle');

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

        <ul class="quotes quotes-<?php echo $uniqid ?>"
            data-cycle-slides="> li"
            data-cycle-pause="true"
            data-cycle-speed="<?php echo esc_js($slidespeed) ?>"
            data-cycle-timeout="<?php echo esc_js($timeout) ?>"
            data-cycle-fx="<?php echo (isset($animation_type) && !empty($animation_type)) ? "'".esc_js($animation_type)."'" : 'fade' ?>"
	        <?php if ($nav) { ?>
		        data-cycle-next=".quotes-next-<?php echo $uniqid ?>"
		        data-cycle-prev=".quotes-prev-<?php echo $uniqid ?>"
	        <?php } ?>>
		
	<?php
		foreach ($posts as $post){ 
				
            $fonts_link = tmm_get_font_link( $post->ID );
            if(!empty($fonts_link)){
                wp_enqueue_style('tmm_google_fonts_'. uniqid(), $fonts_link, null, false);
            }
            ?>
                <li>
                    <blockquote class="quote-text">
                        <?php echo do_shortcode($post->post_content); ?>
                    </blockquote>
                    <div class="quote-meta">
                        <?php if ($show_name && !empty($show_name)){ ?>
                            <div class="quote-author"><?php echo esc_html(get_the_title($post->ID)); ?><?php echo (get_post_meta($post->ID, 'position', true)) ? ', '. esc_html(get_post_meta($post->ID, 'position', true)) : '';  ?></div>
                        <?php } ?>

                        <?php if ($show_photo && has_post_thumbnail($post->ID)) { ?>
                            <div class="quote-image"><img alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" src="<?php echo esc_js(TMM_Content_Composer::get_post_featured_image($post->ID, $image_sizes)); ?>"></div>
                        <?php
                        }
                        ?>
                    </div><!--/ .quote-meta-->
                </li>

            <?php
        }
		?>
        </ul><!--/ .cycle slider-->

		<?php if ($nav){ ?>
			<!-- Pager	-->
			<div class="quotes-nav">
				<a class="quotes-prev-<?php echo $uniqid ?>"><?php _e('Prev', TMM_CC_TEXTDOMAIN) ?></a>
				<a class="quotes-next-<?php echo $uniqid ?>"><?php _e('Next', TMM_CC_TEXTDOMAIN) ?></a>
			</div>
		<?php } ?>
        
        <script type="text/javascript">
        jQuery(function() {
            if (jQuery('.quotes-<?php echo $uniqid ?> li').length>1){
                jQuery('.quotes-<?php echo $uniqid ?>').cycle();
            }          
        });
        </script>
	
<?php wp_reset_query(); ?>
</div><!--/ .widget-container-->