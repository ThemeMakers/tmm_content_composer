<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$staff = explode('^', $staff);
$layout = 2;

if (!empty($staff)): ?>

	<?php if ($layout == 1): ?>

		<section class="team-member type-1 clearfix"><?php foreach ($staff as $post_id) : ?><article class="team-item">
					<?php if (has_post_thumbnail($post_id)) : ?>
						<img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post_id, '160*160') ?>" alt="<?php echo get_the_title($post_id); ?>" />
					<?php endif; ?>
					<h5 class="team-title"><?php echo get_the_title($post_id); ?></h5>
				</article><!--/ .team-item-->
			<?php endforeach; ?>
		</section><!--/ .team-member-->

	<?php endif; ?>

	<?php if ($layout == 2): ?>
		<section class="team-member type-2 clearfix row_container">
			<?php foreach ($staff as $post_id) : ?><?php $custom = TMM_Staff::get_meta_data($post_id); ?><article class="four columns">
				<?php if (has_post_thumbnail($post_id)) : ?>
						<img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post_id, '220*240') ?>" alt="<?php echo get_the_title($post_id); ?>" />
					<?php endif; ?>
					<hgroup>
						<h4 class="team-title"><?php echo get_the_title($post_id); ?></h4>
						<h6 class="team-position"><?php
							$post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
							if (!empty($post_categories)) {
								foreach ($post_categories as $key => $value) {
									if ($key > 0) {
										echo ' / ';
									}
									echo $value;
								}
							}
							?>
						</h6>
					</hgroup>
					<p><?php echo get_post($post_id)->post_excerpt; ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["email"])): ?>
							<li><a class="mailus" target="_blank" href="mailto:<?php echo $custom["email"] ?>">Email <span>Email</span></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["twitter"])): ?>
							<li><a class="twitter" target="_blank" href="<?php echo $custom["twitter"] ?>">Twitter <span>Twitter</span></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li><a class="facebook" target="_blank" href="<?php echo $custom["facebook"] ?>">Facebook <span>Facebook</span></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribble"])): ?>
							<li><a class="dribbble" target="_blank" href="<?php echo $custom["dribble"] ?>">Dribbble <span>Dribble</span></a></li>
						<?php endif; ?>
						<?php if (!empty($custom["skype"])): ?>
							<li><a class="linkedin" target="_blank" href="<?php echo $custom["skype"] ?>">Linked <span>Linked</span></a></li>
						<?php endif; ?>
					</ul><!--/ .social-icons-->
				</article><?php endforeach; ?>
		</section><!--/ .team-member-->

	<?php endif; ?>

	<?php if ($layout == 3): ?>

		<section class="team-member type-3 clearfix">

			<?php foreach ($staff as $post_id) : ?>
				<?php $custom = TMM_Staff::get_meta_data($post_id); ?><article class="one-third column">

					<?php if (has_post_thumbnail($post_id)) : ?>
						<img class="team-image" src="<?php echo TMM_Helper::get_post_featured_image($post_id, '300*310') ?>" alt="<?php echo get_the_title($post_id); ?>" />
					<?php endif; ?>
					<hgroup>
						<h4 class="team-title"><?php echo get_the_title($post_id); ?></h4>
						<h6 class="team-position"><?php
							$post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
							if (!empty($post_categories)) {
								foreach ($post_categories as $key => $value) {
									if ($key > 0) {
										echo ' / ';
									}
									echo $value;
								}
							}
							?>
						</h6>
					</hgroup>
					<p><?php echo get_post($post_id)->post_excerpt; ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["email"])): ?>
							<li class="email"><a target="_blank" href="mailto:<?php echo $custom["email"] ?>">Email</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["twitter"])): ?>
							<li class="twitter"><a target="_blank" href="<?php echo $custom["twitter"] ?>">Twitter</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li class="facebook"><a target="_blank" href="<?php echo $custom["facebook"] ?>">Facebook</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribble"])): ?>
							<li class="dribbble"><a target="_blank" href="<?php echo $custom["dribble"] ?>">Dribbble</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["skype"])): ?>
							<li class="skype"><a target="_blank" href="<?php echo $custom["skype"] ?>">Linked</a></li>
							<?php endif; ?>
					</ul></article><?php endforeach; ?>
		</section><!--/ .team-member-->

	<?php endif; ?>

<?php endif; ?>

