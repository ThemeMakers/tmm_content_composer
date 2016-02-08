<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		$transition_effects = array(
			'fxCorner'  => 'Corner scale',
			'fxVScale' => 'Vertical scale',
			'fxFall' => 'Fall',
			'fxFPulse' => 'Fall',
			'fxFall' => 'Forward pulse',
			'fxRPulse' => 'Rotate pulse',
			'fxHearbeat' => 'Hearbeat',
			'fxCoverflow' => 'Coverflow',
			'fxRotateSoftly' => 'Rotate me softly',
			'fxDeal' => 'Deal \'em',
			'fxFerris' => 'Ferris wheel',
			'fxShinkansen' => 'Shinkansen',
			'fxSnake' => 'Snake',
			'fxVacuum' => 'Vacuum',
		);

		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('Transition Effect', 'tmm_content_composer'),
			'shortcode_field' => 'effect',
			'id' => 'transition_effect',
			'options' => $transition_effects,
			'default_value' => TMM_Content_Composer::set_default_value('effect', 'fxRotateSoftly'),
			'description' => ''
		));
		?>

		<br/>

		<div id="wp-content-media-buttons" class="wp-media-buttons">
			<a href="#" id="tmm_insert_media" class="button add_media" title="Add Media">
				<?php _e('Upload Images', 'tmm_content_composer'); ?>
			</a>
		</div>

	</div>

	<div class="clear"></div>
	
	<div>
		
		<br>
	
		<ul class="tmm-gallery-items">

		<?php
		$items = array();

		if (isset($_REQUEST["shortcode_mode_edit"])) {
			$images = explode('^', $_REQUEST["shortcode_mode_edit"]['images']);
		}
		if (!empty($images))
			$items = $images;

		if (!empty($items)) {
			foreach ($items as $item) {
				if (!empty($item)){
				?>

					<li class="tmm-gallery-item">
						<img class="tmm-gallery-item-thumb" src="<?php echo TMM_Helper::resize_image($item, "280*200") ?>" alt="" />
						<input type="hidden" value="<?php echo $item ?>" class="tmm-gallery-item-val" name="tmm_gallery_item[]">
						<a href="#" class="tmm-delete-gallery-item" title="<?php _e("Delete Item", 'tmm_content_composer') ?>"></a>
					</li>

				<?php
				}
			}
		}
		?>

		</ul>

		<ul class="tmm-gallery-item-template hide">
			<li class="tmm-gallery-item ui-sortable-handle">
				<div class="tmm-gallery-item-thumb" style="width: 280px; height: 200px; background-size: cover;"></div>
				<input type="hidden" value="" class="tmm-gallery-item-val">
				<a href="#" class="tmm-delete-gallery-item" title="<?php _e("Delete Item", 'tmm_content_composer') ?>"></a>
			</li>
		</ul>
		
	</div>

</div>

<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function($) {
		tmm_ext_shortcodes.gallery_changer(shortcode_name);

		var wrapper = $('.tmm-gallery-items');
		wrapper.sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.gallery_changer(shortcode_name);
			}
		});

		$('#tmm_insert_media').on('click', function() {
			var template = $('.tmm-gallery-item-template>.tmm-gallery-item'),
				frame = wp.media({
					title: wp.media.view.l10n.addMedia,
					multiple: true,
					library: { type: 'image' }
					//library: { type: 'image,audio,video' }
				});

			frame.on( 'select', function() {
				var selection = frame.state().get('selection');
				selection.each(function(attachment, key) {
					var url = attachment.attributes.url;
					var clone = template.clone(true);
					clone.find('.tmm-gallery-item-thumb').css('background-image', 'url(' + url + ')').end().find('.tmm-gallery-item-val').val(url);
					wrapper.append(clone);
					tmm_ext_shortcodes.gallery_changer(shortcode_name);
				});
			});

			frame.open();

			return false;
		});

		$(".tmm-delete-gallery-item").life('click',function(){
			$(this).parent().remove();
			tmm_ext_shortcodes.gallery_changer(shortcode_name);
			return false;
		});
		$('#transition_effect').on('change',function(){
			tmm_ext_shortcodes.gallery_changer(shortcode_name);
		});

	});
</script>