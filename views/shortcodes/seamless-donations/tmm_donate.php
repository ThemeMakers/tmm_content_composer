<?php
if (shortcode_exists('seamless-donations')) {
	echo do_shortcode('[seamless-donations]');
} else {
	echo do_shortcode('[dgx-donate]');
}

