<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$staff = explode('^', $staff);

    if (!empty($staff)){
        
        switch($layout){
            case 4:
                foreach ($staff as $post_id) {
                
                    if (function_exists('icl_object_id')){
                        $post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);             
                    }
                     $custom = TMM_Staff::get_meta_data($post_id);
                ?>
                <div class="col-sm-3">
						
                    <article class="team-entry slideRight">

                        <div class="team-entry-image">
                                <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post_id, '560*390')); ?>" alt="" />
                        </div><!--/ .team-entry-image-->

                        <h4 class="team-entry-title"><?php echo esc_html(get_the_title($post_id)); ?></h4>
                        <span class="team-position">
                            <?php
                                $post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
                                if (!empty($post_categories)) {
                                    foreach ($post_categories as $key => $value) {
                                        if ($key > 0) {
                                                echo ' / ';
                                        }
                                        echo $value;
                                    }
                                }
                                ?>
                        </span>

                        <div class="team-entry-body">
                            <p>
                                <?php echo esc_html(get_post($post_id)->post_excerpt); ?>
                            </p>
                        </div><!--/ .team-entry-body-->

                        <ul class="social-icons style-fall">
                            <?php if (!empty($custom["email"])){ ?>
                                <li class="mail"><a target="_blank" href="mailto:<?php echo esc_attr($custom["email"]); ?>"><?php esc_html_e('Email', TMM_CC_TEXTDOMAIN) ?></a></li>
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
                        </ul><!--/ .social-icons-->

                    </article><!--/ .team-entry-->

                </div>	
                <?php   
                 }
                break;
                
            case 3:

                foreach ($staff as $post_id) {
                    if (function_exists('icl_object_id')){
                        $post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);
                    }
                     $custom = TMM_Staff::get_meta_data($post_id);
                ?>
                <div class="col-sm-4">
						
                    <article class="team-entry slideRight">

                        <div class="team-entry-image">
                                <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post_id, '560*390')) ?>" alt="" />
                        </div><!--/ .team-entry-image-->

                        <h4 class="team-entry-title"><?php echo esc_html(get_the_title($post_id)); ?></h4>
                        <span class="team-position">
                            <?php
                                $post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
                                if (!empty($post_categories)) {
                                    foreach ($post_categories as $key => $value) {
                                        if ($key > 0) {
                                                echo ' / ';
                                        }
                                        echo $value;
                                    }
                                }
                                ?>
                        </span>

                        <div class="team-entry-body">
                            <p>
                               <?php echo esc_html(get_post($post_id)->post_excerpt); ?>
                            </p>
                        </div><!--/ .team-entry-body-->

                        <ul class="social-icons style-fall">
                            <?php if (!empty($custom["email"])){ ?>
                                <li class="mail"><a target="_blank" href="mailto:<?php echo esc_attr($custom["email"]); ?>"><?php esc_html_e('Email', TMM_CC_TEXTDOMAIN) ?></a></li>
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
                                <li class="dribbble"><a target="_blank" href="<?php echo esc_url($custom["dribble"]); ?>"><?php esc_html_e('Dribble', TMM_CC_TEXTDOMAIN) ?></a></li>
                            <?php } ?>
                            <?php if (!empty($custom["skype"])){ ?>
                                <li class="skype"><a target="_blank" href="<?php echo esc_url($custom["skype"]); ?>"><?php esc_html_e('Skype', TMM_CC_TEXTDOMAIN) ?></a></li>
                            <?php } ?>
                        </ul><!--/ .social-icons-->

                    </article><!--/ .team-entry-->

                </div>	
                <?php   
                 }
                
                break;
            
            default:
                 foreach ($staff as $post_id) {
                if (function_exists('icl_object_id')){
                    $post_id = icl_object_id($post_id, TMM_Staff::$slug, true, ICL_LANGUAGE_CODE);             
                }
                    $custom = TMM_Staff::get_meta_data($post_id);
                ?>
                <div class="col-sm-6 col-lg-4">
						
                    <article class="team-entry slideRight">

                        <div class="team-entry-image">
                                <img src="<?php echo esc_url(TMM_Content_Composer::get_post_featured_image($post_id, '560*390')) ?>" alt="" />
                        </div><!--/ .team-entry-image-->

                        <h4 class="team-entry-title"><?php echo esc_html(get_the_title($post_id)); ?></h4>
                        <span class="team-position">
                            <?php
                                $post_categories = wp_get_post_terms($post_id, 'position', array("fields" => "names"));
                                if (!empty($post_categories)) {
                                    foreach ($post_categories as $key => $value) {
                                        if ($key > 0) {
                                                echo ' / ';
                                        }
                                        echo $value;
                                    }
                                }
                                ?>
                        </span>

                        <div class="team-entry-body">
                            <p>
                                <?php echo esc_html(get_post($post_id)->post_excerpt); ?>
                            </p>
                        </div><!--/ .team-entry-body-->

                        <ul class="social-icons style-fall">
                            <?php if (!empty($custom["email"])){ ?>
                                <li class="mail"><a target="_blank" href="mailto:<?php echo esc_attr($custom["email"]); ?>"><?php esc_html_e('Email', TMM_CC_TEXTDOMAIN) ?></a></li>
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
                                <li class="dribbble"><a target="_blank" href="<?php echo esc_url($custom["dribble"]); ?>"><?php esc_html_e('Dribble', TMM_CC_TEXTDOMAIN) ?></a></li>
                            <?php } ?>
                            <?php if (!empty($custom["skype"])){ ?>
                                <li class="skype"><a target="_blank" href="<?php echo esc_url($custom["skype"]); ?>"><?php esc_html_e('Skype', TMM_CC_TEXTDOMAIN) ?></a></li>
                            <?php } ?>
                        </ul><!--/ .social-icons-->

                    </article><!--/ .team-entry-->

                </div>	
                <?php   
                 }
                break;
        }
    ?>
<?php } ?>

