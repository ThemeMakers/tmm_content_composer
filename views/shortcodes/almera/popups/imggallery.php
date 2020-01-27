<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">

		<div class="one-fourth">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Layout', 'tmm_content_composer'),
				'shortcode_field' => 'layout',
				'id' => 'album_layout',
				'options' => array(
					0 => esc_html__('Thumbnails', 'tmm_content_composer'),
					2 => esc_html__('Albums', 'tmm_content_composer'),
					3 => esc_html__('3 Columns', 'tmm_content_composer'),
					4 => esc_html__('4 Columns', 'tmm_content_composer'),
				),
				'default_value' => TMM_Content_Composer::set_default_value('layout', 0),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-fourth">

			<?php
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => esc_html__('Pagination', 'tmm_content_composer'),
				'shortcode_field' => 'pagination',
				'id' => 'album_pagination',
				'options' => array(
					0 => esc_html__('None', 'tmm_content_composer'),
					2 => esc_html__('Default pagination', 'tmm_content_composer')

								),
				'default_value' => TMM_Content_Composer::set_default_value('pagination', 0),
				'description' => ''
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-fourth">
			<?php
			$gall_icons = array(
				'1' => 'One Icon',
				'2' => 'Two Icons'
			);
			TMM_Content_Composer::html_option(array(
				'type' => 'select',
				'title' => 'Icons Appearance',
				'shortcode_field' => 'gall_amount_icons',
				'id' => 'gall_amount_icons',
				'options' => $gall_icons,
				'css_class' => '',
				'default_value' => TMM_Content_Composer::set_default_value('gall_amount_icons', '2'),
				'description' => '',

			));
			?>
		</div>

		<div class="one-fourth">
			<?php

			TMM_Content_Composer::html_option(array(
				'type' => 'text',
				'title' => esc_html__('Items Per Page', 'tmm_content_composer'),
				'shortcode_field' => 'post_per_page',
				'id' => 'post_per_page',
				'default_value' => TMM_Content_Composer::set_default_value('post_per_page', '10'),
				'description' => esc_html__('Number of items per page', 'tmm_content_composer')
			));
			?>

		</div><!--/ .one-half-->

		<div class="one-fourth">
			<h4 class="label">&nbsp;</h4>
			<?php
	        TMM_Content_Composer::html_option(array(
	                'type' => 'checkbox',
	                'title' => esc_html__('Enable Slide-Up Effect', 'almera'),
	                'shortcode_field' => 'gallery_slide_up',
					'id' => 'gallery_slide_up',
	                'is_checked' => TMM_Content_Composer::set_default_value('gallery_slide_up', 1),
	                'description' => ''
	        ));
	        ?>

		</div><!--/ .one-half-->

		<div class="one-half">
			<h4 class="label">&nbsp;</h4>
			<?php

				TMM_Content_Composer::html_option(array(
	                'type' => 'checkbox',
	                'title' => esc_html__('Show / Hide filter', 'tmm_content_composer'),
	                'shortcode_field' => 'show_filter',
	                'id' => 'show_filter',
	                'is_checked' => TMM_Content_Composer::set_default_value('show_filter', 1),
	                'description' => esc_html__('This option enables filter bar', 'tmm_content_composer')
	            ));
	            ?>

		</div><!--/ .one-half-->

		<?php
	        $args = array('numberposts' => -1, 'post_type' => TMM_Gallery::$slug);
	        $posts = get_posts($args);
	        $posts_array = array();
	        if (!empty($posts)) {
	            foreach ($posts as $post) {
	                $posts_array[$post->ID] = $post->post_title;
	            }
	        }

	        $content_edit_data = array();
	        if (isset($_REQUEST["shortcode_mode_edit"])) {
	            $content_edit_data = explode('^', $_REQUEST["shortcode_mode_edit"]['content']);
	        }
		?>

		<div class="fullwidth">
			<hr>
			<h3><?php esc_html_e('Album List', 'tmm_content_composer'); ?></h3>
			<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add album', 'tmm_content_composer'); ?></a><br />

			<ul id="list_items" class="list-items">
				<?php if (!empty($content_edit_data)): ?>
					<?php foreach ($content_edit_data as $key => $post_id) : ?>

						<li class="list_item">
							<table class="list-table">
								<tr>
									<td width="70%">
										<?php
										TMM_Content_Composer::html_option(array(
											'type' => 'select',
											'title' => '',
											'shortcode_field' => 'gallery_id',
											'id' => '',
											'options' => $posts_array,
											'default_value' => $post_id,
											'description' => '',
											'css_classes' => 'album_item_content',
										));
										?>

									</td>
									<td>
										<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php esc_html_e('Remove', 'tmm_content_composer'); ?></a>
									</td>
									<td><div class="row-mover"></div></td>
								</tr>
							</table>
						</li>

					<?php endforeach; ?>

				<?php else: ?>
					<li class="list_item">
						<table class="list-table">
							<tr>
								<td width="70%">
									<?php
									TMM_Content_Composer::html_option(array(
										'type' => 'select',
										'title' => '',
										'shortcode_field' => 'gallery_id',
										'id' => '',
										'options' => $posts_array,
										'default_value' => 0,
										'description' => '',
										'css_classes' => 'album_item_content',
									));
									?>

								</td>
								<td>
									<a class="button button-secondary js_delete_list_item js_shortcode_template_changer" href="#"><?php esc_html_e('Remove', 'tmm_content_composer'); ?></a>
								</td>
								<td><div class="row-mover"></div></td>
							</tr>
						</table>
					</li>
				<?php endif; ?>
			</ul>

			<a class="button button-secondary js_add_list_item" href="#"><?php esc_html_e('Add album', 'tmm_content_composer'); ?></a><br />

		</div>

	</div>


