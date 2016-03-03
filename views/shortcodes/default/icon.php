<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
} ?>

<?php
if ( ! isset( $icon_css_class ) ) {
	$icon_css_class = "";
}
if ( ! isset( $icon_size ) ) {
	$icon_size = "";
}
if ( ! isset( $icon_position ) ) {
	$icon_position = "";
}
?>

<div class="lc-iconbox <?php echo esc_attr( $icon_size ) ?> <?php echo esc_attr( $icon_position ) ?>">
	<i class="circle-icon <?php echo esc_attr( $icon_css_class ) ?>"></i>

	<div class="iconbox-entry">
		<?php if ( ! empty( $content ) ) { ?>
			<h3>
				<?php echo esc_html( $content ); ?>
			</h3>
		<?php } ?>

		<?php if ( ! empty( $text ) ) { ?>
			<p>
				<?php echo esc_html( $text ) ?>
			</p>
		<?php } ?>

		<?php if ( ! empty( $url ) ) { ?>
			<a class="read-more" href="<?php echo esc_url( $url ) ?>"><?php esc_html_e( 'read more', 'tmm_content_composer' ) ?></a>
		<?php } ?>

	</div><!--/ .iconbox-entry-->

</div><!--/ .lc-iconbox-->