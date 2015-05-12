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
					</p>
					<?php
					break;

				case "textinput":
					?>
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
					</p>
					<?php
					break;

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
					</p>
					<?php
					break;

				case "messagebody":
					if (empty($name)) {
						$name = "messagebody";
					}
					?>
					<p class="message-form-message">
						<textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> placeholder="<?php echo $input['label'] . ($input['is_required'] ? ' * ' : '') ?>" name="<?php echo $name ?>"><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
					</p>
					<?php
					break;

				case "select":
					$select_options = explode(",", $input['options']);
					?>
					<p>
						<label for="url_<?php echo $unique_id ?>">
							<?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required"> * </span><i>(' . __('required', TMM_CC_TEXTDOMAIN) . ')</i>' : '') ?>
						</label>
						<select id="url_<?php echo $unique_id ?>" name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</p>
					<?php
					break;
				default:
					break;
			}
			
		}
		
		if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="27" width="72" /><input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
			</p><!--/ .row-->

		<?php endif; ?>

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

<div class="clear"></div>

