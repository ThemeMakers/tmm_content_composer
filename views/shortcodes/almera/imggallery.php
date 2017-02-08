<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$effect_class = (TMM::get_option('images_loader')) ? 'translateEffect' : '';
$icons_type = ($gall_amount_icons ) ? $gall_amount_icons : '2';
$icon_class = ($icons_type=='1') ? 'one_icon' : '';

$album_ids = explode('^', $content);
$images = array();
$feature_imgs = array();
$filter =array();

if (!empty($album_ids)) {
    foreach ($album_ids as $gallery_id) {
        
        $cats = get_the_terms($gallery_id, 'gallery_categories');
        
        foreach ($cats as $cat){            
            $filter[$cat->term_id]['id'] = $cat->term_id;
            $filter[$cat->term_id]['name'] = $cat->name;
            $filter[$cat->term_id]['slug'] = $cat->slug;
        }  
        
        $tmp = get_post_meta($gallery_id, 'thememakers_gallery', true);             
        
        if (!empty($tmp)) {            
            foreach ($tmp as $key => $value) {
                $tmp[$key]['post_id'] = $gallery_id;               
            }
        } else {
            $tmp = array();
        }
                
        $images = $images + $tmp;        
        
        if ($layout == 2){
            $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($gallery_id), 'single-post-thumbnail');
            $post_thumb = $post_thumb[0];
            if (!empty($post_thumb)){
                $images[$gallery_id]['imgurl'] = $post_thumb;
                $images[$gallery_id]['post_id'] = $gallery_id;
            } 
        }
              
    }
} else {
    return;
}
$i = 1;
foreach ($images as $key => $value) {
    $images[$key]['key'] = $i;
    $i++;
}
$cat_id = '';

$title_array = array();
if (!empty($images)) {
    foreach ($images as $key => $value) {
        if (!isset($title_array[$value['post_id']])) {
            $title_array[$value['post_id']] = array();
            $title_array[$value['post_id']]['title'] = get_the_title($value['post_id']);
            $post_id = $value['post_id'];
            if (function_exists('icl_object_id')){
                $post_id = icl_object_id($post_id, 'gall', false, ICL_LANGUAGE_CODE); 
            }
            $title_array[$value['post_id']]['permalink'] = get_permalink($post_id);            
        }      
      
    }
}

$img_terms = array();
$img_t = get_terms('gallery_categories', array('hide_empty' => false));

if (!empty($img_t)) {
    foreach ($img_t as $value) {
        $img_terms[$value->term_id]['slug'] = $value->slug;
        $img_terms[$value->term_id]['name'] = $value->name;
        $img_terms[$value->term_id]['id'] = $value->term_id;
    }
}

$current_page = 1;

$gallery_slide_up = (!isset($gallery_slide_up)) ? true : $gallery_slide_up;
$slide_up = $gallery_slide_up;
?>

