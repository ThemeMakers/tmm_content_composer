<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//contact form on front by shortcode
$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
wp_enqueue_script("tmm_cc_front");

$unique_id=  uniqid();
//output fields
if (!empty($contact_form['inputs'])) {
	?>
	<form method="post" class="contact-form">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

		<?php foreach ($contact_form['inputs'] as $input) : ?>

			<?php
			$name = strtolower(trim($input['label']));
			$name = str_replace(" ", "_", $name);
			$pattern = "/[^a-zA-Z0-9_]+/i";
			$name = preg_replace($pattern, "", $name);
			//***

			switch ($input['type']) {
				case "email":
					?>
					<p>
						<input id="email_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? 'required=""' : '') ?> placeholder="<?php echo($input['is_required'] ? $input['label'] . ' *' : $input['label']) ?>" type="email" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "textinput":
					?>
					<p>
						<input id="name_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? 'required=""' : '') ?> placeholder="<?php echo($input['is_required'] ? $input['label'] . ' *' : $input['label']) ?>" type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "subject":
					?>
					<p>
						<input id="url_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? 'required=""' : '') ?> placeholder="<?php echo($input['is_required'] ? $input['label'] . ' *' : $input['label']) ?>" type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" />
					</p>
					<?php
					break;

				case "messagebody":
					if (empty($name)) {
						$name = "messagebody";
					}
					?>
					<p>
						<textarea <?php echo($input['is_required'] ? 'required=""' : '') ?> placeholder="<?php echo($input['is_required'] ? $input['label'] . ' *' : $input['label']) ?>" name="<?php echo $name ?>"><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
					</p>
					<?php
					break;

				case "select":
					$select_options = explode(",", $input['options']);
					?>
					<p>
						<select <?php echo($input['is_required'] ? 'required=""' : '') ?> id="url_<?php echo $unique_id ?>" name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<option selected="" value=""><?php echo($input['is_required'] ? $input['label'] . ' *' : $input['label']) ?></option>
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
			?>

		<?php endforeach; ?>

		<?php if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<?php $hash = md5(time()); ?>
				<img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="40" width="72" />
				<input type="text" value="" name="verify" class="verify" />
				<input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
			</p><!--/ .row-->

		<?php endif; ?>

		<button class="button <?php echo $contact_form['submit_button'] ?> small" type="submit"><?php esc_html_e('Submit', 'tmm_content_composer'); ?></button>

	</form>
	<div class="contact_form_responce" style="display: none;"><ul></ul></div>

	<?php
}
?>
<div class="clear"></div>

