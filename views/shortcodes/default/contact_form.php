<<<<<<< HEAD
<?php
$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
wp_enqueue_script("tmm_shortcode_contact_form_js", TMM_CC_URL . '/js/shortcodes/contact_form.js');

$unique_id = uniqid();

if (!empty($contact_form['inputs'])) {
	?>

	<form method="post" class="contact-form" enctype="multipart/form-data">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

		<?php
		foreach ($contact_form['inputs'] as $key => $input) {
			
			$name = $input['type'] . $key;

			switch ($input['type']) {
				case "email":
					?>
					<p class="message-form-email">
						<label for="email_<?php echo $unique_id ?>">
							<?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required"> * </span><i>(' . __('required', TMM_CC_TEXTDOMAIN) . ')</i>' : '') ?>
						</label>
							<input id="email_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
=======
<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
wp_enqueue_script('tmm_composer_front');

//contact form on front by shortcode
if(isset($form_content)){
	$form_name = $form_content;
}else{
	$form_name = $content;
}

$contact_form = TMM_Contact_Form::get_form($form_name);

$unique_id=  uniqid();

if (!isset($dont_fill_inputs)) {
	$dont_fill_inputs = true;
}

//output fields
if (!empty($contact_form['inputs'])) {
	?>
	<form method="post" class="contact-form">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

		<?php if(isset($car_id)): ?>
			<input type="hidden" name="car_id" value="<?php echo $car_id ?>" />
		<?php endif; ?>

		<?php foreach ($contact_form['inputs'] as $key => $input) : ?>

			<?php
			$name = $input['type'] . $key;

			switch ($input['type']) {

				case "email":
					?>
					<p class="input-block">
						<label for="email_<?php echo $unique_id ?>"><?php _e($input['label'], TMM_CC_TEXTDOMAIN); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="email_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
					</p>
					<?php
					break;

				case "textinput":
					?>
<<<<<<< HEAD
					<p class="message-form-name">
						<label for="name_<?php echo $unique_id ?>">
							<?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required"> * </span><i>(' . __('required', TMM_CC_TEXTDOMAIN) . ')</i>' : '') ?>
						</label>
							<input id="name_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;


				case "checkbox":
					?>
					<p class="message-form-checkbox">
						<label>
							<input type="checkbox" name="<?php echo $name ?>" value="0" class="contact_form_option_checkbox" /><?php echo $input['label'] ?>
						</label>
=======
					<p class="input-block">
						<label for="name_<?php echo $unique_id ?>"><?php _e($input['label'], TMM_CC_TEXTDOMAIN); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="name_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
					</p>
					<?php
					break;

<<<<<<< HEAD
				case "radio":
					$radio_items = explode(",", $input['options']);
					if (!empty($radio_items)):
						?>
						<p class="message-form-radio">

							<?php foreach ($radio_items as $item) : ?>
								<label>
									<input type="radio" name="<?php echo $name ?>" value="<?php echo $item ?>" />&nbsp;<?php echo $item ?>
								</label>
							<?php endforeach; ?>

						</p>
						<?php
					endif;
					break;

				case "website":
					?>
					<p class="message-form-url">
						<label for="url_<?php echo $unique_id ?>">
							<?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required"> * </span><i>(' . __('required', TMM_CC_TEXTDOMAIN) . ')</i>' : '') ?>
						</label>
							<input id="url_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
=======
				case "website":
					?>
					<p class="input-block">
						<label for="url_<?php echo $unique_id ?>"><?php _e($input['label'], TMM_CC_TEXTDOMAIN); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<input id="url_<?php echo $unique_id ?>"<?php echo($input['is_required'] ? " required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
					</p>
					<?php
					break;

				case "messagebody":
					if (empty($name)) {
						$name = "messagebody";
					}
					?>
<<<<<<< HEAD
					<p class="message-form-message">
						<textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> placeholder="<?php echo $input['label'] . ($input['is_required'] ? ' * ' : '') ?>" name="<?php echo $name ?>"><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
=======
					<p class="input-block">
						<label for="message_<?php echo $unique_id ?>"><?php _e($input['label'], TMM_CC_TEXTDOMAIN); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? " required" : "") ?> name="<?php echo $name ?>"><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
					</p>
					<?php
					break;

				case "select":
					$select_options = explode(",", $input['options']);
					?>
<<<<<<< HEAD
					<p>
						<label for="url_<?php echo $unique_id ?>">
							<?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required"> * </span><i>(' . __('required', TMM_CC_TEXTDOMAIN) . ')</i>' : '') ?>
						</label>
						<select id="url_<?php echo $unique_id ?>" name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
=======
					<p class="input-block">
						<label for="sel_<?php echo $unique_id ?>"><?php _e($input['label'], TMM_CC_TEXTDOMAIN); ?><?php echo($input['is_required'] ? ': <span class="required">*</span>' : '') ?></label>
						<select id="sel_<?php echo $unique_id ?>" name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo $value; ?>"><?php _e($value, TMM_CC_TEXTDOMAIN); ?></option>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</p>
					<?php
					break;
				default:
					break;
			}
<<<<<<< HEAD
			
		}
		
		if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="27" width="72" /><input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
=======
			?>

		<?php endforeach; ?>

		<?php if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<label><?php _e('Are you human?', TMM_CC_TEXTDOMAIN); ?></label>
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="29" width="72" alt="" />
				<input type="text" value="" name="verify" class="verify" />
				<input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
			</p><!--/ .row-->

		<?php endif; ?>

<<<<<<< HEAD
		<?php if ($contact_form['has_attach']): ?>
			<?php if ((is_user_logged_in() AND ($contact_form['attach_only_logged_in'] OR !$contact_form['attach_only_logged_in'])) OR (!is_user_logged_in() AND !$contact_form['attach_only_logged_in'])): ?>
				<?php wp_enqueue_script('js_http_request', TMM_THEME_URI . '/helper/js_http_request/JsHttpRequest.js'); ?>
				<a href="#" class="button default small contact_form_add_attach" data-max-items="<?php echo $contact_form['attach_count'] ?>"><?php _e('Add file', TMM_CC_TEXTDOMAIN); ?></a>
				<ul id="list_attach_<?php echo $unique_id ?>" class="contact_form_attach_list"></ul>

				<div class="desc-max-file">
					<i><?php _e('Max file size', TMM_CC_TEXTDOMAIN); ?>:&nbsp;<?php echo $contact_form['attach_item_max_weight'] ?>MB</i>
					<i><?php _e('Max file count', TMM_CC_TEXTDOMAIN); ?>:&nbsp;<?php echo $contact_form['attach_count'] ?></i>
				</div>

			<?php endif; ?>
		<?php endif; ?>


		<p>
			<button class="button <?php echo $contact_form['submit_button'] ?> medium" type="submit"><?php if (isset($contact_form['submit_button_text']) && !empty($contact_form['submit_button_text'])): ?><?php echo $contact_form['submit_button_text'] ?><?php else: ?><?php _e('Submit', TMM_CC_TEXTDOMAIN); ?><?php endif; ?> &rarr;</button>
		</p>


		<div class="contact_form_responce" style="display: none;"><ul></ul></div>
	</form>

	<?php
}
?>

=======
		<p class="input-block">
			<button class="button <?php echo $contact_form['submit_button'] ?> medium" type="submit"><?php _e($contact_form['submit_button_text'], TMM_CC_TEXTDOMAIN); ?></button>
		</p>

	</form>
	<div class="contact_form_responce" style="display: none;"><ul></ul></div>

<?php
}
?>
>>>>>>> 8d00ba59b51362d63fac8bbfa1b6eeee98d1bbaa
<div class="clear"></div>

