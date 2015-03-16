<?php echo do_shortcode('[dgx-donate]'); ?>

<script type="text/javascript">
	(function($) {
		$(function() {

			var donate_form = $('#dgx-donate-form');

			donate_form.find('input[type="checkbox"]').each(function(){

				if (!$(this).hasClass('tmm-checkbox')) {

					var text = $(this).parent().contents().filter(function() {
									return this.nodeType === 3;
								});

					text.wrap('<label></label>');
					$(this).addClass('tmm-checkbox').next();
				}

			});

			donate_form.find('input[type="radio"]').each(function(){

				if (!$(this).hasClass('tmm-radio')) {

					var text = $(this).parent().contents().filter(function() {
						return this.nodeType === 3;
					});

					text.wrap('<label></label>');
					$(this).addClass('tmm-radio').next();
				}

			});

		});
	}(jQuery));
</script>