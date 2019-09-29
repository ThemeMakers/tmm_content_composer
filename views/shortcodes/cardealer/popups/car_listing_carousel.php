<?php if ( !defined('ABSPATH') ) exit(); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', 'cardealer'),
			'shortcode_field' => 'title',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('title', ''),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Enter Number of Cars', 'cardealer'),
			'shortcode_field' => 'count',
			'id' => '',
			'options' => array(
				3 => 3,
				6 => 6,
				9 => 9,
				12 => 12,
				15 => 15,
				18 => 18,
			),
			'default_value' => TMM_Content_Composer::set_default_value('count', 9),
			'description' => '',
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Auto Slide', 'cardealer'),
			'shortcode_field' => 'autoslide',
			'id' => 'autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('autoslide', 1),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Enable Currency Converter', 'cardealer'),
			'shortcode_field' => 'show_currency_converter',
			'id' => 'show_currency_converter',
			'is_checked' => TMM_Content_Composer::set_default_value('show_currency_converter', 1),
			'description' => 'Show currency converter'
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'checkbox',
			'title' => __('Slide Featured Cars Images on Hover', 'cardealer'),
			'shortcode_field' => 'set_featured_autoslide',
			'id' => 'featured_autoslide',
			'is_checked' => TMM_Content_Composer::set_default_value('set_featured_autoslide', 1),
			'description' => 'Slide images on hover for featured cars'
		));
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Items per Set', 'cardealer'),
			'shortcode_field' => 'items_per_set',
			'id' => 'items_per_set',
			'options' => array(
				'3' => __('3 Items', 'cardealer'),
				'4' => __('4 Items', 'cardealer'),
				'6' => __('6 Items', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('items_per_set', '3'),
			'description' => ''
		));
		?>

		<?php
		global $wpdb;
		$blog_id = get_current_blog_id();

		//get dealer roles
		$dealer_roles = TMM_Cardealer_User::get_user_roles();
		$roles = array();

		foreach ($dealer_roles as $k => $data) {
			$roles[] = $k;
		}

		//get dealers
		$dealers = array();
		$args = array(
			'fields' => array('ID', 'display_name'),
			'meta_query' => array(
				'relation' => 'OR',
			),
		);

		foreach ($roles as $role) {
			$args['meta_query'][] = array(
				'key' => $wpdb->get_blog_prefix( $blog_id ) . 'capabilities',
				'value' => $role,
				'compare' => 'like',
			);
		}

		$dealers_query = new WP_User_Query($args);
		$dealers = $dealers_query->get_results();

		$admin = get_users(
			array(
				'role'=>'Administrator',
				'fields'=>'ID',
			)
		);

		$admin_id = is_array($admin) ? $admin[0] : 1;

		$sort_by_dealer_options = array(
			0 => __('All dealers', 'cardealer'),
			$admin_id => __('Administrator', 'cardealer'),
		);

		if (!empty($dealers)) {
			foreach ($dealers as $data) {
				$sort_by_dealer_options[ $data->ID ] = $data->display_name;
			}
		}

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Sort by Dealer', 'cardealer'),
			'shortcode_field' => 'sort_by_dealer',
			'id' => 'sort_by_dealer',
			'options' => $sort_by_dealer_options,
			'default_value' => TMM_Content_Composer::set_default_value('sort_by_dealer', 0),
			'description' => ''
		));
		?>

		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Apply Filters', 'cardealer'),
			'shortcode_field' => 'filter',
			'id' => '',
			'options' => array(
				'recent' => __('Recent cars', 'cardealer'),
				'featured' => __('Featured cars', 'cardealer'),
				'random' => __('Random cars', 'cardealer'),
			),
			'default_value' => TMM_Content_Composer::set_default_value('filter', 'recent'),
			'description' => ''
		));
		?>

	</div>

</div><!--/ .tmm_shortcode_template->
		  
<!-- --------------------------  PROCESSOR  --------------------------- -->

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('click change keyup', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});
	});
</script>
