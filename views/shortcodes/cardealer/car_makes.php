<?php
if (!defined('ABSPATH')) exit();

if (!empty($logos_list)) {
	if (!is_array($logos_list)) {
		$logos_list = explode(',', $logos_list);
	}
} else {
	$logos_list = '';
}

$args = array(
	'orderby'           => 'name',
	'order'             => 'ASC',
	'include'             => $logos_list,
	'hide_empty'        => $hide_empty,
	'fields'            => 'all',
	'parent'            => 0,
	'hierarchical'      => 1,
	'pad_counts'        => 1,
);

$makes = get_terms('carproducer', $args);

if (!isset($show_name)) {
	$show_name = 1;
}
?>

<ul class="carproducers_list">

	<?php
	foreach ($makes as $make){

		$image_name = strtolower($make->name);
		$image_name = preg_replace( array('/\s/', '/ë/'), array('_', 'e'), $image_name );
		$src = 'images/car_makes_logos/' . $image_name . '.svg';

		if ( !file_exists(TMM_CC_DIR . $src) ) {
			$src = '';
		}else{
			$src = TMM_CC_URL . $src;
		}

		if (isset($show_only_with_logo) && $show_only_with_logo && !$src) {
			continue;
		}

		if($make->count > 0 || !$hide_empty){
			?>

			<li class="cat-item-<?php echo $make->term_id; ?><?php if($show_name){ ?> with-title<?php } ?>">

			<?php if (!isset($show_link) || $show_link) { ?>
				<a title="<?php echo sprintf(__('View all ads filed under %s', TMM_CC_TEXTDOMAIN), $make->name); ?>" href="<?php echo get_term_link($make->slug, 'carproducer'); ?>">
			<?php } ?>

				<?php if($show_logo && $src != ''){ ?>
					<img src="<?php echo $src; ?>" alt="<?php echo $make->name; ?>" />
				<?php } ?>

				<?php if($show_name){ ?>
					<span class="car-title">
				<?php } ?>

					<?php
					echo ($show_name) ? $make->name : '';
					echo (!isset($show_count) || $show_count) ? ' (' . $make->count . ')&#x200E;' : '';
					?>

				<?php if($show_name){ ?>
					</span>
				<?php } ?>

			<?php if (!isset($show_link) || $show_link) { ?>
				</a>
			<?php } ?>

			</li>

		<?php
		}
	}
	?>

</ul>