<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="our_contacts">
    <ul>
        <?php if (!empty($content)){ ?><li><?php  echo $content ?></li><?php } ?>
        <?php if (!empty($phone)){ ?><li>Call:  <?php echo $phone; ?> </li><?php } ?>
        <?php if (!empty($email)){?><li>Email:<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></li><?php } ?>
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
                <dd>Closed</dd>
                <?php
            }
        } ?>
    </dl>

</div><!--/ .our_timetable-->