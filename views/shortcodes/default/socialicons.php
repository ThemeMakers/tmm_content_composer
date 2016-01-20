<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$social_types = explode('^', $social_types);
$links = explode('^', $links);
?>

<?php if (!empty($social_types)): ?>

	<ul class="social-icons">

		<?php foreach ($social_types as $key => $type) : ?>

			<?php
			list($k, $c) = explode('~', $type);
			?>

			<li class="<?php echo $k ?>">
				<a target="_blank" href="<?php echo $links[$key] ?>"><i class="<?php echo $c ?>"></i></a>
			</li>
		<?php endforeach; ?>

	</ul>

<?php endif; ?>