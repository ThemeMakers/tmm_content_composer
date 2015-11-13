<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$content = explode('^', $content);
$titles = explode('^', $titles);
$hover_titles = explode('^', $hover_titles);
$links = explode('^', $links);
$icons = explode(',', $icons);

switch($type){
    case '1':
        ?>
        <div class="content-boxes">
							
            <ul>
                <?php if (!empty($content)){ ?>
                    <?php foreach ($content as $key => $text){

		                $text_color = '';
		                $bg_color = '';
		                $hover_text_color = '';
		                $hover_bg_color = '';

		                if (!empty($colors)) {

			                if (!is_array($colors)) {
				                $colors = explode(',', $colors);
			                }

			                $text_color = 'color: rgb(' . TMM_Content_Composer::hex2RGB( $colors[$key * 4], 1 ) . ');';
			                $bg_color = 'background-color: rgb(' . TMM_Content_Composer::hex2RGB( $colors[$key * 4 + 1], 1 ) . ');';
			                $hover_text_color = 'color: rgb(' . TMM_Content_Composer::hex2RGB( $colors[$key * 4 + 2], 1 ) . ');';
			                $hover_bg_color = 'background-color: rgb(' . TMM_Content_Composer::hex2RGB( $colors[$key * 4 + 3], 1 ) . ');';
		                }
		                ?>
                    <li style="<?php echo $text_color.$bg_color; ?>">
                        <i class="content-icon <?php echo esc_attr($icons[$key]) ?>"></i>
                        <h2 style="<?php echo $text_color; ?>"><?php echo esc_html($titles[$key]) ?></h2>

                        <div class="hover-box" style="<?php echo $hover_bg_color; ?>" data-color="<?php echo esc_attr($colors[$key * 4]) ?>" data-color-state="<?php echo esc_attr($colors[$key * 4 + 1]) ?>" data-text-hover="<?php echo esc_attr($colors[$key * 4 + 2]) ?>" data-color-hover="<?php echo esc_attr($colors[$key * 4 + 3]) ?>"></div><!--/ .hover-box-->
                        <div class="extra-content">

                            <div class="extra-table">
                                <div class="extra-inner">
                                    <h4 style="<?php echo $hover_text_color; ?>">
                                        <?php if (!empty($links[$key])) { ?>
                                            <a style="<?php echo $hover_text_color; ?>" href="<?php echo esc_url( $links[$key]); ?>">
                                        <?php } ?>

                                            <?php echo esc_html($hover_titles[$key]) ?>

                                        <?php if (!empty($links[$key])) { ?>
                                            </a>
                                        <?php } ?>

                                    </h4>
                                    <p style="<?php echo $hover_text_color; ?>">
                                        <?php echo esc_html($text) ?>
                                    </p>
                                </div><!--/ .extra-inner-->
                            </div>

                        </div><!--/ .extra-content-->
                    </li>  
                    <?php } ?>
                <?php } ?>

            </ul>

        </div><!--/ .content-boxes--> 
        
        <?php
        break;
    case '2':
		if (!empty($content)){
			foreach ($content as $key => $text){
	        ?>
	        <div class="ca-shortcode-alt">
	            <i class="ca-icon <?php echo esc_attr($icons[$key]) ?>"></i>
	            <div class="ca-content">
	                <h3>
	                    <?php if (!empty($links[$key])) { ?>
	                    <a href="<?php echo esc_url( $links[$key]); ?>">
	                        <?php
	                        }
	                        ?>
	                        <?php echo esc_html($titles[$key]) ?>
	                        <?php if (!empty($links[$key])){
	                        ?>
	                    </a>
	                    <?php } ?>
	                </h3>
	                <p>
	                    <?php echo esc_html($text) ?>
	                </p>
	            </div>
	        </div><!--/ .ca-shortcode-->

	        <?php
			}
		}
        break;
    default:
        
        if (!empty($content)){ 
             foreach ($content as $key => $text){ ?>

                <div class="ca-shortcode">
                    <i class="ca-icon <?php echo esc_attr($icons[$key]) ?>"></i>
                    <div class="ca-content">
                        <h4 class="ca-title">
                            <?php
                            if (!empty($links[$key])){?>
                            <a href="<?php echo esc_url( $links[$key]); ?>">
                                <?php
                                }
                                ?>
                            <?php echo esc_html($titles[$key]) ?>
                                <?php if (!empty($links[$key])){
                                ?>
                            </a>
                        <?php
                        }?>
                        </h4>
                        <p>
                            <?php echo esc_html($text) ?>
                        </p>
                    </div>
                </div><!--/ .ca-shortcode-->

                <?php
            }
        }
        break;     
}
?>

                
               