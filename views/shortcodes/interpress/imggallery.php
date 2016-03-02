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

$uniqid = uniqid();
?>
	<div class="grid-wrap lc-grid-gallery">

		<div class="grid-items grid">
			<?php foreach ($galleries as $gallery){ ?>
				<figure><a class="post-image plus-link" href="#"><img src="<?php echo esc_url(TMM_Content_Composer::resize_image($gallery['url'], '400*300')) ?>" alt="" /></a></figure>
			<?php } ?>
		</div><!--/ .grid-items-->

		<div class="lc-popupGallery">
			<div class="popupGallery">
				<ul>
					<?php foreach ($galleries as $gallery) { ?>
						<li><img src="<?php echo esc_url($gallery['url']) ?>" alt=""/></li>
					<?php } ?>
				</ul>
			</div><!--/ .popupGallery-->
		</div><!--/ .lc-popupGallery-->

	</div><!-- /grid-wrap -->