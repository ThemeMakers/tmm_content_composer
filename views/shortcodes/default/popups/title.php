<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="column">
		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option( array(
				'type'            => 'text',
				'title'           => __( 'Title Text', TMM_CC_TEXTDOMAIN ),
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
				'title'           => __( 'Title Heading', TMM_CC_TEXTDOMAIN ),
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
			$font_size = array( 'default' => __( 'Default', TMM_CC_TEXTDOMAIN ) );
			for ( $i = 8; $i <= 72; $i ++ ) {
				$font_size[ $i ] = $i;
			}
			//***
			TMM_Content_Composer::html_option( array(
				'type'            => 'select',
				'title'           => __( 'Font Size', TMM_CC_TEXTDOMAIN ),
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
				'title'           => __( 'Letter spacing (px)', TMM_CC_TEXTDOMAIN ),
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
				'title'           => __( 'Font weight', TMM_CC_TEXTDOMAIN ),
				'shortcode_field' => 'font_weight',
				'id'              => 'font_weight',
				'options'         => array(
					'default' => __( 'Default', TMM_CC_TEXTDOMAIN ),
					'100'    => 100,
					'200'    => 200,
					'300'    => 300,
					'400'    => 400,
					'500'    => 500,
					'600'    => 600
				),
				'default_value'   => TMM_Content_Composer::set_default_value( 'font_weight', 'normal' ),
				'description'     => ''
			) );
			?>
		</div>
		<!--/ .ona-half-->

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option( array(
				'type'            => 'select',
				'title'           => __( 'Title Align', TMM_CC_TEXTDOMAIN ),
				'shortcode_field' => 'align',
				'id'              => 'align',
				'options'         => array(
					'default'   => 'Default',
					'left'   => 'Left',
					'right'  => 'Right',
					'center' => 'Center'
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
				'title'           => __( 'Font Family', TMM_CC_TEXTDOMAIN ),
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
				'title'           => __( 'Title type', TMM_CC_TEXTDOMAIN ),
				'shortcode_field' => 'title_type',
				'type'            => 'select',
				'description'     => '',
				'default_value'   => TMM_Content_Composer::set_default_value( 'title_type', '' ),
				'id'              => 'title_type',
				'options'         => array(
					'default' => 'Default',
					'section' => 'Section Title',
					'section-alternate' => 'Alternate Section Title'
				),
				'display'         => 1
			) );
			?>

		</div>

		<div class="one-half">
			<?php
			TMM_Content_Composer::html_option( array(
				'type'            => 'text',
				'title'           => __( 'Line Height (em)', TMM_CC_TEXTDOMAIN ),
				'shortcode_field' => 'line_height',
				'id'              => 'line_height',
				'default_value'   => TMM_Content_Composer::set_default_value( 'line_height', '1.35' ),
				'description'     => ''
			) );
			?>

		</div>
		<!--/ .one-half-->

	    <div class="one-half">
			<?php
			TMM_Content_Composer::html_option( array(
				'title'           => __( 'Color', TMM_CC_TEXTDOMAIN ),
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
				'title'           => __( 'Text Transform Uppercase', TMM_CC_TEXTDOMAIN ),
				'shortcode_field' => 'text_transform',
				'id'              => 'text_transform',
				'is_checked'      => TMM_Content_Composer::set_default_value( 'text_transform', 0 ),
				'description'     => ''
			) );
			?>

		</div>
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

	});
</script>