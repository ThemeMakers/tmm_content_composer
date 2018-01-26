<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>
<?php
$effect_class = ( TMM::get_option( 'images_loader' ) ) ? 'translateEffect' : '';
$icons_type   = ( $folio_amount_icons ) ? $folio_amount_icons : '2';
$icon_class   = ( $icons_type == '1' ) ? 'one_icon' : '';

$folioposts_array = explode( '^', $folioposts );
if ( ! empty( $folioposts_array ) ) {
	$foliopost = $folioposts_array[0];
}

$images = get_post_meta( $foliopost, 'tmm_portfolio', true );
if ( ! empty( $images ) ) {
	foreach ( $images as $key => $value ) {
		$images[ $key ]['id'] = $foliopost;
	}
}

$col_algorithms = array(
	'random' => 'random',
	1        => 'col1,col2,col3,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2,col2',
	2        => 'col3,col1,col2,col1,col3,col2,col2,col3,col2',
);

$current_col_algoritm     = $col_algorithms[ $col_alg ];
$current_col_algoritm_arr = array();
if ( $current_col_algoritm == 'random' ) {
	unset( $col_algorithms['random'] );
	shuffle( $col_algorithms );
	reset( $col_algorithms );
	$first_key                = key( $col_algorithms );
	$current_col_algoritm_arr = explode( ',', $col_algorithms[ $first_key ] );
} else {
	$current_col_algoritm_arr = explode( ',', $current_col_algoritm );
}
$columns_img_sizes = array( 'col1' => '227*180', 'col2' => '227*250', 'col3' => '227*320' );
$counter           = 0;
?>
<?php if ( ! empty( $folioposts_array ) ) { ?>

	<script type="text/javascript">    var IE8 = false;</script>
	<!--[if IE 8]>
	<script type="text/javascript">IE8 = true;</script><![endif]-->

	<script type="text/javascript">

		function init_masonry() {

			var $container = jQuery('#masonry');

			$container.imagesLoaded(function () {
				$container.masonry({
					itemSelector: '.box',
					columnWidth: 227,
					gutterWidth: 10
				});
				$container.animate({'opacity': 1}, 700, function () {
					jQuery('#infscr-loading').animate({opacity: 'hide'}, 300);
				});
			});
		}

		jQuery(function () {

			/* ---------------------------------------------------- */
			/* Masonry												*/
			/* ---------------------------------------------------- */

			init_masonry();
			masonry_scroll();

			jQuery(window).scroll(function () {
				if (!IE8) {
					masonry_scroll();
				}
			});

		});

		var test_post_key = 0;

		function masonry_scroll(by_button) {

			if (by_button === undefined) {
				by_button = false;
			}

			if ((jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()) || by_button == true) {
				jQuery('div#masonryjaxloader').show();
				var loader = jQuery('#masonryjaxloader'),
					post_key = loader.data('next-post-key'),
					slideup = loader.data('slideup'),
					posts = loader.data('posts'),
					col_algoritm = loader.data('col-algoritm'),
					icons_type = loader.data('icons');

				if (post_key > 0) {

					jQuery('#masonry').masonry('reload');


					jQuery('#infscr-loading').animate({opacity: 'show'}, 300);
					var data = {
						action: "folio_get_masonry_piece",
						post_key: post_key,
						posts: posts,
						current_col_algoritm: col_algoritm,
						slideup: slideup,
						icons: icons_type
					};

					if (test_post_key != post_key) {

						jQuery.post(ajaxurl, data, function (response) {

							jQuery('#masonryjaxloader').replaceWith(response);
							jQuery('#masonry').masonry('reload');

							jQuery('.masonry').effect({
								effect: 'translateEffect',
								speed: 200,
								afterCall: function (el) {
									jQuery(el).masonry('reload');
								}
							});

							jQuery('#infscr-loading').hide(400);
							jQuery('#masonry a').each(function () {
								var this_menu_link = jQuery(this).attr('href');
								if ((this_menu_link != "#") && (this_menu_link != undefined)) {
									this_menu_link = this_menu_link.split('/');
									if (this_menu_link['4'] != undefined) {
										this_menu_link = this_menu_link['4'];
										var data_type = this_menu_link.split('=');
										var data_id = data_type['1'];
										if (data_type['0'] == '?post_type') {
											data_id = data_type['2'];
											data_type = data_type['1'];
											data_type = data_type.split('&');
											data_type = data_type['0'];
										}
										else {
											data_type = data_type['0'];
											data_type = data_type.slice(1);
										}
										jQuery(this).attr('data-type', data_type);
										jQuery(this).attr('data-id', data_id);
										if (data_id == undefined) {
											jQuery(this).attr('data-load', false);
										}
									}
									else {
										jQuery(this).attr('data-load', false);
									}
								}
								else {
									jQuery(this).attr('data-load', false);
								}
							});

							jQuery(".single-image.video-icon").click(function () {
								jQuery.fancybox({
									'padding': 0,
									'autoScale': false,
									'transitionIn': 'none',
									'transitionOut': 'none',
									'title': this.title,
									'width': '70%',
									'height': '70%',
									'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
									'type': 'swf',
									'swf': {
										'wmode': 'transparent',
										'allowfullscreen': 'true'
									}
								});
								return false;
							});

							jQuery(".single-image.video-icon.vimeo").click(function () {
								jQuery.fancybox({
									'padding': 0,
									'autoScale': false,
									'transitionIn': 'none',
									'transitionOut': 'none',
									'title': this.title,
									'width': '70%',
									'height': '70%',
									'href': this.href.replace(new RegExp("([0-9])", "i"), 'moogaloop.swf?clip_id=$1'),
									'type': 'swf',
									'swf': {
										'wmode': 'transparent',
										'allowfullscreen': 'true'
									}
								});
								return false;
							});

							jQuery('#masonry').masonry('reload');

						});
						test_post_key = post_key;
					}
				} else {
					jQuery('#masonryjaxloader').remove();
					jQuery('.masonry_view_more_button').remove();
					jQuery('#infscr-loading').hide();
				}
			}
		}

		/* end Masonry */

	</script>

<?php } ?>

	<div id="masonry" class="masonry" style="opacity: 0;" data-listing-page-id="<?php echo get_the_ID(); ?>">
		<?php if ( ! empty( $images ) ): ?>
			<?php foreach ( $images as $image ): ?>
				<?php
				$col = $current_col_algoritm_arr[ $counter ];
				$counter ++;
				if ( $counter >= count( $current_col_algoritm_arr ) ) {
					$counter = 0;
				}

				$p = $image['imgurl'];
				preg_match( '#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $p, $matches );
				if ( isset( $matches[2] ) && $matches[2] != '' ) {
					$youtubecode = $matches[2];
					$video_icon  = 'video-icon';
					$ip          = $image['imgurl2'];
					if ( empty( $ip ) ) {
						$th_url = '	https://img.youtube.com/vi/' . $youtubecode . '/default.jpg';
					} else {
						$th_url = $ip;
					}
				} else {
					$vimeo = substr_count( $p, 'vimeo' );
					if ( $vimeo != '0' ) {
						$video_icon = 'video-icon vimeo';
						$ip         = $image['imgurl2'];
						if ( empty( $ip ) ) {
							$arr = parse_url( $image['imgurl'] );
							$xml = simplexml_load_file( 'https://vimeo.com/api/v2/video' . $arr['path'] . '.xml' );
							if ( $xml ) {
								$th_url = (string) $xml->video->thumbnail_medium;
							}
						} else {
							$th_url = $ip;
						}
					} else {
						$video_icon = '';
						$th_url     = $p;
					}
				}
				?>
				<article class="box <?php echo $effect_class; ?> <?php echo $col ?>">

					<div class="project-thumb animTop <?php if ( ! $folio_slide_up )
						echo 'links' ?>">

						<a href="<?php echo $image['imgurl'] ?>"
						   class="single-image plus-icon <?php echo $icon_class ?> <?php echo $video_icon ?>"
						   title="<?php echo $t = ( ( TMM::get_option( 'hide_image_titles' ) ) == '0' ) ? $image['title'] : '' ?>"
						   data-fancybox-group="masonry">
							<img alt="<?php echo $image['title'] ?>" <?php if ( $folio_slide_up ) {
								echo 'class="slideup"';
							} ?>
							     src="<?php echo TMM_Helper::resize_image( $th_url, $columns_img_sizes[ $col ] ) ?>">
						</a>

						<?php
						$post_id = $image['id'];
						if ( function_exists( 'icl_object_id' ) ) {
							$post_id = icl_object_id( $post_id, 'folio', false, ICL_LANGUAGE_CODE );
						}
						?>

						<?php if ( $folio_slide_up ) { ?>
							<a href="<?php echo $title_href = ( ! empty( $image['title_href'] ) ) ? $image['title_href'] : get_permalink( $post_id ); ?>" class="project-meta">
								<h6 class="title"><?php echo str_replace( '^', '<br />', $image['title'] ) ?></h6>
                                <span class="categories"><?php echo strip_tags( get_the_term_list( $image['id'], 'foliocat', '', ' / ', '' ) ); ?></span>
							</a>
						<?php } elseif ( $icons_type == '2' ) { ?>
							<a class="gr-link single-image link-icon" href="<?php echo $title_href = ( ! empty( $image['title_href'] ) ) ? $image['title_href'] : get_permalink( $post_id ); ?>"></a>
						<?php } ?>

					</div>
					<!--/ .project-thumb-->

				</article><!--/ .box-->

			<?php endforeach; ?>

			<?php if ( ! empty( $folioposts_array ) ): ?>
				<div id="masonryjaxloader" data-slideup="<?php echo $folio_slide_up; ?>"
				     data-icons="<?php echo $icons_type ?>" data-next-post-key="1"
				     data-posts="<?php echo $folioposts ?>"
				     data-col-algoritm="<?php echo $current_col_algoritm ?>"></div>
			<?php endif; ?>

		<?php endif; ?>

	</div><!--/ #masonry-->

	<div id="infscr-loading">
		<span></span>
	</div>
<?php
if ( count( $folioposts_array ) > 1 ) {
	?>
	<a href="javascript:masonry_scroll(true);void(0);"
	   class="masonry_view_more_button"><?php esc_html_e( 'More', 'tmm_shortcodes' ); ?></a>
	<?php
}
wp_reset_query();
