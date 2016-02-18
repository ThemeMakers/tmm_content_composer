<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$staff = explode('^', $staff);
$id = '';
?>

<section class="row accHorizontal">

	<?php foreach ($staff as $post_id){ ?><?php

	if (function_exists('icl_object_id')){
		$post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);
	}
		$id = base_convert(microtime(), 10, 36);

		$custom = TMM_Staff::get_meta_data($post_id); ?>

		<aside class="accHorizontal__item <?php if ($animation) echo $animation ?>">
			<input type="checkbox" class="state" id="acc-<?php echo $id ?>" />
			<label class="backdrop" for="acc-<?php echo $id ?>"><i class="fa fa-times"></i></label>
			<article class="acc_cBox">
				<div class="acc_cImg">
					<img src="<?php echo TMM_Helper::get_post_featured_image($post_id, '252*270') ?>" alt="" />
					<header>
						<h3><?php echo get_the_title($post_id); ?></h3>
						<h5><?php
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
						</h5>
					</header>
				</div>
				<div class="acc_cCont">
					<p><?php echo substr(get_post($post_id)->post_excerpt, 0, 468); ?></p>
					<ul class="social-icons">
						<?php if (!empty($custom["twitter"])): ?>
							<li class="twitter"><a target="_blank" href="<?php echo $custom["twitter"] ?>"><i class="icon-twitter"></i>Twitter</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["facebook"])): ?>
							<li class="facebook"><a target="_blank" href="<?php echo $custom["facebook"] ?>"><i class="icon-facebook"></i>Facebook</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["linkedin"])): ?>
							<li class="linkedin"><a target="_blank" href="<?php echo $custom["linkedin"] ?>"><i class="icon-linkedin"></i>LinkedIn</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["dribbble"])): ?>
							<li class="dribbble"><a target="_blank" href="<?php echo $custom["dribbble"] ?>"><i class="icon-dribbble"></i>Dribbble</a></li>
						<?php endif; ?>
						<?php if (!empty($custom["instagram"])): ?>
							<li class="instagram"><a target="_blank" href="<?php echo $custom["instagram"] ?>"><i class="icon-instagram"></i>Instagram</a></li>
						<?php endif; ?>
					</ul><!--/ .social-icons-->
				</div>
			</article>
		</aside>

	<?php

	} ?>
	
</section><!--/ .accHorizontal-->


