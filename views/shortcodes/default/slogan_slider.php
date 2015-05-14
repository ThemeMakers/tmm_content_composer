<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
        
    $h1_items = explode('^', $h1_items);
    $h1_heading_type = explode('^', $h1_heading_type);
    $h1_fade_in = explode('^', $h1_fade_in);
    $h1_fade_out = explode('^', $h1_fade_out);
    $h1_color = explode('^', $h1_color);
    $h2_items = explode('^', $h2_items);
    $h2_heading_type = explode('^', $h2_heading_type);
    $h2_fade_in = explode('^', $h2_fade_in);
    $h2_fade_out = explode('^', $h2_fade_out);
    $h2_color = (isset($h2_color)) ? explode('^', $h2_color) : '';   
    
    switch($type){
        case 'owlcarousel':
            
            tmm_enqueue_script('owlcarousel');
            tmm_enqueue_style('owlcarousel');
            tmm_enqueue_style('owltheme');                                                            
            tmm_enqueue_style('owltransitions'); 
            ?>
                <div class="cycle-rotator align-center">
                    
                    <?php  foreach ($h1_items as $key => $h1){ ?>
                    
                        <div class="item">
                            <<?php echo $h1_heading_type[$key] ?> style="color:<?php echo $h1_color[$key] ?>">
                                <?php echo $h1_items[$key]; ?>
                            </<?php echo $h1_heading_type[$key] ?>>
                        </div>
                        
                    <?php } ?>

                </div><!--/ .cycle-rotator-->
            <?php
            break;
        case 'textslide':
            ?>
            <div class="slogan-group">

                <ul class="slides">

                    <?php  foreach ($h1_items as $key => $h1){ ?>

                    <li class="item">
                        <div class="slogan align-center">
                            <<?php echo $h1_heading_type[$key] ?> style="color:<?php echo $h1_color[$key] ?>" data-from-effect="<?php echo $h1_fade_in[$key] ?>" data-to-effect="<?php echo $h1_fade_out[$key] ?>"><?php echo esc_html($h1_items[$key]) ?></<?php echo $h1_heading_type[$key] ?>>
                            <<?php echo $h2_heading_type[$key] ?> style="color:<?php echo $h2_color[$key] ?>" data-from-effect="<?php echo $h2_fade_in[$key] ?>" data-to-effect="<?php echo $h2_fade_out[$key] ?>"><?php echo esc_html($h2_items[$key]) ?></<?php echo $h2_heading_type[$key] ?>>
                        </div>
                    </li>

                    <?php } ?>

                </ul><!--/ .slides-->

            </div><!--/ .slogan-group-->
            <?php
            break;
    }
    
