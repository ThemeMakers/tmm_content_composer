<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$social_types = explode('^', $social_types);
$links = explode('^', $links);
?>

<?php if (!empty($social_types)): ?>

	<ul class="lc-social-icons">

		<?php foreach ($social_types as $key => $type) : ?>
			<li class="<?php echo esc_attr($type) ?>">
				<a title="<?php echo esc_attr($type) ?>" href="<?php echo esc_url($links[$key]) ?>"></a>
			</li>
		<?php endforeach; ?>

	</ul>

<?php endif; ?>