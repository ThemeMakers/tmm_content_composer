<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
$social_types_array = unserialize(TMM::get_option('social_types'));
$social_types = explode('^', $social_types);
$links = explode('^', $links);
?>

<?php if (!empty($social_types)){ ?>

	<div class="social-widget widget">
		
		<ul class="social-icons">

			<?php
			foreach ($social_types as $key => $type) {
				if(isset($links[$key]) && $links[$key] !== ''){
				?>
				<li>
					<a class="<?php echo $type ?>" href="<?php echo $links[$key]; ?>">
						<span><?php echo $social_types_array[$type]; ?></span>
					</a>
				</li>
				<?php
				}
			}
			?>

		</ul>
		
	</div>

<?php } ?>