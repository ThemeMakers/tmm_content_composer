<?php
if (!defined('ABSPATH')) die('No direct access allowed');
global $post;

foreach ($tmm_layout_constructor as $row => $row_data){
	if (!empty($row_data)){
		?>
		<div class="clearfix" <?php TMM_Layout_Constructor::draw_row_bg($tmm_layout_constructor_row, $row) ?>>
			<?php
			foreach ($row_data as $uniqid => $column) {

				$content = str_replace('<p>', '__P__', $column['content']);
				$content = str_replace('</p>', '__CP__', $content);
				$content = do_shortcode($content);
				$content = str_replace('__CP__', '', $content);
				$content = str_replace('__P__', '<p>', $content);
				?>
				<div class="clearfix <?php echo @$column['effect'] ?> <?php echo $column['front_css_class'] ?>"><?php echo $content ?></div>
			<?php }
			?>
		</div>
	<?php
	}
} ?>
