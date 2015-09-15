<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$post_id = $content;
$post = get_post($post_id);
$custom = get_post_custom($post_id);
?>
<?php
$thumb_url = TMM_THEME_URI . '/admin/images/team-member.png';
if (has_post_thumbnail($post_id)) {
	$thumb_url = TMM_Helper::get_post_featured_image($post_id, '420*470');
}
?>
<?php if ($type == 'half'): ?>
<div class="eight columns">
	<img src="<?php echo $thumb_url ?>" alt="" /><br /><br />
	<h3 class="section-title"><?php echo $post->post_title ?></h3>
	<p><?php echo get_post_field('post_excerpt', $post_id); ?></p>
	<ul class="social-icons">
		<?php if (!empty($custom["twitter"][0])): ?>
			<li class="twitter"><a target="_blank" href="<?php echo $custom["twitter"][0] ?>"><span>Twitter</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["facebook"][0])): ?>
			<li class="facebook"><a target="_blank" href="<?php echo $custom["facebook"][0] ?>"><span>Facebook</span></a></li>
		<?php endif; ?>	
		<?php if (!empty($custom["dribble"][0])): ?>
			<li class="dribble"><a target="_blank" href="<?php echo $custom["dribble"][0] ?>"><span>Dribble</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["vimeo"][0])): ?>
			<li class="vimeo"><a target="_blank" href="<?php echo $custom["vimeo"][0] ?>"><span>Vimeo</span></a></li>
		<?php endif; ?>            
		<?php if (!empty($custom["youtube"][0])): ?>
			<li class="youtube"><a target="_blank" href="<?php echo $custom["youtube"][0] ?>"><span>Youtube</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["pinterest"][0])): ?>
			<li class="pinterest"><a target="_blank" href="<?php echo $custom["pinterest"][0] ?>"><span>Pinterest</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["instagram"][0])): ?>
			<li class="instagram"><a target="_blank" href="<?php echo $custom["instagram"][0] ?>"><span>Instagram</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["linkedin"][0])): ?>
			<li class="linkedin"><a target="_blank" href="<?php echo $custom["linkedin"][0] ?>"><span>Linkedin</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["flickr"][0])): ?>
			<li class="flickr"><a target="_blank" href="<?php echo $custom["flickr"][0] ?>"><span>Flickr</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["gplus"][0])): ?>
			<li class="gplus"><a target="_blank" href="<?php echo $custom["gplus"][0] ?>"><span>Google+</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["behance"][0])): ?>
			<li class="behance"><a target="_blank" href="<?php echo $custom["behance"][0] ?>"><span>Behance</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["rss"][0])): ?>
			<li class="rss"><a target="_blank" href="<?php echo $custom["rss"][0] ?>"><span>Rss</span></a></li>
		<?php endif; ?>		
	</ul><!--/ .social-icons-->
</div><!--/ .columns-->
<?php else: ?>
<div class="sixteen columns">
	<img src="<?php echo $thumb_url ?>" alt="" /><br /><br />
	<h3 class="section-title"><?php echo $post->post_title ?></h3>
	<p><?php echo get_post_field('post_excerpt', $post_id); ?></p>
	<ul class="social-icons">
		<?php if (!empty($custom["twitter"][0])): ?>
			<li class="twitter"><a target="_blank" href="<?php echo $custom["twitter"][0] ?>">Twitter</a></li>
		<?php endif; ?>
		<?php if (!empty($custom["facebook"][0])): ?>
			<li class="facebook"><a target="_blank" href="<?php echo $custom["facebook"][0] ?>">Facebook</a></li>
		<?php endif; ?>	
		<?php if (!empty($custom["dribble"][0])): ?>
			<li class="dribble"><a target="_blank" href="<?php echo $custom["dribble"][0] ?>">Dribble</a></li>
		<?php endif; ?>
		<?php if (!empty($custom["vimeo"][0])): ?>
			<li class="vimeo"><a target="_blank" href="<?php echo $custom["vimeo"][0] ?>">Vimeo</a></li>
		<?php endif; ?>        
        <?php if (!empty($custom["youtube"][0])): ?>
			<li class="youtube"><a target="_blank" href="<?php echo $custom["youtube"][0] ?>"><span>Youtube</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["pinterest"][0])): ?>
			<li class="pinterest"><a target="_blank" href="<?php echo $custom["pinterest"][0] ?>"><span>Pinterest</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["instagram"][0])): ?>
			<li class="instagram"><a target="_blank" href="<?php echo $custom["instagram"][0] ?>"><span>Instagram</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["linkedin"][0])): ?>
			<li class="linkedin"><a target="_blank" href="<?php echo $custom["linkedin"][0] ?>"><span>Linkedin</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["flickr"][0])): ?>
			<li class="flickr"><a target="_blank" href="<?php echo $custom["flickr"][0] ?>"><span>Flickr</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["gplus"][0])): ?>
			<li class="gplus"><a target="_blank" href="<?php echo $custom["gplus"][0] ?>"><span>Google+</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["behance"][0])): ?>
			<li class="behance"><a target="_blank" href="<?php echo $custom["behance"][0] ?>"><span>Behance</span></a></li>
		<?php endif; ?>
		<?php if (!empty($custom["rss"][0])): ?>
			<li class="rss"><a target="_blank" href="<?php echo $custom["rss"][0] ?>"><span>Rss</span></a></li>
		<?php endif; ?>
	</ul><!--/ .social-icons-->
</div><!--/ .columns-->
<?php endif; ?>