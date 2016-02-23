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

							<?php if (!empty($user->user_url)){ ?>
								<p>
									<a href="<?php echo esc_url($user->user_url); ?>" target="_blank"><?php echo $user->user_url; ?></a>
								</p>
							<?php } ?>

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

	$user = get_userdata($userid);

	?>

	<?php if (is_object($user)) { ?>

		<ul class="lc-authors-list">

			<li>

				<div class="author-avatar">
					<?php echo get_avatar($user->user_email, 130); ?>
				</div>
				<!--/ .author-avatar-->

				<div class="author-description">
					<h5><?php echo $user->display_name ?></h5>

					<p>
						<?php echo stripslashes($user->description); ?>
					</p>

					<?php if (!empty($user->user_url)) { ?>
						<p>
							<a href="<?php echo esc_url($user->user_url); ?>"
							   target="_blank"><?php echo $user->user_url; ?></a>
						</p>
					<?php } ?>

					<?php TMM_USERS::my_author_social_links($userid); ?>

				</div>
				<!--/ .author-description-->

			</li>
		</ul>

	<?php } ?>

	<?php if (isset($display_posts) && $display_posts) {
		?>
		<section class="section padding-off">

			<?php
			global $post;
			$path = $path = 'content/blog-medium/content';
			$user_query = array(
				'orderby' => $orderby,
				'order' => $order,
				'post_status' => array('publish'),
				'posts_per_page' => 3,
				'author' => $userid
			);

			$user_query['posts_per_page'] = (!empty($posts_per_page)) ? $posts_per_page : '-1';
			$user_query['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;

			global $wp_query;
			$original_query = $wp_query;
			$wp_query = new WP_Query($user_query);
			?>

			<?php if (have_posts()) { ?>

				<div class="post-list">

					<?php while (have_posts()) {
						the_post(); ?>

						<article class="post-entry">
							<?php get_template_part($path, 'content'); ?>
						</article>

					<?php } ?>

				</div><!--/ .post-list-->

			<?php } ?>

		</section><!--/ .section-->

	<?php
		if ($pagination == 'yes') {
			get_template_part('content', 'pagenavi');
		}
		$wp_query = $original_query;
		wp_reset_postdata();
	}
}