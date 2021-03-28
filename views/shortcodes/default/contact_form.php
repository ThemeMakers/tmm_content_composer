<?php if (!defined('ABSPATH')) die('No direct access allowed');

wp_enqueue_script('tmm_composer_front');

//contact form on front by shortcode
if(isset($form_content)){
	$form_name = $form_content;
} else {
	$form_name = $content;
}

$contact_form = TMM_Contact_Form::get_form($form_name);

$unique_id = uniqid();

if (!isset($dont_fill_inputs)) {
	$dont_fill_inputs = true;
}

//output fields
if (!empty($contact_form['inputs'])) {
	?>
	<form method="post" class="contact-form" noValidate>

		<input type="hidden" name="contact_form_name" value="<?php echo esc_attr( $form_name ) ?>" />

		<?php if(isset($car_id)): ?>
			<input type="hidden" name="car_id" value="<?php echo esc_attr( $car_id ) ?>" />
		<?php endif; ?>

		<?php foreach ($contact_form['inputs'] as $key => $input) : ?>

			<?php
			$name = $input['type'] . $key;

			switch ($input['type']) {

				case "email":
					?>
					<p class="input-block">
						<label for="email_<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e($input['label'], 'tmm_content_composer'); ?><?php echo wp_kses_post($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="email_<?php echo esc_attr( $unique_id ) ?>"<?php echo esc_attr($input['is_required'] ? " required" : "") ?> type="email" name="<?php echo esc_attr( $name ) ?>" value="<?php echo esc_attr(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "textinput":
					?>
					<p class="input-block">
						<label for="name_<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e($input['label'], 'tmm_content_composer'); ?><?php echo wp_kses_post($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="name_<?php echo esc_attr( $unique_id ) ?>"<?php echo esc_attr($input['is_required'] ? " required" : "") ?> type="text" name="<?php echo esc_attr( $name ) ?>" value="<?php echo esc_attr(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "checkbox":
					?>
					<p class="input-block">
						<input id="chck_<?php echo esc_attr( $unique_id ) ?>" type="checkbox" name="<?php echo esc_attr( $name ) ?>" />
						<label for="chck_<?php echo esc_attr( $unique_id ) ?>"><?php echo wp_kses_post($input['label'], 'tmm_content_composer'); ?></label>
					</p>
					<?php
					break;

				case "website":
					?>
					<p class="input-block">
						<label for="url_<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e($input['label'], 'tmm_content_composer'); ?><?php echo wp_kses_post($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="url_<?php echo esc_attr( $unique_id ) ?>"<?php echo esc_attr($input['is_required'] ? " required" : "") ?> type="url" name="<?php echo esc_attr( $name ) ?>" value="<?php echo esc_attr(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "messagebody":
					if (empty($name)) {
						$name = "messagebody";
					}
					?>
					<p class="input-block">
						<label for="message_<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e($input['label'], 'tmm_content_composer'); ?><?php echo wp_kses_post($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<textarea id="message_<?php echo esc_attr( $unique_id ) ?>" <?php echo esc_attr($input['is_required'] ? " required" : "") ?> name="<?php echo esc_attr( $name ) ?>"><?php echo esc_attr(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
					</p>
					<?php
					break;

				case "select":
					$select_options = explode(",", $input['options']);
					?>
					<p class="input-block">
						<label for="sel_<?php echo esc_attr( $unique_id ) ?>"><?php esc_html_e($input['label'], 'tmm_content_composer'); ?><?php echo wp_kses_post($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<select id="sel_<?php echo esc_attr( $unique_id ) ?>" name="<?php echo esc_attr( $name ) ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo esc_attr( $value ) ?>"><?php esc_html_e($value, 'tmm_content_composer'); ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</p>
					<?php
					break;
				default:
					break;
			}
			?>

		<?php endforeach; ?>

	<?php if ($contact_form['has_capture']): ?>
		<div class="row">
			<div class="col-md-12"><label><?php esc_html_e('Are you human?', 'tmm_content_composer'); ?></label></div>
		</div>
	<?php endif; ?>
		<div class="row">
		<?php if ($contact_form['has_capture']): ?>
			<div class="col-xs-6">
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo esc_url(get_template_directory_uri()); ?>/helper/capcha/image.php?hash=<?php echo esc_attr( $hash ) ?>" height="28" width="72" alt="CAPTCHA image" />
				<input type="text" value="" name="verify" class="verify" />
				<input type="hidden" name="verify_code" value="<?php echo esc_attr( $hash ) ?>" />
			</div>
		<?php endif; ?>
			<div class="<?php echo esc_attr($contact_form['has_capture']) ? 'col-xs-6 align-right' : 'col-md-12' ?> ">
				<button class="lc-button <?php echo esc_attr($contact_form['submit_button']) ?> medium" type="submit"><?php esc_html_e($contact_form['submit_button_text'], 'tmm_content_composer'); ?></button>
			</div>
		</div>

	</form>

<?php
}
?>