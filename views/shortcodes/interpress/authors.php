<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if ($userid=='all'){
	$args = array(
		'fields' => array('ID', 'user_nicename'),
		'who' => 'author'
		);
	$users = get_users($args);
	if (!empty($users)){
		?>
		<ul class="lc-authors-list">
			<?php
			foreach ($users as $user) {
				$user = get_userdata($user->ID);
				$users_array[$user->ID] = $user->display_name;
				if (is_object($user)){
					?>
					<li>
						<div class="author-avatar">
							<?php echo get_avatar($user->user_email, 130); ?>
						</div><!--/ .author-avatar-->

						<div class="author-description">
							<h5><?php echo esc_html($user->display_name) ?></h5>

							<p>
								<?php echo stripslashes($user->description); ?>
							</p>

							<?php TMM_USERS::my_author_social_links($user->ID); ?>

						</div><!--/ .author-description-->

					</li>
				<?php
				}
			}
			?>
		</ul>

		<?
	}

} else {

	$user = get_userdata($userid); ?>

		<?php if (is_object($user)){ ?>

			<ul class="lc-authors-list">

				<li>

					<div class="author-avatar">
						<?php echo get_avatar($user->user_email, 130); ?>
					</div><!--/ .author-avatar-->

					<div class="author-description">
						<h5><?php echo $user->display_name ?></h5>

						<p>
							<?php echo stripslashes($user->description); ?>
						</p>

						<?php TMM_USERS::my_author_social_links($userid); ?>

					</div><!--/ .author-description-->

				</li>
			</ul>

		<?php } ?>
	<?php
}