</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

	jQuery(function() {
		var layout = jQuery('#album_layout'),
			pagination = jQuery('#album_pagination'),
			slUp = jQuery('#gallery_slide_up'),
			postsPP = jQuery('#post_per_page'),
			filter = jQuery('#show_filter'),
			gallIcons = jQuery('#gall_amount_icons');


		jQuery("#list_items").sortable({
			stop: function(event, ui) {
				tmm_ext_shortcodes.album_changer(shortcode_name);
			}
		});

		//***
		tmm_ext_shortcodes.album_changer(shortcode_name);
		jQuery("#tmm_advanced_wp_popup2").on('keyup change', '.js_shortcode_template_changer', function() {
			var $this = jQuery(this);

			if($this.attr('type') == 'checkbox'){
				if ($this.is(':checked')) {
					$this.val(1);
				} else {
					$this.val(0);
				}
			}
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		if(layout.filter(":selected").val() == 0) {
			postsPP.closest('[class^="one-"]').slideUp();
		}

		if (layout.val() == 3 || layout.val() == 4 || layout.val() == 2){
			pagination.closest('[class^="one-"]').slideDown();
		} else {
			pagination.closest('[class^="one-"]').slideUp();
			postsPP.closest('[class^="one-"]').slideUp();
		}
			
        if (pagination.filter(":selected").val() == 0 ){
	        filter.closest('[class^="one-"]').slideDown();
        }

		layout.on('change', function(){
            
            var pgn = pagination.closest('[class^="one-"]'),
                gallery_slide_up = slUp.closest('[class^="one-"]'),
                post_per_page = postsPP.closest('[class^="one-"]'),
                show_filter = filter.closest('[class^="one-"]'),
                val = jQuery(this).val();

                switch(val){
                    case '2':
	                    pgn.slideUp();
                        gallery_slide_up.slideDown();	
                        post_per_page.slideUp();
                        show_filter.slideUp();
                        break;
                    case '3':                        
                    case '4':
	                    pgn.slideDown();
                        gallery_slide_up.slideDown();	
                        post_per_page.slideDown();	
                        show_filter.slideDown();
                        break;
                    default:
	                    pgn.slideUp();
                        gallery_slide_up.slideUp();	
                        post_per_page.slideUp();
                        show_filter.slideUp();
                        break;
                }
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function() {
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		pagination.on('change', function(){
			if (jQuery(this).val()==2){
				postsPP.closest('[class^="one-"]').slideDown();
			} else {
				postsPP.closest('[class^="one-"]').slideUp();
			}
			tmm_ext_shortcodes.album_changer(shortcode_name);
				
		});

		jQuery(".js_add_list_item").click(function() {
			var clone = jQuery(".list_item:last").clone(true);
			var last_row = jQuery(".list_item:last");
			jQuery(clone).insertAfter(last_row, clone);
			//***
			var icon_class = jQuery(".list_item:first").find('select').val();
			jQuery(".list_item:last").find('select').val(icon_class);
			tmm_ext_shortcodes.album_changer(shortcode_name);
			return false;
		});

		jQuery(".js_delete_list_item").click(function() {
			if (jQuery(".list_item").length > 1) {
				jQuery(this).parents('li').hide(200, function() {
					jQuery(this).remove();
					tmm_ext_shortcodes.album_changer(shortcode_name);
				});
			}

			return false;
		});

		jQuery(".list_item_style").on('change', function() {
			jQuery(this).parents('li').find('i').removeAttr('class').addClass(jQuery(this).val());
			tmm_ext_shortcodes.album_changer(shortcode_name);
		});

		slUp.on('change', function(){
			checkFoioSlideup(this.checked);
		});

		checkFoioSlideup(slUp.val());

		function checkFoioSlideup(prop){
			if(prop == true){
				gallIcons.closest('[class^="one-"]').slideUp();
			} else {
				gallIcons.closest('[class^="one-"]').slideDown();
			}
		}

	});
</script>