<?php if (!empty($images)){ 
    if ($layout == 0){ ?>

        <ul class="thumbnails-items clearfix">
            <?php foreach ($images as $img) : ?>
                <li class="two columns <?php echo $effect_class; ?>"><a class="single-image" href="#"><img src="<?php echo TMM_Helper::resize_image($img['imgurl'], '130*130') ?>" alt="<?php echo $img['title'] ?>" /></a></li>
            <?php endforeach; ?>
        </ul><!--/ #thumbnails-->

        <div class="activeSlider">
            <div class="sudo">
                <ul>
                    <?php foreach ($images as $img) : ?>
                        <li><img src="<?php echo $img['imgurl'] ?>" alt="<?php echo $img['title'] ?>"/></li>
                    <?php endforeach; ?>
                </ul>
            </div><!--/ .sudo-->
        </div><!--/ .activeSlider-->

    <?php } ?>

    <?php if ($layout == 2){ ?>

        <p class="description"></p>
        <div class="albums-items">                  

            <ul id="tp-grid" class="tp-grid">			
                <?php foreach ($images as $img){                                       
                        $gall = get_post( $img['post_id'] ); ?>
                    <input type="hidden" class="item_description" data-title="<?php echo $title_array[$img['post_id']]['title'] ?>" data-exerpt="<?php echo $gall->post_excerpt; ?>">
                    <?php $t=$img['title']; ?>
                    <li data-pile="<?php echo $title_array[$img['post_id']]['title'] ?>">

                        <div class="project-thumb animTop <?php if (!$gallery_slide_up) echo 'links' ?>">

                            <a href="<?php echo $img['imgurl'] ?>" class="single-image plus-icon <?php echo $icon_class ?>"
                               title="<?php echo $t = ((TMM::get_option('hide_image_titles')) == '0') ? $t : '' ?>"
                               data-fancybox-group="<?php echo $title_array[$img['post_id']]['title'] ?>">
                                <img alt="<?php echo $img['title'] ?>" <?php if ($gallery_slide_up) echo 'class="slideup"'; ?>
                                     src="<?php echo TMM_Helper::resize_image($img['imgurl'], '270*200') ?>">
                            </a>

                            <?php if ($gallery_slide_up) {
                                ?>
                                <a href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"
                                   class="project-meta">
                                    <h6 class="title"><?php echo $img['title'] ?></h6>
                                    <span class="categories"><?php echo $img_terms[$img['category']]['name'] ?></span>
                                </a>
                            <?php
                            } elseif($icons_type=='2') {
                                ?>
                                <a class="gr-link single-image link-icon"
                                   href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"></a>
                            <?php
                            } ?>

                        </div>
                        <!--/ .project-thumb-->

                    </li>
                <?php } ?>
            </ul>

        </div><!--/ .albums-items-->

    <?php } ?>

    <?php if ($layout == 3 OR $layout == 4){ ?>

        <?php

        if (count($filter)>1 && ($show_filter!='0')){
            foreach ($filter as $key){
                $cat_id = (!empty($cat_id)) ? $cat_id .'^'. $key['slug'] : $key['slug'];
            }
            ?> 
        
        <ul id="gallery-filter" class="gallery-filter clearfix">
            <li><a data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="1" data-post-per-page="<?php echo $post_per_page ?>" data-categories="<?php echo ($pagination == 2) ? $cat_id : '*'; ?>"><?php _e('All', 'tmm_shortcodes') ?></a></li>
            <?php if (!empty($filter)): ?>
                <?php foreach ($filter as $key) : ?>
                    <li><a data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="1" data-post-per-page="<?php echo $post_per_page ?>" data-categories="<?php echo ($pagination == 2) ? $key['slug'] : $key['id']; ?>"><?php echo $key['name'] ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul><!--/ #filter -->		
        
        <?php }else if (count($filter)==1){
            foreach ($filter as $key){
                $cat_id = (!empty($cat_id)) ? $cat_id .'^'. $key['slug'] : $key['slug'];
            }
        } ?>
        
    <?php } ?>

    <?php if ($layout == 3){ ?>		

        <section id="gallery-items" data-listing-page-id="<?php echo get_the_ID(); ?>" class="gallery-items clearfix" data-layout="<?php echo $layout ?>" data-pagination="<?php echo $pagination ?>">
            <?php $i = 1 ?>
            
            <?php foreach ($images as $img) : ?>
                    <?php $t=$img['title']; ?>
                <?php
                if ($pagination == 2) {
                    ?>
                    <?php if (($img['key'] > ($post_per_page * $current_page - $post_per_page)) && ($img['key'] <= $post_per_page * $current_page)) { ?>

                        <article class="one-third column <?php echo $effect_class; ?>" data-categories="<?php echo $img['category'] ?>">

                            <div class="project-thumb animTop <?php if (!$gallery_slide_up) echo 'links' ?>">

                                <a href="<?php echo $img['imgurl'] ?>" class="single-image plus-icon <?php echo $icon_class ?>"
                                   title="<?php echo $t = ((TMM::get_option('hide_image_titles')) == '0') ? $t : '' ?>"
                                   data-fancybox-group="gallery">
                                    <img alt="<?php echo $img['title'] ?>" <?php if ($gallery_slide_up) echo 'class="slideup"'; ?>
                                         src="<?php echo TMM_Helper::resize_image($img['imgurl'], '420*300') ?>">
                                </a>

                                <?php if ($gallery_slide_up) {
                                    ?>
                                    <a href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"
                                       class="project-meta">
                                        <h6 class="title"><?php echo $img['title'] ?></h6>
                                        <span class="categories"><?php echo $img_terms[$img['category']]['name'] ?></span>
                                    </a>
                                <?php
                                } elseif($icons_type=='2') {
                                    ?>
                                    <a class="gr-link single-image link-icon"
                                       href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"></a>
                                <?php
                                } ?>

                            </div>
                            <!--/ .project-thumb-->

                        </article><!--/ .column-->

                    <?php } ?>
                    <?php
                } else {
                    ?>

                    <article class="one-third column <?php echo $effect_class; ?>" data-categories="<?php echo $img['category'] ?>">

                        <div class="project-thumb animTop <?php if (!$gallery_slide_up) echo 'links' ?>">

                            <a href="<?php echo $img['imgurl'] ?>" class="single-image plus-icon <?php echo $icon_class ?>"
                               title="<?php echo $t = ((TMM::get_option('hide_image_titles')) == '0') ? $t : '' ?>"
                               data-fancybox-group="gallery">
                                <img alt="<?php echo $img['title'] ?>" <?php if ($gallery_slide_up) echo 'class="slideup"'; ?>
                                     src="<?php echo TMM_Helper::resize_image($img['imgurl'], '420*300') ?>">
                            </a>

                            <?php if ($gallery_slide_up) {
                                ?>
                                <a href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"
                                   class="project-meta">
                                    <h6 class="title"><?php echo $img['title'] ?></h6>
                                    <span class="categories"><?php echo $img_terms[$img['category']]['name'] ?></span>
                                </a>
                            <?php
                            } elseif($icons_type=='2') {
                                ?>
                                <a class="gr-link single-image link-icon"
                                   href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"></a>
                            <?php
                            } ?>

                        </div>
                        <!--/ .project-thumb-->

                    </article><!--/ .column-->

                    <?php
                }
                ?>

            <?php endforeach; ?>
            <?php
            if (($post_per_page < count($images)) && ($pagination == 2)) {
                $page_count = ceil(count($images) / $post_per_page);
                $t = 1;
                if (($current_page != 1) && ($current_page != $page_count + 1)) {
                    $t = 1;
                }
                ?>
                   
                <div class="wp-pagenavi gall">
                    <?php

                    for ($i = 1; $i <= $page_count + $t; $i++) {
                        if ($page_count == $current_page) {
                            if ($i == 1) {
                                ?>
                                <li><a class="prev page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page - 1 ?>"  href="#"></a></li>
                                <?php
                            } else if ($i == $page_count + $t) {
                                ?>
                                <span class="page-numbers current"><?php echo $current_page ?></span>
                                <?php
                            } else {
                                ?>
                                <li><a class="page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $i - 1 ?>" href="#"><?php echo $i - 1 ?></a></li>

                                <?php
                            }
                        } else {
                            if ($i == 1) {
                                if ($current_page == $i) {
                                    ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="prev page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page - 1 ?>"  href="#"></a></li>
                                    <?php
                                }
                            } else if ($i == $page_count + $t) {
                                if ($current_page == $i - $t) {
                                    ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="next page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page + 1 ?>" href="#"></a></li>
                                    <?php
                                }
                                ?>

                                <?php
                            } else {
                                if ($current_page == $i) {
                                    ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $i ?>" href="#"><?php echo $i ?></a></li>
                                    <?php
                                }
                                ?>

                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>			

        </section>
    <?php } ?>

    <?php if ($layout == 4) { ?>
        <section id="gallery-items" data-listing-page-id="<?php echo get_the_ID(); ?>" class="gallery-items clearfix" data-layout="<?php echo $layout ?>" data-pagination="<?php echo $pagination ?>">

            <?php foreach ($images as $img) {

            $t = $img['title'];

            if ($pagination == 2) {
                ?>
                <?php if (($img['key'] > ($post_per_page * $current_page - $post_per_page)) && ($img['key'] <= $post_per_page * $current_page)) { ?>

                    <article class="four columns <?php echo $effect_class; ?>" data-categories="<?php echo $img['category'] ?>">

                        <div class="project-thumb animTop <?php if (!$gallery_slide_up) echo 'links' ?>">

                            <a href="<?php echo $img['imgurl'] ?>" class="single-image plus-icon <?php echo $icon_class ?>"
                               title="<?php echo $t = ((TMM::get_option('hide_image_titles')) == '0') ? $t : '' ?>"
                               data-fancybox-group="gallery">
                                <img alt="<?php echo $img['title'] ?>" <?php if ($gallery_slide_up) echo 'class="slideup"'; ?>
                                     src="<?php echo TMM_Helper::resize_image($img['imgurl'], '420*300') ?>">
                            </a>

                            <?php if ($gallery_slide_up) {
                                ?>
                                <a href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"
                                   class="project-meta">
                                    <h6 class="title"><?php echo $img['title'] ?></h6>
                                    <span class="categories"><?php echo $img_terms[$img['category']]['name'] ?></span>
                                </a>
                            <?php
                            } elseif($icons_type=='2') {
                                ?>
                                <a class="gr-link single-image link-icon"
                                   href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"></a>
                            <?php
                            } ?>

                        </div>
                        <!--/ .project-thumb-->

                    </article><!--/ .column-->

                <?php }

                } else {
                    ?>
                    <article class="four columns <?php echo $effect_class; ?>" data-categories="<?php echo $img['category'] ?>">

                        <div class="project-thumb animTop <?php if (!$gallery_slide_up) echo 'links' ?>">

                            <a href="<?php echo $img['imgurl'] ?>" class="single-image plus-icon <?php echo $icon_class ?>"
                               title="<?php echo $t = ((TMM::get_option('hide_image_titles')) == '0') ? $t : '' ?>"
                               data-fancybox-group="gallery">
                                <img alt="<?php echo $img['title'] ?>" <?php if ($gallery_slide_up) echo 'class="slideup"'; ?>
                                     src="<?php echo TMM_Helper::resize_image($img['imgurl'], '420*300') ?>">
                            </a>

                            <?php if ($gallery_slide_up) {
                                ?>
                                <a href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"
                                   class="project-meta">
                                    <h6 class="title"><?php echo $img['title'] ?></h6>
                                    <span class="categories"><?php echo $img_terms[$img['category']]['name'] ?></span>
                                </a>
                            <?php
                            } elseif($icons_type=='2') {
                                ?>
                                <a class="gr-link single-image link-icon"
                                   href="<?php echo $title_href = (!empty($img['title_href'])) ? $img['title_href'] : $title_array[$img['post_id']]['permalink'] ?>"></a>
                            <?php
                            } ?>

                        </div>
                        <!--/ .project-thumb-->

                    </article><!--/ .column-->
                <?php
                }

            } ?>
            <?php
            if (($post_per_page < count($images)) && ($pagination == 2)) {
                $page_count = ceil(count($images) / $post_per_page);
                $t = 1;
                if (($current_page != 1) && ($current_page != $page_count + 1)) {
                    $t = 1;
                }
                ?>
                <div class="wp-pagenavi gall">
                <?php               
                
                for ($i = 1; $i <= $page_count + $t; $i++) {
                    if ($page_count == $current_page) {
                        if ($i == 1) {
                            ?>
                                <li><a class="prev page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page - 1 ?>"  href="#"></a></li>
                                <?php
                            } else if ($i == $page_count + $t) {
                                ?>
                                <span class="page-numbers current"><?php echo $current_page ?></span>
                                <?php
                            } else {
                                ?>
                                <li><a class="page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $i - 1 ?>" href="#"><?php echo $i - 1 ?></a></li>

                        <?php
                    }
                } else {
                    if ($i == 1) {
                        if ($current_page == $i) {
                            ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="prev page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page - 1 ?>"  href="#"></a></li>
                                    <?php
                                }
                            } else if ($i == $page_count + $t) {
                                if ($current_page == $i - $t) {
                                    ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="next page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $current_page + 1 ?>" href="#"></a></li>
                                    <?php
                                }
                                ?>

                                <?php
                            } else {
                                if ($current_page == $i) {
                                    ?>
                                    <span class="page-numbers current"><?php echo $current_page ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <li><a class="page-numbers" data-categories="<?php echo $cat_id ?>" data-post-per-page="<?php echo $post_per_page ?>" data-icons="<?php echo $icons_type ?>" data-slideup=<?php echo $slide_up; ?> data-page-namber="<?php echo $i ?>" href="#"><?php echo $i ?></a></li>
                                    <?php
                                }
                                ?>

                                    <?php
                                }
                            }
                        }
                        ?>
                </div>
                    <?php
                }
                ?>			
        </section>
    <?php } ?>

<?php } ?>