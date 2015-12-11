<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('Title', 'tmm_content_composer'),
			'shortcode_field' => 'content',
			'id' => '',
			'default_value' => TMM_Content_Composer::set_default_value('content', ''),
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option(array(
			'type' => 'text',
			'title' => __('URL', 'tmm_content_composer'),
			'shortcode_field' => 'url',
			'id' => 'url',
			'default_value' => TMM_Content_Composer::set_default_value('url', ''),
			'description' => __('Example: ', 'tmm_content_composer') . 'http://forums.webtemplatemasters.com/'
		));
		?>
	</div><!--/ .one-half-->

	<div class="one-half">

		<?php

		$icon_css_class = TMM_Content_Composer::set_default_value('icon_css_class', 'icon-html5');
		?>	

		<input type="hidden" class="js_shortcode_template_changer" data-shortcode-field="icon_css_class" id="chooced_icon_type" value="<?php echo $icon_css_class ?>" />				
	
		
		<?php
		$icon_groups = array(
			'New_Icons' => __('New Icons', 'tmm_content_composer'),
			'Web_Application_Icons' => __('Web Application Icons', 'tmm_content_composer'),
			'Text_Editor_Icons' => __('Text Editor Icons', 'tmm_content_composer'),
			'Directional_Icons' => __('Directional Icons', 'tmm_content_composer'),
			'Video_Player_Icons' => __('Video Player Icons', 'tmm_content_composer'),
			'Brand_Icons' => __('Brand Icons', 'tmm_content_composer'),
			'Medical_Icons' => __('Medical Icons', 'tmm_content_composer'),
		);

		$view_icon_group = TMM_Content_Composer::set_default_value('view_icon_group', 'New_Icons');
		TMM_Content_Composer::html_option(array(
			'type' => 'select',
			'title' => __('View icon group', 'tmm_content_composer'),
			'shortcode_field' => 'view_icon_group',
			'id' => 'view_icon_group',
			'options' => $icon_groups,
			'default_value' => $view_icon_group,
			'description' => ''
		));
		?>

	</div><!--/ .one-half-->
	
	
	<div class="one-half">
		
	<?php
	TMM_Content_Composer::html_option(array(
		'type' => 'textarea',
		'title' => __('Optional Text', 'tmm_content_composer'),
		'shortcode_field' => 'text',
		'id' => 'url',
		'default_value' => TMM_Content_Composer::set_default_value('text', ''),
		'description' => ''
	));
	?>
		
	</div>

	<div class="fullwidth">

		<?php
		$icons_array = array();

		$new_icons = $icons_array['new_icons'] = array(		
			'icon-meh',            
			'icon-gamepad',
			'icon-keyboard',
			'icon-flag',
			'icon-flag-checkered',
			'icon-terminal',
			'icon-code',	
			'icon-reply-all',		
			'icon-crop',			
			'icon-unlink',
			'icon-question',
			'icon-info',
			'icon-exclamation',
			'icon-superscript',
			'icon-subscript',
			'icon-eraser',			
			'icon-shield',
			'icon-calendar-empty',			
			'icon-rocket',
			'icon-maxcdn',			
			'icon-html5',
			'icon-css3',
			'icon-anchor',			
			'icon-bullseye',			
			'icon-ticket',			
			'icon-level-up',
			'icon-level-down'			
		);

		$new_icons = $icons_array['new_icons'] = array_combine($new_icons, $new_icons);

		//***

		$web_application_icons = $icons_array['web_application_icons'] = array(
			'icon-adjust',
			'icon-anchor',
			'icon-asterisk',			
			'icon-barcode',
			'icon-beaker',
			'icon-beer',
			'icon-bell',			
			'icon-book',
			'icon-bookmark-empty',
			'icon-bookmark',
			'icon-briefcase',
			'icon-bullhorn',
			'icon-bullseye',
			'icon-calendar-empty',
			'icon-calendar',
			'icon-camera',			
			'icon-certificate',
			'icon-check-empty',			
			'icon-check',			
			'icon-circle',			
			'icon-cloud',			
			'icon-code',
			'icon-coffee',
			'icon-cog',
			'icon-cogs',			
			'icon-comment-alt',
			'icon-comment',			
			'icon-credit-card',
			'icon-crop',			
			'icon-desktop',
			'icon-download-alt',
			'icon-download',			
			'icon-edit',			
			'icon-eraser',
			'icon-exchange',			
			'icon-exclamation',			
			'icon-fighter-jet',			
			'icon-filter',			
			'icon-fire',			
			'icon-flag-checkered',
			'icon-flag',			
			'icon-folder-close',			
			'icon-folder-open',
			'icon-food',
			'icon-frown',
			'icon-gamepad',
			'icon-gift',
			'icon-glass',
			'icon-globe',
            'icon-globe-6',
			'icon-group',
			'icon-hdd',
			'icon-headphones',
			'icon-heart-empty',
			'icon-heart',
			'icon-home',
			'icon-inbox',			
			'icon-info',
			'icon-key',
			'icon-keyboard',
			'icon-laptop',
			'icon-leaf',			
			'icon-lemon',
			'icon-level-down',
			'icon-level-up',
			'icon-lightbulb',			
			'icon-lock',
			'icon-magic',
			'icon-magnet',			
			'icon-meh',			
			'icon-minus',			
			'icon-money',
			'icon-move',
			'icon-music',
			'icon-off',
			'icon-ok-circle',			
			'icon-ok',
			'icon-pencil',
			'icon-picture',
			'icon-plane',	
            'icon-paper-plane-2',            
            'icon-params',
            'icon-pencil-7',
			'icon-plus',
			'icon-print',			
			'icon-qrcode',			
			'icon-question',
			'icon-quote-left',
			'icon-quote-right',			
			'icon-reply-all',
			'icon-reply',
			'icon-resize-horizontal',
			'icon-resize-vertical',
			'icon-retweet',
			'icon-road',
			'icon-rocket',									
			'icon-search',
			'icon-share',			
			'icon-share',
			'icon-shield',						
			'icon-signal',			
			'icon-sitemap',
			'icon-smile',
			'icon-sort-down',
			'icon-sort-up',
			'icon-sort',
			'icon-spinner',
			'icon-star-empty',			
			'icon-star-half',
			'icon-star',
			'icon-tablet',
			'icon-tag',
			'icon-tags',
			'icon-tasks',
			'icon-terminal',
			'icon-thumbs-down',
			'icon-thumbs-up',
            'icon-thumbs-up-5',
			'icon-ticket',			
			'icon-tint',
			'icon-trash',
			'icon-trophy',
			'icon-truck',
			'icon-umbrella',			
			'icon-upload',
			'icon-user-md',
			'icon-user',
			'icon-volume-down',
			'icon-volume-off',
			'icon-volume-up',			
			'icon-wrench',
			'icon-zoom-in',
			'icon-zoom-out'
		);

		$web_application_icons = $icons_array['web_application_icons'] = array_combine($web_application_icons, $web_application_icons);

		//***

		$text_editor_icons = $icons_array['text_editor_icons'] = array(			
			'icon-paste',			
			'icon-undo',			
			'icon-text-height',
			'icon-text-width',
			'icon-align-left',
			'icon-align-center',
			'icon-align-right',
			'icon-align-justify',
			'icon-indent-left',
			'icon-indent-right',
			'icon-font',
			'icon-bold',
			'icon-italic',			
			'icon-underline',
			'icon-superscript',
			'icon-subscript',
			'icon-link',
			'icon-unlink',			
			'icon-eraser',
			'icon-columns',
			'icon-table',
			'icon-th-large',
			'icon-th',
			'icon-th-list',
			'icon-list',			
			'icon-list-alt'
		);

		$text_editor_icons = $icons_array['text_editor_icons'] = array_combine($text_editor_icons, $text_editor_icons);

		//***

		$directional_icons = $icons_array['directional_icons'] = array(
			'icon-angle-left',
			'icon-angle-right',
			'icon-angle-up',
			'icon-angle-down'			
		);
		$directional_icons = $icons_array['directional_icons'] = array_combine($directional_icons, $directional_icons);

		//***

		$video_player_icons = $icons_array['video_player_icons'] = array(			
			'icon-play',
			'icon-pause',
			'icon-stop',
			'icon-eject',
			'icon-backward',
			'icon-forward',
			'icon-fast-backward',
			'icon-fast-forward',
			'icon-step-backward',
			'icon-step-forward',			
			'icon-resize-full',
			'icon-resize-small'
		);

		$video_player_icons = $icons_array['video_player_icons'] = array_combine($video_player_icons, $video_player_icons);

		//***

		$brand_icons = $icons_array['brand_icons'] = array(
			'icon-css3',
			'icon-facebook',			
			'icon-twitter',			
			'icon-github',			
			'icon-html5',
			'icon-linkedin',			
			'icon-maxcdn',
			'icon-pinterest'			
		);

		$brand_icons = $icons_array['brand_icons'] = array_combine($brand_icons, $brand_icons);

		//***

		$medical_icons = $icons_array['medical_icons'] = array(
			'icon-ambulance',
			'icon-beaker',			
			'icon-hospital',
			'icon-medkit',			
			'icon-stethoscope',
			'icon-user-md'
		);

		$medical_icons = $icons_array['medical_icons'] = array_combine($medical_icons, $medical_icons);
		?>
		
		<br />

		<div class="container" id="icons_items">

			<div id="New_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'New_Icons' ? 'block' : 'none') ?>">
				
				<h4><?php _e('New Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($new_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icons_types_container-->

			<div id="Web_Application_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Web_Application_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Web Application Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($web_application_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->		

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Text_Editor_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Text_Editor_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Text Editor Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($text_editor_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Directional_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Directional_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Directional Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($directional_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Video_Player_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Video_Player_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Video Player Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($video_player_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Brand_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Social_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Brand Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($brand_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->	

				<div class="clear"></div>

			</div><!--/ .icon_types_container-->

			<div id="Medical_Icons" class="icon_types_container" style="display: <?php echo($view_icon_group == 'Medical_Icons' ? 'block' : 'none') ?>">
				<h4><?php _e('Medical Icons', 'tmm_content_composer') ?></h4>

				<ul class="icons-type-list icons-type-awesome">
					<?php foreach ($medical_icons as $name): ?>
						<li <?php if ($icon_css_class == $name): ?>class="chooced_icon_type"<?php endif; ?>><i title="<?php echo $name ?>" class="<?php echo $name ?>"></i></li>
					<?php endforeach; ?>
				</ul><!--/ .icons-type-list-->		

				<div class="clear"></div>

			</div><!--/ .icon_type_container-->

		</div><!--/ #icons_items-->		

	</div><!--/ .fullwidth-->

</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		colorizator();
		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.changer(shortcode_name);
		});

		var $iconGroup = jQuery('#view_icon_group');

		$iconGroup.on('change', function() {
			jQuery(".icon_types_container").hide();
			jQuery("#" + jQuery(this).val()).show();
		});

		jQuery("#icons_items").on('click', 'li', function(e) {
			var $target = jQuery(this);
			jQuery("#icons_items li").removeClass('chooced_icon_type');
			$target.addClass('chooced_icon_type');
			jQuery("#chooced_icon_type").val($target.find("i").attr('class'));
			tmm_ext_shortcodes.changer(shortcode_name);
			return false;
		});
		
	});
</script>

