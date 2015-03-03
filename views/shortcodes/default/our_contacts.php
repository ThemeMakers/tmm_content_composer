<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="our_contacts">
    <ul>
        <?php if (!empty($content)){ ?><li><?php  echo $content ?></li><?php } ?>
        <?php if (!empty($phone)){ ?><li><?php _e('Call:', TMM_CC_TEXTDOMAIN) ?> <?php echo $phone; ?> </li><?php } ?>
        <?php if (!empty($email)){?><li><?php _e('E-mail:', TMM_CC_TEXTDOMAIN) ?> <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li><?php } ?>
    </ul>
</div>
<div class="our_timetable">
    <?php if(!empty($working_days)) echo $working_days ?>

    <dl>
        <?php if (!empty($closed_days)){
            $closed_days = explode(',', $closed_days);
            foreach($closed_days as $closed_day){
                ?>
                <dt><?php echo $closed_day ?>:</dt>
                <dd><?php _e('Closed', TMM_CC_TEXTDOMAIN) ?></dd>
                <?php
            }
        } ?>
    </dl>

</div><!--/ .our_timetable-->