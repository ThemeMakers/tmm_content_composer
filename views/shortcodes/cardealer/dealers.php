<?php
if (!defined('ABSPATH')) exit;

global $wpdb;
$users = array();

if ($user_number <= 0) {
	$user_number = 5;
}

$author__in = array();

$args = array(
	'orderby' => 'registered',
	'order' => ($order != 'random' ? $order : 'ASC'),
	'number' => $user_number,
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

<style type="text/css">
	.tmm-shortcode-dealers .image-post {
		float: left;
		width: 100px;
		margin-right: 10px;
		margin-bottom: 10px;
	}

	.tmm-shortcode-dealers .image-post > a {
		margin-bottom: 0;
	}

	.tmm-shortcode-dealers .title-item {
		word-break: break-word;
	}

	.tmm-shortcode-dealers .dealer-bio {
		font-size: 14px;
		margin-bottom: 10px;
	}

	.tmm-shortcode-dealers .list-entry li {
		font-size: 14px;
		line-height: 28px;
	}

	.tmm-shortcode-dealers .dealer-map {
		margin-top: 10px;
	}

	.tmm-shortcode-dealers .dealer-map img {
		max-width: 100%;
	}

</style>

<div id="change-items" class="row item-grid tmm-shortcode-dealers">

	<?php

	foreach ($users as $user_data) {

		if (empty($user_data)) {
			continue;
		}

		$dealers_page = TMM_Helper::get_permalink_by_lang( TMM::get_option('dealers_page', TMM_APP_CARDEALER_PREFIX), array('dealer_id' => $user_data->ID), true );
		$logo_url = TMM_Cardealer_User::get_user_logo_url( $user_data->ID );
		$ud = get_userdata($user_data->ID)

		?>

		<article class="col-md-4">

			<?php if($show_dealer_logo && !empty($logo_url)){ ?>

			<div class="image-post">

				<a href="<?php echo $dealers_page; ?>" class="single-image">

					<img src="<?php echo $logo_url; ?>" alt="<?php echo $user_data->display_name; ?>">

				</a>

			</div>

			<?php } ?>

			<h6 class="title-item">

				<a href="<?php echo $dealers_page; ?>">
					<?php echo $user_data->display_name; ?>
				</a>

			</h6>

			<?php
			if ($show_dealer_bio) {
				$bio = $ud->description;
				if($dealer_bio_symbols_count > 0){
					$bio_after = strlen($bio) > (int) $dealer_bio_symbols_count ? ' ...' : '';
					$bio = substr($bio, 0, (int) $dealer_bio_symbols_count) . $bio_after;
				}
				?>

				<div class="dealer-bio"><?php echo $bio ?></div>

			<?php } ?>

			<div class="clear"></div>

			<ul class="list-entry">

				<?php if ($show_phone && !empty($ud->phone)) { ?>

					<li><i class="icon-phone-2"></i> <?php echo $ud->phone ?></li>

				<?php } ?>

				<?php if ($show_mobile && !empty($ud->mobile)) { ?>

					<li><i class="icon-mobile-alt"></i> <?php echo $ud->mobile ?></li>

				<?php } ?>

				<?php if ($show_fax && !empty($ud->fax)) { ?>

					<li><i class="icon-print-3"></i> <?php echo $ud->fax ?></li>

				<?php } ?>

				<?php if ($show_email && !empty($ud->user_email)) { ?>

					<li><i class="icon-mail"></i> <a href="mailto:<?php echo $ud->user_email ?>" rel="nofollow"><?php echo $ud->user_email ?></a></li>

				<?php } ?>

				<?php if ($show_skype && !empty($ud->skype)) { ?>

					<li><i class="icon-skype"></i> <?php echo $ud->skype ?></li>

				<?php } ?>

				<?php if ($show_site && !empty($ud->user_url)) { ?>

					<li><i class="icon-link-1"></i> <a href="<?php echo $ud->user_url ?>" rel="nofollow" target="_blank"><?php echo $ud->user_url ?></a></li>

				<?php } ?>

				<?php if ($show_address && !empty($ud->address)) { ?>

					<li><i class="icon-address"></i> <?php echo $ud->address ?></li>

				<?php } ?>

				<?php
				if ($show_map && !empty($ud->address)) {

					$map_data = TMM_Cardealer_User::get_user_map_data($user_data->ID);

					if (!empty($map_data['map_latitude']) && $map_data['show_map_to_visitors']) {
						?>

						<p class="dealer-map">
							<?php
							if (shortcode_exists('google_map')) {
								echo do_shortcode('[google_map height="200" width="300" mode="image" location_mode="coordinates" latitude="' . $map_data['map_latitude'] . '" longitude="' . $map_data['map_longitude'] . '" address="" zoom="15" enable_scrollwheel="0" maptype="ROADMAP" enable_marker="1" enable_popup="0" marker_is_draggable="0"]');
							}
							?>
						</p>

						<?php
					}
					?>

				<?php } ?>

			</ul>

		</article>

	<?php

	}

	?>

</div>
