<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_script('tmm_gallery3d', TMM_CC_URL . 'js/plugins/min/gallery3d.min.js');

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

	<section id="<?php echo $id; ?>" class="wrap_gallery3d <?php echo $effect ?>">

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

	<script>
		jQuery(function() {

			var config =  {
				directionNav: true,
					showSelectFx: false,
					defaultFx: 'fxRotateSoftly',
					selectFxOptions: {
					fxCorner: 'Corner scale',
						fxVScale: 'Vertical scale',
						fxFall: 'Fall',
						fxFPulse: 'Forward pulse',
						fxRPulse: 'Rotate pulse',
						fxHearbeat: 'Hearbeat',
						fxCoverflow: 'Coverflow',
						fxRotateSoftly: 'Rotate me softly',
						fxDeal: 'Deal \'em',
						fxFerris: 'Ferris wheel',
						fxShinkansen: 'Shinkansen',
						fxSnake: 'Snake',
						fxVacuum: 'Vacuum'
				}
			}

			if (jQuery('#<?php echo $id ?>').length) {
				new gallery3d(jQuery('#<?php echo $id ?>'), config);
			}
		});

	</script>