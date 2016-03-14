<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<audio controls="control" preload="none" src="<?php echo $content ?>" type="audio/mp3"></audio>
	<script type="text/javascript">
		jQuery(function() {

			var $player = jQuery('audio');
			if ($player.length) {
				$player.mediaelementplayer({
					audioWidth: '100%',
					audioHeight: '34px',
				});
			}

		});


	</script>
<?php
wp_enqueue_script('mediaelement');
