<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<div class="widget widget_upcoming_events">

	<?php if (!empty($title)): ?>
		<h3 class="widget-title"><?php echo $title; ?></h3>
	<?php endif; ?>


	<?php

    if(!isset($category)) {
        $category = 0;
    }
    if(!isset($sorting)) {
        $sorting = 'DESC';
    }
    if(!isset($deep)) {
        $deep = 1;
    }

	$start = current_time('timestamp');
	if (isset($delay)) {
		$start = $start - $delay * 3600;
	}else{
		$delay=0;
	}

	$category_obj = get_term_by('id', (int) $category, 'events');
	if($category && $category_obj){
		$category = $category_obj->term_taxonomy_id;
	}

	$data = Thememakers_Application_Events::get_soonest_event($start, $count, $deep, $category, $delay);
	if ($sorting == 'ASC') {
		$data = array_reverse($data);
	}
	?>

	<ul>
		<?php if (!empty($data)) : ?>
			<?php foreach ($data as $event) : ?>
				<li>

					<div class="entry-meta">
						<span class="date"><?php echo date("d", $event['start_mktime']) ?></span>
						<span class="month"><?php echo ThemeMakersHelper::get_short_monts_names(date("n", $event['start_mktime']) - 1) ?></span>
					</div><!--/ .entry-meta-->

					<h6><a href="<?php echo $event['url'] ?>"><?php echo $event['title'] ?></a></h6>
					<span class="place"><?php echo $event['event_place_address'] ?></span>
					<?php if (get_option(TMM_THEME_PREFIX . 'events_time_format')): ?>
						<span class="time"><?php echo date("h:i a", $event['start_mktime']) ?> - <?php echo date("h:i a", $event['end_mktime']) ?></span>
					<?php else: ?>
						<span class="time"><?php echo date("H:i", $event['start_mktime']) ?> - <?php echo date("H:i", $event['end_mktime']) ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php else : ?>
			<div><?php _e('There is no events added yet!', TMM_CC_TEXTDOMAIN); ?></div>
		<?php endif; ?>
	</ul>

</div><!--/ .shortcode-->
