<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//contact form on front by shortcode
$form_name = $content;
$contact_form = Thememakers_Entity_Contact_Form::get_form($form_name);

//output fields
if (!empty($contact_form['inputs'])) {
	?>
	<form method="post" class="contact-form">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

		<?php foreach ($contact_form['inputs'] as $key => $input) : ?>
			<p class="input-block"><label><span class="required"><?php echo($input['is_required'] ? "*" : "") ?></span><?php echo $input['label'] ?>:</label>

				<?php				
				$name = $input['type'] . $key;

				switch ($input['type']) {
					case "textinput":
					case "email":
					case "subject":
						?>
						<input type="text" name="<?php echo $name ?>" value="" />
						<?php
						break;

					case "messagebody":
						?>
						<textarea name="<?php echo $name ?>"></textarea>
						<?php
						break;

					case "select":
						$select_options = explode(",", $input['options']);
						?>
						<select name="<?php echo $name ?>">
							<?php if (!empty($select_options)): ?>
								<?php foreach ($select_options as $value) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<?php
						break;

					default:
						break;
				}
				?>
			</p>
		<?php endforeach; ?>

		<?php if ($contact_form['has_capture']): ?>

			<p class="input-block">
				<?php $hash = md5(time());?>
				<img class="contact_form_capcha" src="<?php echo TMM_THEME_URI; ?>/admin/extensions/capcha/image.php?hash=<?php echo $hash ?>" height="27" width="72" />
				<input type="text" style="width: 60px; margin: 0 0 0 8px;" value="" size="6" name="verify" class="verify" />
				<input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
			</p><!--/ .row-->

		<?php endif; ?>

		<input type="submit" class="button <?php echo $contact_form['submit_button'] ?> small" value="<?php _e('Submit', TMM_THEME_FOLDER_NAME); ?>" />

	</form>
	<div class="contact_form_responce" style="display: none;"><ul></ul></div>

	<?php
}
?>
<div class="clear"></div>

