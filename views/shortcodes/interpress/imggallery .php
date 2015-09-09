<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php

tmm_enqueue_script('gallery3d');

if (empty($effect)) {
	$effect = 'fxRotateSoftly';
}

$images = explode('^', $images);

$galleries = array();

foreach ($images as $key=>$info) {
	if(!empty($info)){
		$galleries[]= array(
			'id' => $key,
			'url' => $info
		);
	}
}
?>

<section id="gallery3d" class="<?php echo $effect ?>">

	<div class="grid-wrap">

		<div class="grid">

			<?php foreach ($galleries as $gallery ): ?>
				<figure id="image-<?php echo esc_attr($gallery['id']) ?>">
					<a class="post-image plus-link" href="#">
						<img src="<?php echo esc_url(TMM_Helper::get_image($gallery['url'], '400*300')) ?>" alt=""/>
					</a>
				</figure>
			<?php endforeach; ?>

		</div><!--/ .grid-->

	</div><!-- /grid-wrap -->

	<div class="content-grid">

		<?php foreach($galleries as $gallery): ?>

			<div class="grid-item">
				<div class="extra-cell">
					<img class="dummy-img" src="<?php echo esc_url($gallery['url']) ?>" />
				</div>
			</div><!--/ .grid-item-->

		<?php endforeach; ?>

		<span class="loading"></span>
		<span class="close-content"></span>

	</div><!--/ .content-grid-->

</section><!--/ #gallery3d-->