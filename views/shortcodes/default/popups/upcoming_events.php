<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<div id="tmm_shortcode_template" class="tmm_shortcode_template clearfix">

	<div class="full-width">
        <?php
        /**
        * ---------------- Block Title ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Block Title', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'content',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('content', 'Upcoming Events'),
            'description' => ''
        ));
        ?>
	</div><!--/ .one-half-->

	<div class="one-half">
        <?php
        /**
        * ---------------- Count of events ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Count of events', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'count',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('count', 3),
            'description' => ''
        ));
        ?>
	</div><!--/ .one-half-->

	<div class="one-half">
        <?php
        /**
        * ---------------- Delay ----------------
        */
        TMM_Content_Composer::html_option(array(
            'type' => 'text',
            'title' => __('Delay', TMM_CC_TEXTDOMAIN),
            'shortcode_field' => 'delay',
            'id' => '',
            'default_value' => TMM_Content_Composer::set_default_value('delay', 0),
            'description' => __('in hours', TMM_CC_TEXTDOMAIN),
        ));
        ?>
	</div><!--/ .one-half-->

	<div class="one-half">
        <?php
        /**
        * ---------------- Soonest event data parsing ----------------
        */
        for ($i = 1; $i <= 12; $i++) {
            $name = $i . ' month';
            $month_array[$i] = __($name, TMM_CC_TEXTDOMAIN);
        }

        TMM_Content_Composer::html_option(array(
        'type' => 'select',
        'title' => __('Soonest event data parsing', TMM_CC_TEXTDOMAIN),
        'shortcode_field' => 'deep',
        'id' => '',
        'options' => $month_array,
        'default_value' => TMM_Content_Composer::set_default_value('deep', 0),
        'description' => ''
        ));
        ?>
	</div><!--/ .one-half-->

	<div class="one-half">
        <?php
        /**
        * ---------------- Sorting ----------------
        */
        TMM_Content_Composer::html_option(array(
        'type' => 'select',
        'title' => __('Sorting', TMM_CC_TEXTDOMAIN),
        'shortcode_field' => 'sorting',
        'id' => '',
        'options' => array(
            'DESC' => __('DESC', TMM_CC_TEXTDOMAIN),
            'ASC' => __('ASC', TMM_CC_TEXTDOMAIN),
        ),
        'default_value' => TMM_Content_Composer::set_default_value('sorting', 'DESC'),
        'description' => ''
        ));
        ?>
	</div><!--/ .one-half-->

    <div class="one-half">
        <?php
        /**
         * ---------------- Category ----------------
         */
        $terms = get_terms('events');
        $terms_option_array = array();
        $terms_options_array[0] = 'All';
        if ( !empty($terms) ) {
            foreach ($terms as $term) {
                $terms_options_array[$term->term_id] = $term->name;
            }
        }

        TMM_Content_Composer::html_option(array(
        'type' => 'select',
        'title' => __('Category', TMM_CC_TEXTDOMAIN),
        'shortcode_field' => 'category',
        'id' => '',
        'options' => $terms_options_array,
        'default_value' => TMM_Content_Composer::set_default_value('category', 0),
        'description' => ''
        ));
        ?>
    </div><!--/ .one-half-->

</div><!--/ .tmm_shortcode_template-->

<!-- --------------------------  PROCESSOR  --------------------------- -->

<div class="fullwidth-frame">

	<script type="text/javascript">
        var shortcode_name = "<?php echo basename(__FILE__, '.php'); ?>";

        jQuery(function() {
			tmm_ext_shortcodes.changer(shortcode_name);
			jQuery("#tmm_shortcode_template .js_shortcode_template_changer").on('keyup, change', function() {
				tmm_ext_shortcodes.changer(shortcode_name);
			});

		});
	</script>

</div><!--/ .fullwidth-frame-->



