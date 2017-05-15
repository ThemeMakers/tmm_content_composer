<?php
tmm_enqueue_script('mixitup');
tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

$column_class = '';
$args = array('numberposts' => $count, 'post_type' => TMM_Portfolio::$slug, 'suppress_filters' => false);
$posts = get_posts($args);
?>
<div class="portfolio-items popup-gallery recent_folio col-<?php echo $template ?>">

    <?php foreach ($posts as $post){
	    $imgID  = get_post_thumbnail_id($post->ID);
	    $alt_text = get_post_meta($imgID, '_wp_attachment_image_alt', true);
	    if(empty($alt_text)) {
		    $attachment = get_post($post->ID);
		    $alt_text = trim(strip_tags( $attachment->post_title ));
	    }
	    ?>
    
    <article class="slideUp2x">

        <div class="work-item">

            <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post->ID, '510*375')); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
            <div class="item-overlay">
                <div class="extra-content">
                    <h2 class="extra-title"><?php echo esc_html($post->post_title); ?></h2>

                    <a class="single-image plus-icon popup-link" href="<?php echo (get_post_thumbnail_id($post->ID)) ? esc_url(TMM_Content_Composer::get_post_featured_image($post->ID, '')) : ''; ?>"><?php _e('Image', TMM_CC_TEXTDOMAIN) ?></a>
                    <a class="single-image link-icon" href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php _e('Permalink', TMM_CC_TEXTDOMAIN) ?></a>
                </div><!--/ .extra-content-->
            </div><!--/ .item-overlay-->

        </div><!--/ .work-item-->

    </article>	
    
    <?php } ?>
    
</div>