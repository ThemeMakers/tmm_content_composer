<?php
tmm_enqueue_script('mixitup');
tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

$column_class = '';
$args = array('numberposts' => $count, 'post_type' => TMM_Portfolio::$slug, 'suppress_filters' => false);
$posts = get_posts($args);
?>
<section class="portfolio-items popup-gallery recent_folio col-<?php echo $template ?>">
    
    <?php foreach ($posts as $post){ ?>  
    
    <article class="slideUp2x">

        <div class="work-item">

            <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post->ID, '510*375')); ?>" alt="" />
            <div class="item-overlay">
                <div class="extra-content">
                    <h2 class="extra-title"><?php echo esc_html($post->post_title); ?></h2>
                    <h6 class="extra-category">
                        <?php
                            $tags = wp_get_post_tags($post->ID);
                            foreach ($tags as $key => $value) {
                                if ($key > 0) {
                                        echo ' / ';
                                }
                                echo $value->name;
                            }
                        ?>
                    </h6>

                    <a class="single-image plus-icon popup-link" href="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post->ID, '')); ?>"><?php _e('Image', TMM_CC_TEXTDOMAIN) ?></a>
                    <a class="single-image link-icon" href="<?php echo get_permalink($post->ID); ?>"><?php _e('Permalink', TMM_CC_TEXTDOMAIN) ?></a>
                </div><!--/ .extra-content-->
            </div><!--/ .item-overlay-->

        </div><!--/ .work-item-->

    </article>	
    
    <?php } ?>
    
</section>