<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php


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

$id = 'gall_'.uniqid();
?>
	<div class="grid-wrap">

		<div class="grid">

			<?php foreach ($galleries as $gallery ): ?>
				<figure id="image-<?php echo esc_attr($gallery['id']) ?>">
					<a class="post-image plus-link" href="#">
						<img src="<?php echo esc_url(TMM_Content_Composer::resize_image($gallery['url'], '400*300')) ?>" alt=""/>
					</a>
				</figure>
			<?php endforeach; ?>

		</div><!--/ .grid-->

	</div><!-- /grid-wrap -->