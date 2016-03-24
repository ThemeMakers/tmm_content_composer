<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>

<?php
if (!empty($grid)){
	echo do_shortcode('[ess_grid alias="' . $grid . '"]');
}
