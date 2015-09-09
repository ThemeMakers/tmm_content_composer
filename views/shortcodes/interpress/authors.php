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
				<ul class="our-authors-list">
					<?php
					foreach ($users as $user) {
						$user = get_userdata($user->ID);
						$users_array[$user->ID] = $user->display_name;
						if (is_object($user)){
							?>
							<li>
								<div class="our-author-image">
									<?php echo get_avatar($user->user_email, 130); ?>
								</div><!--/ .author-image-->

								<div class="our-author-entry">
									<h5 class="our-author-name"><?php echo esc_html($user->display_name) ?></h5>

									<p>
										<?php echo stripslashes($user->description); ?>
									</p>

									<?php TMM_USERS::my_author_social_links($user->ID); ?>

								</div><!--/ .our-author-entry-->

							</li>
						<?php
						}
					}
					?>
				</ul>

				<?
			}

		}else{

			$user = get_userdata($userid); ?>

				<?php if (is_object($user)){ ?>

				<section class="section section-content padding-off">

					<h5 class="simple-title"><?php _e('About The Author', TMM_CC_TEXTDOMAIN) ?></h5>

					<div class="author-entry clearfix">

						<div class="our-author-image">
							<?php echo get_avatar($user->user_email, 130); ?>
						</div><!--/ .author-image-->

						<div class="our-author-entry">
							<h5 class="our-author-name"><?php echo $user->display_name ?></h5>

							<p>
								<?php echo stripslashes($user->description); ?>
							</p>

							<?php TMM_USERS::my_author_social_links($userid); ?>

						</div><!--/ .our-author-entry-->

					</div><!--/ .author-entry-->

					<?php } ?>

				</section><!--/ .section-->

				<section class="section padding-off">

					<?php
					global $post;
					$path = $path = 'content/blog-medium/content';
					$user_query = array(
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

					<?php if (have_posts()){  ?>

					<div class="post-list">

						<?php while (have_posts()) { the_post(); ?>

							<article class="post-entry">
								<?php get_template_part( $path, 'content' ); ?>
							</article>

						<?php } ?>

					</div><!--/ .post-list-->

				</section><!--/ .section-->
			<?php
		}

		if ($pagination == 'yes') {
			get_template_part('content', 'pagenavi');
		}
			$wp_query = $original_query;
			wp_reset_postdata();

	}