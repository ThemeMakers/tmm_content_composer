<?php if (!defined('ABSPATH')) die('No direct access allowed');

$terms = TMM_Ext_PostType_Car::get_locations(0);
$searching_page = get_permalink(TMM::get_option('searching_page', TMM_APP_CARDEALER_PREFIX));

$base_location_url = esc_url($searching_page);
?>

<ul class="list-entry carlocations_list list">

	<?php foreach ($terms as $term) : ?>
		<?php
		$states = ($location_level > 1) ? Carlocation_List_Table::get_children_items(array($term->id)) : array();
		$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($term->id, 1);

		if ($car_count <= 0 && $hide_empty) {
			continue;
		}
		?>

		<li class="cat-item cat-item-<?php echo (int) $term->id; ?>">
			<a title="<?php echo esc_attr(sprintf(__('View all posts filed under %s', 'tmm_content_composer'), $term->name)); ?>"
				href="<?php echo $base_location_url; ?>"
				data-carlocation="<?php echo (int) $term->id; ?>"
				data-carlocation-labels="<?php echo esc_attr($term->name); ?>"
				rel="nofollow"><?php echo esc_html($term->name); ?></a>
			(<?php echo (int) $car_count; ?>)&#x200E;

			<?php if (!empty($states)) : ?>
				<ul class="list-entry carlocations_list list">
					<?php foreach ($states as $state) : ?>
						<?php
						$cities = ($location_level > 2) ? Carlocation_List_Table::get_children_items(array($state->id)) : array();
						$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($state->id, 2);

						if ($car_count <= 0 && $hide_empty) {
							continue;
						}
						?>
						<li class="cat-item cat-item-<?php echo (int) $state->id; ?>">
							<a title="<?php echo esc_attr(sprintf(__('View all posts filed under %s', 'tmm_content_composer'), $state->name)); ?>"
								href="<?php echo $base_location_url; ?>"
								data-carlocation="<?php echo esc_attr($term->id . ',' . $state->id); ?>"
								data-carlocation-labels="<?php echo esc_attr($term->name . ',' . $state->name); ?>"
								rel="nofollow"><?php echo esc_html($state->name); ?></a>
							(<?php echo (int) $car_count; ?>)&#x200E;

							<?php if (!empty($cities)) : ?>
								<ul class="list-entry carlocations_list list">
									<?php foreach ($cities as $city) : ?>
										<?php
										$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($city->id, 3);
										if ($car_count <= 0 && $hide_empty) {
											continue;
										}
										?>
										<li class="cat-item cat-item-<?php echo (int) $city->id; ?>">
											<a title="<?php echo esc_attr(sprintf(__('View all posts filed under %s', 'tmm_content_composer'), $city->name)); ?>"
												href="<?php echo $base_location_url; ?>"
												data-carlocation="<?php echo esc_attr($term->id . ',' . $state->id . ',' . $city->id); ?>"
												data-carlocation-labels="<?php echo esc_attr($term->name . ',' . $state->name . ',' . $city->name); ?>"
												rel="nofollow"><?php echo esc_html($city->name); ?></a>
											(<?php echo (int) $car_count; ?>)&#x200E;
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>

</ul>
