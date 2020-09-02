<?php if (!defined('ABSPATH')) exit;

global $wpdb;
$users = array();

if (!isset($user_number)) {
    if ($user_number <= 0) {
        $user_number = 5;
    }
}

$author__in = array();

$args = array(
	'orderby' => 'registered',
	'order' => ($order != 'random' ? $order : 'ASC'),
	'number' => $user_number,
	'paged' => '1'
);

if(isset($dealer_type) && $dealer_type && $dealer_type !== '1'){
	$args['role'] = $dealer_type;
}

if( !empty($specific_dealer) ){
	$specific_dealer = explode(',', $specific_dealer);
	$author__in = array_map('intval', $specific_dealer);
	if(!empty($author__in)){
		$args['include'] = $author__in;
	}
}

$u = get_users($args);

if (!empty($u)) {
	foreach ($u as $value) {
		if ($dealer_type === '1' && !empty($value->caps['administrator'])) {
			continue;
		}

		$users[] = $value;
	}
}

if($order == 'random'){
	shuffle($users);
}
?>

<div class="lc-dealer-list">

	<?php

	// Pagination vars
	$current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
	$users_per_page = 10;

	$args = array(
		'number' => $users_per_page, // How many per page
		'paged' => $current_page // What page to get, starting from 1.
	);

	$u_query = new WP_User_Query( $args );

	$total_users = $u_query->get_total(); // How many users we have in total (beyond the current page)
	$num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need

	if ($current_page == $num_pages) {
		$users_per_page = $total_users % $users_per_page;
	} else {
		if ($total_users < $users_per_page) {
			$users_per_page = $total_users;
		}
	} ?>

    <h3><?php echo sprintf( esc_html__("Page %s of %d", 'tmm_content_composer'), $current_page, $num_pages); ?></h3>
    <p><?php echo sprintf( esc_html__("Displaying %s of %d users", 'tmm_content_composer'), $users_per_page, $total_users); ?></p>

	<?php if ( $u_query->get_results() ) foreach( $u_query->get_results() as $user_data )  {

		if (empty($user_data)) {
			continue;
		}

		$dealers_page = TMM_Helper::get_permalink_by_lang( TMM::get_option('dealers_page', TMM_APP_CARDEALER_PREFIX), array('dealer_id' => $user_data->ID), true );
		$logo_url = TMM_Cardealer_User::get_user_logo_url( $user_data->ID );
		$ud = get_userdata($user_data->ID)

		?>

		<article class="row">

			<div class="col-md-4">
				<?php if($show_dealer_logo && !empty($logo_url)){ ?>

					<div class="image-post">

						<a href="<?php echo esc_url( $dealers_page ); ?>" class="single-image">
							<?php $logoUrl = TMM_Helper::get_image($logo_url, '300*225'); ?>
							<img src="<?php echo esc_url( $logoUrl ); ?>" alt="<?php echo esc_attr( $user_data->display_name ); ?>">
						</a>

					</div>

				<?php } else {
					$text = isset($user_data->nickname) ? $user_data->nickname : $user_data->first_name . ' ' . $user_data->last_name;
					$no_logo_text = str_replace(" ", "+", $text);
					$link_url = 'https://dummyimage.com/300x225/ccc/ffffff.gif&text=' . esc_html( $no_logo_text );
					echo '<img class="aligncenter" src=' . $link_url . '>';
				} ?>

				<i class="icon-cab"></i> <?php echo count_user_posts( $user_data->ID , "car"  ); ?>
			</div>
			<div class="col-md-8">

				<h6 class="title-item">
					<?php if (!empty($user_data->nickname)) { ?>
						<a href="<?php echo esc_url( $dealers_page ); ?>">
							<?php echo esc_html( $user_data->nickname ); ?>
						</a>
					<?php } ?>
				</h6>

				<h6><?php esc_html_e('Contacts', 'tmm_content_composer'); ?>:</h6>

				<div class="row">
					<div class="col-md-8">

						<ul class="list-entry">

							<?php if ($show_address && !empty($ud->address)) { ?>

								<li><i class="icon-warehouse"></i> <?php echo esc_html( $ud->address ) ?></li>

							<?php } ?>

						</ul>

						<?php if (!empty($ud->working_hours)) { ?>

							<br>

							<h6><?php esc_html_e('Working hours', 'tmm_content_composer'); ?>:</h6>

							<?php echo nl2br( esc_html($ud->working_hours) ) ?>

						<?php } ?>



					</div>
					<div class="col-md-4">

						<ul class="list-entry">

							<?php if ($show_phone && !empty($ud->phone)) { ?>

								<li><i class="icon-phone"></i> <?php echo esc_attr( $ud->phone ) ?></li>

							<?php } ?>

							<?php if ($show_mobile && !empty($ud->mobile)) { ?>

								<li><i class="icon-mobile"></i> <?php echo esc_attr( $ud->mobile ) ?></li>

							<?php } ?>

							<?php if ($show_fax && !empty($ud->fax)) { ?>

								<li><i class="icon-fax"></i> <?php echo esc_attr( $ud->fax ) ?></li>

							<?php } ?>

							<li>&nbsp;</li>

							<?php if ($show_email && !empty($ud->user_email)) { ?>

								<li><i class="icon-at"></i> <a href="mailto:<?php echo esc_attr( $ud->user_email ) ?>" rel="nofollow"><?php esc_html_e('E-mail Us', 'tmm_content_composer'); ?></a></li>

							<?php } ?>

							<?php if ($show_site && !empty($ud->user_url)) { ?>

								<li><i class="icon-globe"></i> <a href="<?php echo esc_url( $ud->user_url ) ?>" rel="nofollow" target="_blank"><?php esc_html_e('Website', 'tmm_content_composer'); ?></a></li>

							<?php } ?>

						</ul>

					</div>
				</div>


			</div>


		</article>

	<?php

	}

	?>

	<hr>
	<br>

	<p>
		<?php
		// Previous page
		if ( $current_page > 1 ) {
			echo '<a href="'. add_query_arg(array('paged' => $current_page-1)) .'">' . esc_html__('Previous Page', 'tmm_content_composer') . '</a>';
		}

		// Next page
		if ( $current_page < $num_pages ) {
			echo '<a href="'. add_query_arg(array('paged' => $current_page+1)) .'">' . esc_html__('Next Page', 'tmm_content_composer') . '</a>';
		}
		?>
	</p>


</div>
