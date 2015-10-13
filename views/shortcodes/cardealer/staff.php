<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

$staff = explode('^', $staff);
$cols_count = count($staff);

$col_class = ' col-md-6';
$max_cols = 4;
if($cols_count === 2){
	$col_class = ' col-md-6';
	$max_cols = 2;
}
if($cols_count === 3){
	$col_class = ' col-md-4';
	$max_cols = 3;
}
if($cols_count >= 4){
	$max_cols = 4;
	$col_class = ' col-md-3';
}

$i = 0;
?>

<div class="sales-reps">

	<?php foreach ($staff as $post_id) : ?>

		<?php
		if($i === 0){
			?>

		<div class="row row-no-padding">

			<?php
		}
		?>

		<?php
			$i++;
			$custom = TMM_Staff::get_meta_data($post_id);
		?>

		<div class="item-circled-3<?php echo $col_class; ?>">
			<div class="face-container">
				<div class="face">
					<?php if ( has_post_thumbnail( $post_id ) ) : ?>
						<img
							src="<?php echo TMM_Helper::get_post_featured_image( $post_id, '280*280' ); ?>"
							alt="<?php echo get_the_title($post_id); ?>"/>
					<?php else: ?>
						<img src="<?php echo TMM_THEME_URI ?>/images/avatar.png"
						     alt="<?php echo get_the_title($post_id); ?>"/>
					<?php endif; ?>
				</div>
				<div class="spiner"></div>
			</div>
			<ul class="social-icons">
				<?php if ( ! empty( $custom["facebook"] ) ): ?>
					<li><b><?php _e( 'Facebook', TMM_CC_TEXTDOMAIN ) ?>:</b>&nbsp;<a
							href="<?php echo $custom["facebook"] ?>" title="<?php _e('Facebook', TMM_CC_TEXTDOMAIN); ?>"><i class="icon-facebook-squared"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $custom["twitter"] ) ): ?>
					<li><b><?php _e( 'Twitter', TMM_CC_TEXTDOMAIN ) ?>:</b>&nbsp;<a
							href="<?php echo $custom["twitter"] ?>" title="<?php _e('Twitter', TMM_CC_TEXTDOMAIN); ?>"><i class="icon-twitter-squared"></i></a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $custom["gplus"] ) ): ?>
					<li><b><?php _e( 'Google+', TMM_CC_TEXTDOMAIN ) ?>:</b>&nbsp;<a
							href="<?php echo $custom["gplus"] ?>" title="<?php _e('Google+', TMM_CC_TEXTDOMAIN); ?>"><i class="icon-gplus-squared"></i></a>
					</li>
				<?php endif; ?>
			</ul>
			<div class="item-content">
				<h4><?php echo get_the_title($post_id); ?></h4>

				<?php if (!empty($custom["office_phone"])): ?>

					<b><?php _e('Office', TMM_CC_TEXTDOMAIN) ?>:</b>

					<?php $office_phone_explode = explode(" ", $custom["office_phone"]); ?>

					<?php foreach ($office_phone_explode as $key => $value) : ?>
						<?php if ($key < 2): ?>
							<span><?php echo $office_phone_explode[$key] ?></span>
						<?php else: ?>
							<?php echo $office_phone_explode[$key]; ?>
						<?php endif; ?>
					<?php endforeach; ?>

					<br/>
				<?php endif; ?>

				<?php if (!empty($custom["mobile_phone"])): ?>

					<b><?php _e('Mobile', TMM_CC_TEXTDOMAIN) ?>:</b>

					<?php $mobile_phone_explode = explode(" ", $custom["mobile_phone"]); ?>

					<?php foreach ($mobile_phone_explode as $key => $value) : ?>
						<?php if ($key < 2): ?>
							<span><?php echo $mobile_phone_explode[$key] ?></span>
						<?php else: ?>
							<?php echo $mobile_phone_explode[$key]; ?>
						<?php endif; ?>
					<?php endforeach; ?>

					<br/>
				<?php endif; ?>

				<?php if (!empty($custom["fax"])): ?>

					<b><?php _e('Fax', TMM_CC_TEXTDOMAIN) ?>:</b>

					<?php $fax_explode = explode(" ", $custom["fax"]); ?>

					<?php foreach ($fax_explode as $key => $value) : ?>
						<?php if ($key < 2): ?>
							<span><?php echo $fax_explode[$key] ?></span>
						<?php else: ?>
							<?php echo $fax_explode[$key]; ?>
						<?php endif; ?>
					<?php endforeach; ?>

					<br/>
				<?php endif; ?>

				<?php if ( ! empty( $custom["staff_email"] ) ): ?>
					<b><?php _e( 'Email', TMM_CC_TEXTDOMAIN ) ?>:</b>&nbsp;<a
						href="mailto: <?php echo $custom["staff_email"] ?>"><?php echo $custom["staff_email"] ?></a>
					<br/>
				<?php endif; ?>

				<?php
				$desc = get_post_meta($post_id, 'desc', true);
				if(!empty($desc)){ ?>
					<p><?php echo $desc; ?></p>
				<?php } ?>
			</div>
		</div><!--/ .item-->

		<?php
		if($i === $max_cols){
			$i = 0;
			?>

		</div>
		<!--/ .row-->

			<?php
		}
		?>

	<?php endforeach; ?>

</div><!--/ .sales-reps-->

