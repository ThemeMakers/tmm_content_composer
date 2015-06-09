<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
tmm_enqueue_script('mixitup');
tmm_enqueue_script('magnific');
tmm_enqueue_style('magnific');

$layout = $content;

$display_images = isset($display_images) ? $display_images : 'cover';
$hover_effect = isset($hover_effect) ? $hover_effect : 'colored';

if (!$posts_per_page) {
	$posts_per_page = 6;
}

$tax_query_array = array();

if (!isset($skills)) {
	$skills = 'all';
}

if (!isset($clients)) {
	$clients = 'all';
}

if (!isset($tags)) {
	$tags = '';
}

if ($skills != 'all') {
	$tax_query_array[] = array(
		'taxonomy' => 'skills',
		'field' => 'term_id',
		'terms' => array($skills),
	);
}

if ($clients != 'all') {
	$tax_query_array[] = array(
		'taxonomy' => 'clients',
		'field' => 'term_id',
		'terms' => array($clients),
	);
}
$folio_page = 1;
if (isset($_GET['folio_page'])) {
	$folio_page = $_GET['folio_page'];
}
global $post;
if (is_object($post))
$current_page_id = $post->ID;

$query = new WP_Query(array(
    'tag' => $tags,
    'tax_query' => $tax_query_array,
    'post_type' => TMM_Portfolio::$slug,
    'showposts' => '-1'    
        ));

$posts_array = $query->posts;

$featured_image_alias = TMM_Portfolio::get_folio_alias($layout);
$folio_terms = TMM_Portfolio::get_folio_tags();

$folio_category = (!empty($folio_category) && $folio_category !== 'null') ? explode(',', $folio_category) : array();
$folio_images = TMM_Portfolio::get_folio_images($display_images, $skills, $clients); // all images array
$loaded_images = array();
$folio_category_slugs = array();

if ($folio_terms && $folio_category) {
    foreach ( $folio_terms as $term ) {
        if (in_array($term->term_id, $folio_category)) {
            $folio_category_slugs[$term->slug] = 1;
        }
    }

    $folio_category_slugs = array_keys($folio_category_slugs);
}

$uniqid = uniqid();
$folio_tags = TMM_Portfolio::get_folio_tags();

$count_images_by_cat = 0;

if (!empty($folio_category)) {
    foreach ($folio_images as $image) {
        $cats = explode(' ', $image['slug']);
        foreach ($cats as $cat) {
            if (in_array($cat, $folio_category_slugs)) {
                $count_images_by_cat++;
                break;
            }
        }
    }
} else {
    $count_images_by_cat = count($folio_images);
}

?>
<div class="portfolio-holder">
<div class="filter-holder clearfix">
    
        <?php if($folio_filter){ ?>

            <div class="filter-container">
                <ul id="portfolio_filter_<?php echo $uniqid; ?>" class="portfolio-filter">

                    <li><a class="filter active" data-filter="all"><?php _e('All', TMM_CC_TEXTDOMAIN); ?></a></li>

                    <?php if (!empty($folio_tags)): ?>
                        <?php foreach ($folio_tags as $term_id => $tag) : ?>
                            <?php if (empty($folio_category) || in_array($term_id, $folio_category)): ?>
                                <li><a class="filter" data-filter=".<?php echo $tag->slug ?>"><?php _e($tag->name, TMM_CC_TEXTDOMAIN); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </ul><!--/ .portfolio-filter-->
            </div><!--/ .filter-container-->
            
        <?php } ?>

    <section id="portfolio_items_<?php echo $uniqid; ?>" class="portfolio-items popup-gallery folio-popup col-<?php echo esc_attr($layout) ?>" data-columns="<?php echo esc_attr($layout) ?>" data-overlay="<?php echo ($hover_effect == 'colored') ? true : false; ?>" data-display="<?php echo $display_images ?>" data-skills="<?php echo $skills ?>" data-clients="<?php echo $clients ?>">

        <?php
        foreach ($folio_images as $key => $image) {

            if (count($loaded_images) >= $posts_per_page) {
                break;
            }

            $display = true;

            if (!empty($folio_category_slugs)) {
                $display = false;
                $cat_slugs = explode(' ', $image['slug']);

                foreach ($folio_category_slugs as $cat) {
                    if ( in_array($cat, $cat_slugs) ) {
                        $display = true;
                    }
                }
            }

            if ($display) {
                $loaded_images[$key] = $image;
                $data = array();
                $data['post_key'] = $key;
                $data['folios'] = $folio_images;
                $data['show_categories'] = $show_categories;
                $data['show_overlay'] = ($hover_effect == 'colored') ? true : false;
                $data['col'] = $layout;
                $data['display_images'] = $display_images;
                $data['skills'] = $skills;
                $data['clients'] = $clients;
                echo TMM::draw_html('portfolio/shortcodes/folio_article', $data);
            }

        }
        ?>

    </section><!--/ .portfolio-items-->

</div><!--/ .filter-holder-->

<?php if ($count_images_by_cat > $posts_per_page) {	?>

    <div class="folio-loader">
        <div id="infscr-loading">
            <div id="circleG">
                <div id="circleG_1" class="circleG">
                </div>
                <div id="circleG_2" class="circleG">
                </div>
                <div id="circleG_3" class="circleG">
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-paging">
        <a  href="#" data-total="<?php echo esc_attr($count_images_by_cat); ?>" data-loaded="<?php echo esc_attr(implode(',', array_keys($loaded_images))); ?>" data-perpage="<?php echo esc_attr($posts_per_page); ?>" data-perload="<?php echo esc_attr($posts_per_load); ?>" data-category="<?php echo !empty($folio_category_slugs) ? esc_attr(implode(',', $folio_category_slugs)) : 'all'; ?>" data-showcategories="<?php echo esc_attr($show_categories); ?>" class="load-more"><?php _e('Load More', TMM_CC_TEXTDOMAIN); ?></a>
    </div><!--/ .portfolio-paging-->

<?php } ?>

</div>