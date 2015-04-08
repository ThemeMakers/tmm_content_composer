<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
$archive_list = array();
switch($archives_type){
	case 'latest_posts':
		$count = (empty($count)) ? '-1' : $count;
		$args = array(
			'numberposts'=>$count,
			'post_type' => 'post'
			);
		$posts = get_posts($args);

		foreach($posts as $key =>$post){
			$archive_list[$key]['href'] = get_the_permalink($post->ID);
			$archive_list[$key]['title'] = $post->post_title;

		}
		if (!empty($archive_list)){
			?>
			<ul class="archive-list">
				<?php
				foreach ($archive_list as $list){
					?>
					<li><a href="<?php echo esc_url($list['href']); ?>"><?php echo esc_html($list['title']); ?></a></li>
				<?
				}
				?>
			</ul><!--/ .archive-list-->
		<?php
		}
		break;
	case 'archives_month':
	case 'archives_year':
	case 'archives_day':
		$type = 'monthly';
		switch($archives_type){
			case 'archives_year':
				$type = 'yearly';
				break;
			case 'archives_day':
				$type = 'daily';
				break;
		}
		$count = (empty($count)) ? '' : $count;
		$args = array(
			'type' => $type,
			'limit' => $count,
			'format' => 'html',
			'before' => '',
			'after' => '',
			'show_post_count' => false,
			'echo' => false,
			'order' => 'DESC'
		);

		$archives = wp_get_archives($args);
		if (!empty($archives)){
			?>
			<ul class="archive-list">
				<?php
				echo $archives;
				?>
			</ul><!--/ .archive-list-->
			<?php
		}

		break;
	case 'archives_subject':
		$count = (empty($count)) ? null : $count;
		$args = array(
			'show_option_all'    => '',
			'orderby'            => 'name',
			'order'              => 'ASC',
			'title_li'           => '',
			'show_option_none'   => '',
			'number'             => $count,
			'echo'               => false,
			'taxonomy'           => 'category'

		);
		$archives = wp_list_categories( $args );
		if (!empty($archives)){
			?>
			<ul class="archive-list">
				<?php
				echo $archives;
				?>
			</ul><!--/ .archive-list-->
		<?php
		}

		break;
}