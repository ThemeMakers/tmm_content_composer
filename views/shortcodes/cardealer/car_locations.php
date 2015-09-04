<?php
if (!defined('ABSPATH')) die('No direct access allowed');

$terms = TMM_Ext_PostType_Car::get_locations(0);
$searching_page = get_permalink(TMM::get_option('searching_page', TMM_APP_CARDEALER_PREFIX));
?>

<ul class="carlocations_list list">
	
	<?php 
	foreach ($terms as $term){
		$states = array();
		if($location_level > 1){
			$states = Carlocation_List_Table::get_children_items(array($term->id));
		}
		$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($term->id, 1);
		
		if($car_count > 0 || !$hide_empty){
		?>
	
		<li class="cat-item cat-item-<?php echo $term->id ?>">
			<a title="<?php echo sprintf(__('View all posts filed under %s', TMM_CC_TEXTDOMAIN), $term->name); ?>" href="<?php echo $searching_page; ?>?carlocation=<?php echo $term->id ?>"><?php _e($term->name, TMM_CC_TEXTDOMAIN); ?></a> (<?php echo $car_count; ?>)
			<?php
			if(count($states)){
				?>
			
				<ul class="carlocations_list list">
					
				<?php
					foreach ($states as $state){
						$cities = array();
						if($location_level > 2){
							$cities = Carlocation_List_Table::get_children_items(array($state->id));
						}
						$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($state->id, 2);
						
						if($car_count > 0 || !$hide_empty){
							?>
					
							<li class="cat-item cat-item-<?php echo $state->id ?>">
								<a title="<?php echo sprintf(__('View all posts filed under %s', TMM_CC_TEXTDOMAIN), $state->name); ?>" href="<?php echo $searching_page; ?>?carlocation=<?php echo $term->id. ',' .$state->id ?>"><?php _e($state->name, TMM_CC_TEXTDOMAIN); ?></a> (<?php echo $car_count; ?>)
								<?php
								if(count($cities)){
									?>
								
									<ul class="carlocations_list list">
										
									<?php
										foreach ($cities as $city){
											$car_count = TMM_Ext_PostType_Car::get_cars_count_by_locationid($city->id, 3);
											
											if($car_count > 0 || !$hide_empty){
												?>

												<li class="cat-item cat-item-<?php echo $city->id ?>">
													<a title="<?php echo sprintf(__('View all posts filed under %s', TMM_CC_TEXTDOMAIN), $city->name); ?>" href="<?php echo $searching_page; ?>?carlocation=<?php echo $term->id. ',' .$state->id. ',' .$city->id ?>"><?php _e($city->name, TMM_CC_TEXTDOMAIN); ?></a> (<?php echo $car_count; ?>)

												</li>

												<?php
											}
										}
									?>
											
									</ul>
								
									<?php
								}
								?>
							</li>
							
							<?php
						}
					}
				?>
							
				</ul>
			
				<?php
			}
			?>
		</li>
		
	<?php 
			}
		}
	?>
		
</ul>
