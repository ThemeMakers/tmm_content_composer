<?php if (!defined('ABSPATH')) exit();

if (!empty($logos_list)) {
	if (!is_array($logos_list)) {
		$logos_list = explode(',', $logos_list);
	}
} else {
	$logos_list = '';
}

$hide_empty = isset($hide_empty) ? $hide_empty : false;

if ( !function_exists( 'get_terms' ) ) {
	require_once ABSPATH . WPINC . '/taxonomy.php';
}

// TODO: update the shortcode with the following feature extension
$args = array(
	'taxonomy'         => 'carproducer',
	'orderby'          => 'none',
	'order'            => 'ASC',
	'include'          => $logos_list,
	'hide_empty'       => $hide_empty,
	'fields'           => 'all',
	'parent'           => 0,
	'hierarchical'     => true,
	'pad_counts'       => true
);

$makes = get_terms($args);

if (!isset($show_name)) {
	$show_name = 1;
}
//var_dump($logos_list);

//usort($makes);

//var_dump($makes);

?>

<ul class="carproducers_list">

	<?php
	foreach ($makes as $make){

//		var_dump($make->term_id);

		$image_name = strtolower($make->name);
		$image_name = preg_replace( array('/\s/', '/ë/'), array('_', 'e'), $image_name );
		$src = 'images/car_makes_logos/' . $image_name . '.svg';

		if ( !file_exists(TMM_CC_DIR . $src) ) {
			$src = '';
		} else {
			$src = TMM_CC_URL . $src;
		}

		if (isset($show_only_with_logo) && $show_only_with_logo && !$src) {
			continue;
		}

		if($make->count > 0 || !$hide_empty){
			?>

			<li class="cat-item-<?php echo esc_attr( $make->term_id ) ?><?php if($show_name){ ?> with-title<?php } ?>">

			<?php if (!isset($show_link) || $show_link && $make->count > 0) { ?>
				<a title="<?php echo sprintf(esc_html__('View all ads filed under %s', 'tmm_content_composer'), $make->name); ?>" href="<?php echo get_term_link($make->slug, 'carproducer'); ?>">
			<?php } ?>

				<?php if($show_logo && $src != ''){ ?>
					<img src="<?php echo esc_attr( $src ) ?>" alt="<?php echo esc_html__( $make->name, 'tmm_content_composer' ) ?>" />
				<?php } ?>

				<?php if($show_name){ ?>
					<span class="car-title">

					<?php
					echo esc_html__( $make->name, 'tmm_content_composer' );
					echo (!isset($show_count) || $show_count) ? ' (' . $make->count . ')' : '';
					?>

					</span>
				<?php } ?>

			<?php if (!isset($show_link) || $show_link && $make->count > 0) { ?>
				</a>
			<?php } ?>

			</li>

		<?php
		}
	}
	?>

</ul>