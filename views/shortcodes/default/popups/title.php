<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'text',
			'title'           => __( 'Title Text', 'tmm_content_composer' ),
			'shortcode_field' => 'content',
			'id'              => 'title_text',
			'default_value'   => TMM_Content_Composer::set_default_value( 'content', '' ),
			'description'     => ''
		) );
		?>

	</div>
	<!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'select',
			'title'           => __( 'Title Heading', 'tmm_content_composer' ),
			'shortcode_field' => 'type',
			'id'              => 'type',
			'options'         => array(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6',
			),
			'default_value'   => TMM_Content_Composer::set_default_value( 'type', 'H1' ),
			'description'     => ''
		) );
		?>
	</div>
	<!--/ .one-half-->

	<div class="one-half">
		<?php
		$font_size = array( 'default' => __( 'Default', 'tmm_content_composer' ) );
		for ( $i = 8; $i <= 72; $i ++ ) {
			$font_size[ $i ] = $i;
		}
		//***
		TMM_Content_Composer::html_option( array(
			'type'            => 'select',
			'title'           => __( 'Font Size', 'tmm_content_composer' ),
			'shortcode_field' => 'font_size',
			'id'              => 'font_size',
			'options'         => $font_size,
			'default_value'   => TMM_Content_Composer::set_default_value( 'font_size', 'default' ),
			'description'     => ''
		) );
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'text',
			'title'           => __( 'Letter spacing (px)', 'tmm_content_composer' ),
			'shortcode_field' => 'letter_spacing',
			'id'              => 'letter_spacing',
			'default_value'   => TMM_Content_Composer::set_default_value( 'letter_spacing', '' ),
			'description'     => ''
		) );
		?>
	</div>
	<!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'select',
			'title'           => __( 'Font weight', 'tmm_content_composer' ),
			'shortcode_field' => 'font_weight',
			'id'              => 'font_weight',
			'options'         => array(
				'default' => __( 'Default', 'tmm_content_composer' ),
				'normal' => __( 'Normal', 'tmm_content_composer' ),
				'100'    => 100,
				'200'    => 200,
				'300'    => 300,
				'400'    => 400,
				'500'    => 500,
				'600'    => 600,
				'700'    => 700
			),
			'default_value'   => TMM_Content_Composer::set_default_value( 'font_weight', 'default' ),
			'description'     => ''
		) );
		?>
	</div>
	<!--/ .ona-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'select',
			'title'           => __( 'Title Align', 'tmm_content_composer' ),
			'shortcode_field' => 'align',
			'id'              => 'align',
			'options'         => array(
				'left'   => 'Left',
				'right'  => 'Right',
				'center' => 'Center',
			),
			'default_value'   => TMM_Content_Composer::set_default_value( 'align', 'left' ),
			'description'     => ''
		) );
		?>

	</div>

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'select',
			'title'           => __( 'Font Family', 'tmm_content_composer' ),
			'shortcode_field' => 'font_family',
			'id'              => 'font_family',
			'options'         => tmm_get_fonts_array(),
			'default_value'   => TMM_Content_Composer::set_default_value( 'font_family', '' ),
			'description'     => ''
		) );
		?>

	</div>
	<!--/ .one-half-->

	<div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'title'           => __( 'Title type', 'tmm_content_composer' ),
			'shortcode_field' => 'title_type',
			'type'            => 'select',
			'description'     => '',
			'default_value'   => TMM_Content_Composer::set_default_value( 'title_type', '' ),
			'id'              => 'title_type',
			'options'         => array(
				'default' => 'Default',
				'section' => 'Section Title'
			),
			'display'         => 1
		) );
		?>

		<div class="hdesc" style="<?php echo ( TMM_Content_Composer::set_default_value( 'title_type', '') == 'section') ? 'display:block' : 'display:none'; ?>">
			<?php
			TMM_Content_Composer::html_option( array(
				'title'           => __( 'Title Description', 'tmm_content_composer' ),
				'shortcode_field' => 'title_description',
				'type'            => 'text',
				'description'     => '',
				'default_value'   => TMM_Content_Composer::set_default_value( 'title_description', '' ),
				'id'              => 'title_description',
				'display'         => 1
			) );
			?>
		</div>
	</div>

    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'text',
			'title'           => __( 'Bottom Indent (px)', 'tmm_content_composer' ),
			'shortcode_field' => 'bottom_indent',
			'id'              => 'bottom_indent',
			'default_value'   => TMM_Content_Composer::set_default_value( 'bottom_indent', '' ),
			'description'     => ''
		) );
		?>

	</div>
	<!--/ .one-half-->

    <div class="one-half">
		<?php
		TMM_Content_Composer::html_option( array(
			'title'           => __( 'Color', 'tmm_content_composer' ),
			'shortcode_field' => 'color',
			'type'            => 'color',
			'description'     => '',
			'default_value'   => TMM_Content_Composer::set_default_value( 'color', '' ),
			'id'              => '',
			'display'         => 1
		) );
		?>

	</div>

	<div class="one-half">

		<?php
		TMM_Content_Composer::html_option( array(
			'type'            => 'checkbox',
			'title'           => __( 'Text Transform Uppercase', 'tmm_content_composer' ),
			'shortcode_field' => 'text_transform',
			'id'              => 'text_transform',
			'is_checked'      => TMM_Content_Composer::set_default_value( 'text_transform', 0 ),
			'description'     => ''
		) );
		?>

	</div>
</div>


<!-- --------------------------  PROCESSOR  --------------------------- -->
<script type="text/javascript">
	var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";
	jQuery(function () {

		tmm_ext_shortcodes.changer(shortcode_name);
		jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup change', function () {
			tmm_ext_shortcodes.changer(shortcode_name);
			colorizator();
		});

		colorizator();

		jQuery('#title_type').life('click', function(){
			var val = jQuery(this).val(),
				titleDesc  = jQuery('.hdesc');

			switch(val){
				case 'default':
					titleDesc.slideUp(400);
					break;
				case 'section':
					titleDesc.slideDown(400);
					break;
			}
		});

	});
</script>

