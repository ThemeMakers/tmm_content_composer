<?php
if (!defined('ABSPATH')) exit();

$staff = explode('^', $staff);

$cols_class = 'medium-6 columns';

if ($layout == 2) {
	$cols_class = 'medium-6 columns';
} else if ($layout == 3) {
	$cols_class = 'medium-4 columns';
} else if ($layout == 4) {
	$cols_class = 'medium-3 columns';
}
?>

<div class="row staff-shortcode">

<?php
if (!empty($staff)){

    foreach ($staff as $post_id) {

		if (function_exists('icl_object_id')){
			$post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);
		}
		$custom = TMM_Staff::get_meta_data($post_id);

	    $post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
	    $position = '';

	    if (!empty($post_categories)) {
		    foreach ($post_categories as $key => $value) {
			    if ($key > 0) {
				    $position .= ' / ';
			    }
			    $position .= $value;
		    }
	    }
        ?>

        <div class="<?php echo $cols_class; ?>">

            <article class="team-entry slideRight">

                <div class="team-entry-image">
                    <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post_id, '560*390')); ?>" alt="" />
                </div><!--/ .team-entry-image-->

                <h4><?php echo esc_html(get_the_title($post_id)); ?></h4>
                <span class="team-position">
                    <?php echo $position; ?>
                </span>

                <div class="team-entry-body">
                    <p>
                        <?php echo esc_html(get_post($post_id)->post_excerpt); ?>
                    </p>
                </div><!--/ .team-entry-body-->

                <ul class="social-icons">
                    <?php if (!empty($custom["email"])){ ?>
                        <li class="email"><a target="_blank" href="mailto:<?php echo esc_attr($custom["email"]); ?>"><?php esc_html_e('Email', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["twitter"])){ ?>
                        <li class="twitter"><a target="_blank" href="<?php echo esc_url($custom["twitter"]); ?>"><?php esc_html_e('Twitter', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["facebook"])){ ?>
                        <li class="facebook"><a target="_blank" href="<?php echo esc_url($custom["facebook"]); ?>"><?php esc_html_e('Facebook', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["linkedin"])){ ?>
                        <li class="linkedin"><a target="_blank" href="<?php echo esc_url($custom["linkedin"]); ?>"><?php esc_html_e('Linkedin', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["instagram"])){ ?>
                        <li class="instagram"><a target="_blank" href="<?php echo esc_url($custom["instagram"]); ?>"><?php esc_html_e('Instagram', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["dribble"])){ ?>
                        <li class="dribbble"><a target="_blank" href="<?php echo esc_url($custom["dribble"]); ?>"><?php esc_html_e('Dribbble', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["skype"])){ ?>
                        <li class="skype"><a target="_blank" href="<?php echo esc_url($custom["skype"]); ?>"><?php esc_html_e('Skype', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                    <?php if (!empty($custom["cv"])){ ?>
                        <li class="cv last"><a target="_self" href="<?php echo esc_url($custom["cv"]); ?>"><?php esc_html_e('CV', TMM_CC_TEXTDOMAIN) ?></a></li>
                    <?php } ?>
                </ul><!--/ .social-icons-->

            </article><!--/ .team-entry-->

        </div>

        <?php
	}

}
?>

</div>