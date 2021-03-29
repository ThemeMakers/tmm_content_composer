<?php if (!defined('ABSPATH')) exit;

global $wpdb;
$users = array();

if (!isset($user_number)) {
    $user_number = 5;
} else {
    if ($user_number <= 0) {
        $user_number = 5;
    }
}

$order = isset($order) ? $order : 'ASC';

echo var_dump($order);

if($order == 'random'){
    shuffle($users);
}

$author__in = array();
?>

<div class="lc-dealer-list">

	<?php

	// Pagination vars
	$current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
    $users_per_page = isset($users_per_page) ? $users_per_page : 10;
    $filter_by_key_region = isset($filter_by_key_region) ? $filter_by_key_region : '';
    $enable_location_filter = isset($enable_location_filter) ? $enable_location_filter : 0;

	$args = array(
        'orderby' => 'registered',
        'order' => $order,
		'number' => $users_per_page, // How many per page
		'paged' => $current_page, // What page to get, starting from 1.
	);

    if ($enable_location_filter) {
        $args['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key'     => 'address_region',
                'value'   => $filter_by_key_region,
                'compare' => 'LIKE'
            ),
            array(
                'key'     => 'address_region',
                'value'   => $filter_by_key_region,
                'compare' => '='
            )
        );
    }

    if (isset($dealer_type) && $dealer_type && $dealer_type !== '1') {
        $args['role'] = $dealer_type;
    }

    if (!empty($specific_dealer)) {
        $specific_dealer = explode(',', $specific_dealer);
        $author__in = array_map('intval', $specific_dealer);
        if (!empty($author__in)) {
            $args['include'] = $author__in;
        }
    }

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

	<?php if ( ! empty( $u_query->get_results() ) )

	    foreach( $u_query->get_results() as $user_data )  {

            if ($dealer_type === '1' && !empty($user_data->caps['administrator'])) {
                continue;
            }

            $users[] = $user_data;

		$dealers_page = TMM_Helper::get_permalink_by_lang( TMM::get_option('dealers_page', TMM_APP_CARDEALER_PREFIX), array('dealer_id' => $user_data->ID), true );
		$logo_url = TMM_Cardealer_User::get_user_logo_url( $user_data->ID );
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

                <?php if ($show_dealer_bio && !empty($user_data->description)) { ?>
                    <p>
                        <?php
                        $dealer_bio_symbols_count = isset($dealer_bio_symbols_count) ? $dealer_bio_symbols_count : 300;
                        $description = strlen($user_data->description) > $dealer_bio_symbols_count ? substr( $user_data->description, 0, $dealer_bio_symbols_count) . '...' : $user_data->description;
                        echo esc_html( $description ); ?>
                    </p>
                <?php } ?>

				<h6><?php esc_html_e('Contacts', 'tmm_content_composer'); ?>:</h6>

				<div class="row">
					<div class="col-md-8">

						<ul class="list-entry">

                            <?php if ($show_address && !empty($user_data->address_company || $user_data->address_line_01 || $user_data->address_line_02 || $user_data->address_city || $user_data->address_zip || $user_data->address_region || $user_data->address_country)): ?>
                                <li><i class="icon-warehouse"></i>
                                    <?php $address = array();

                                        if(!empty($user_data->address_company)) {
                                            $address['address_company'] = $user_data->address_company;
                                        }

                                        if(!empty($user_data->address_line_01)) {
                                            $address['address_line_01'] = $user_data->address_line_01;
                                        }

                                        if(!empty($user_data->address_line_02)) {
                                            $address['address_line_02'] = $user_data->address_line_02;
                                        }

                                        if(!empty($user_data->address_city)) {
                                            $address['address_city'] = $user_data->address_city;
                                        }

                                        if(!empty($user_data->address_zip)) {
                                            $address['address_zip'] = $user_data->address_zip;
                                        }

                                        if(!empty($user_data->address_region)) {
                                            $address['address_region'] = $user_data->address_region;
                                        }

                                        if(!empty($user_data->address_country)) {
                                            $address['address_country'] = $user_data->address_country;
                                        }

                                        echo esc_html(implode(", ",$address)) ?></li>
                            <?php endif; ?>

						</ul>

						<?php if ($show_working_hours && !empty($user_data->working_hours)) { ?>

							<br>

							<h6><?php esc_html_e('Working hours', 'tmm_content_composer'); ?>:</h6>

							<?php echo nl2br( esc_html($user_data->working_hours) ) ?>

						<?php } ?>



					</div>
					<div class="col-md-4">

						<ul class="list-entry">

							<?php if ($show_phone && !empty($user_data->phone)) { ?>

								<li><i class="icon-phone"></i> <?php echo esc_attr( $user_data->phone ) ?></li>

							<?php } ?>

							<?php if ($show_mobile && !empty($user_data->mobile)) { ?>

								<li><i class="icon-mobile"></i> <?php echo esc_attr( $user_data->mobile ) ?></li>

							<?php } ?>

							<?php if ($show_fax && !empty($user_data->fax)) { ?>

								<li><i class="icon-fax"></i> <?php echo esc_attr( $user_data->fax ) ?></li>

							<?php } ?>

							<li>&nbsp;</li>

							<?php if ($show_email && !empty($user_data->user_email)) { ?>

								<li><i class="icon-at"></i> <a href="mailto:<?php echo esc_attr( $user_data->user_email ) ?>" rel="nofollow"><?php esc_html_e('E-mail Us', 'tmm_content_composer'); ?></a></li>

							<?php } ?>

							<?php if ($show_site && !empty($user_data->user_url)) { ?>

								<li><i class="icon-globe"></i> <a href="<?php echo esc_url( $user_data->user_url ) ?>" rel="nofollow" target="_blank"><?php esc_html_e('Website', 'tmm_content_composer'); ?></a></li>

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
