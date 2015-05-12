<?php
wp_enqueue_script('jquery.tweet', TMM_THEME_URI . '/helper/twitter/jquery.tweet.js');
TMM_Functions::enqueue_script('cycle');
$uniqid = uniqid();
?>
<div class="tweets-container" id="tweet_<?php echo $uniqid ?>" data-timeout="<?php echo $timeout ?>"></div>

<script type="text/javascript">

	jQuery(function($) {
		
		function swipeFunc(e, dir) {

			var $currentTarget = $(e.currentTarget);

			if ($currentTarget.data('slideCount') > 1) {
				$currentTarget.data('dir', '');
				if (dir === 'left') {
					$currentTarget.cycle('next');
				}
				if (dir === 'right') {
					$currentTarget.data('dir', 'prev');
					$currentTarget.cycle('prev');
				}
			}
		}

		var $tweet = jQuery('#tweet_<?php echo $uniqid ?>');

		$tweet.tweet({
			username: "<?php echo $content ?>", // Username Twitter
			count: <?php echo $count ?>,
			page: 1,
			unique_id: "<?php echo $uniqid ?>",
			loading_text: '<?php _e('loading', TMM_CC_TEXTDOMAIN) ?> ...'
		});

		var $tweets = $('#tweets_<?php echo $uniqid ?>', $tweet);

		$tweets.each(function(i) {

			var $this = $(this);

			if ($this.children('li').length < 2) {
				return;
			}

			$this.css('height', $this.children('li:first').height())
					.after('<div id="tweets-nav-' + i + '" class="tweets-control-nav">')
					.cycle({
						before: function(curr, next, opts) {
							var $this = $(this);
							$this.parent().stop().animate({
								height: $this.height()
							}, opts.speed);
						},
						containerResize: false,
						easing: 'easeInOutExpo',
						fit: true,
						pause: true,
						slideResize: true,
						speed: 600,
						timeout: $this.parent().data('timeout') ? $this.parent().data('timeout') : '',
						width: '100%',
						pager: '#tweets-nav-' + i
					}).data('slideCount', $this.children('li').length);

		});

		if ($tweets.data('slideCount') > 1) {
			jQuery(window).on('resize', function() {
				$tweets.css('height', $tweets.find('li:visible').height());
			});
		}

		if (Modernizr.touch) {
			$tweets.swipe({
				swipeLeft: swipeFunc,
				swipeRight: swipeFunc,
				allowPageScroll: 'auto'
			});
		}


	});

</script>