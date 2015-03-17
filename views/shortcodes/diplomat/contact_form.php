<?php
if (!defined('ABSPATH')) exit;

$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
$unique_id = uniqid();

$countries = TMM_Contact_Form::get_countries();
$states = TMM_Contact_Form::get_states();

if (!empty($contact_form['inputs'])) {

	wp_enqueue_script("tmm_shortcode_contact_form_js", TMM_CC_URL . '/js/shortcodes/contact_form.js');
	?>

	<form method="post" class="contact-form" enctype="multipart/form-data">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />

        <?php
        foreach ($contact_form['inputs'] as $key => $input){

            $name = $input['type'] . $key;

            switch ($input['type']) {
                case "email":
                    ?>
					<p class="input-block type-input">
                        <input id="email_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                    </p>
                    <?php
                    break;

                case "textinput":
                    ?>
                    <p class="input-block type-input">
                        <input id="name_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                    </p>
                    <?php
                    break;

	            case "website":
		            ?>
		            <p class="input-block type-input">
			            <input id="url_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
		            </p>
		            <?php
		            break;

                case "checkbox":

	                $checkbox_items = explode(",", $input['options']);

					if (!empty($input['label'])) {
						?>

						<h2 class="info-title"><?php echo $input['label']; ?></h2>

						<?php
					}

	                if (!empty($checkbox_items)) {
		                
		                foreach ($checkbox_items as $key => $item) {
			                $item_id = uniqid();
			                ?>

		                    <p class="tmmFormStyling form-checkbox">
				                <input id="cb_<?php echo $item_id ?>" type="checkbox" <?php echo($input['is_required'] ? "required" : "") ?> name="<?php echo $name ?>[]" value="cb_<?php echo $key ?>" class="tmm-checkbox" />
				                <label for="cb_<?php echo $item_id ?>"><?php echo $item ?></label>
		                    </p>

		                    <?php
		                }

	                }

	                if ($input['optional_field']) {
		                ?>

		                <h3 class="form-title"><?php _e('Other', TMM_THEME_TEXTDOMAIN); ?></h3>
		                <p class="tmmFormStyling form-textarea">
			                <textarea name="<?php echo $name ?>[]"></textarea>
		                </p>

	                    <?php
	                }

                    break;

                case "radio":

                    $radio_items = explode(",", $input['options']);

	                if (!empty($input['label'])) {
		                ?>

		                <h2 class="info-title"><?php echo $input['label']; ?></h2>

	                    <?php
	                }

                    if (!empty($radio_items)) {

	                    foreach ( $radio_items as $item ) {
		                    $item_id = uniqid();
		                    ?>

		                    <p class="tmmFormStyling form-radio">
			                    <input id="cb_<?php echo $item_id ?>" type="radio" name="<?php echo $name ?>" value="<?php echo $item ?>" class="tmm-radio" <?php echo($input['is_required'] ? "required" : "") ?> />
			                    <label for="cb_<?php echo $item_id ?>"><?php echo $item ?></label>
		                    </p>

	                    <?php }

                    }
                    break;

                case "select":
                    $select_options = explode(",", $input['options']);
                    ?>
                    <p class="tmmFormStyling form-select">
                        <select id="select_<?php echo $unique_id ?>" name="<?php echo $name ?>"<?php echo($input['is_required'] ? " required" : "") ?>>
                            <?php
                            if (!empty($input['label'])) {
	                            ?>

	                            <option value="0"><?php echo $input['label'] . ($input['is_required'] ? ' *' : ''); ?></option>

	                            <?php
                            }

                            if (!empty($select_options)) {

	                            foreach ($select_options as $value) {
		                            ?>

                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>

                                    <?php
	                            }

                            }
                            ?>
                        </select>
                    </p>
                    <?php
                    break;

	            case "location":

		            if (!empty($input['label'])) {
			            ?>

			            <h2 class="info-title"><?php echo $input['label']; ?></h2>

		                <?php
		            }
		            ?>

		            <p class="tmmFormStyling form-select">
			            <select id="country_<?php echo $unique_id ?>" class="tmm-country-select" name="<?php echo $name ?>[country]"<?php echo($input['is_required'] ? " required" : "") ?>>
				            <?php
				            if (!empty($input['label'])) {
					            ?>

					            <option value="0"><?php echo $input['label'] . ($input['is_required'] ? ' *' : ''); ?></option>

				            <?php
				            }

				            foreach ($countries as $country_code => $country_name ) {
					            ?>

					            <option <?php selected($country_code, 'US'); ?> value="<?php echo $country_code; ?>"><?php echo $country_name; ?></option>

				                <?php
				            }
				            ?>
			            </select>
		            </p>

		            <p class="input-block type-input">
			            <input id="city_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>[city]" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('City ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
		            </p>

		            <div class="row">

			            <div class="large-6 columns">
				            <p class="tmmFormStyling form-select">
					            <select id="state_<?php echo $unique_id ?>" class="tmm-state-select" name="<?php echo $name ?>[state]"<?php echo($input['is_required'] ? " required" : "") ?>>
						            <?php
						            foreach ($states as $state_code => $state_name ) {
							            ?>

							            <option value="<?php echo $state_code; ?>"><?php echo $state_name; ?></option>

						                <?php
						            }
						            ?>
					            </select>
				            </p>

				            <p class="input-block type-input" style="display: none;">
					            <input id="county_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="hidden" class="tmm-county-input" name="<?php echo $name ?>[county]" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('County ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
				            </p>
			            </div>

			            <div class="large-6 columns">
				            <p class="input-block type-input">
					            <input id="zip_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>[zip]" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('Zip Code ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
				            </p>
			            </div>

		            </div>

		            <?php
		            break;

	            case 'messagebody':
	                if (empty($name)) {
		                $name = "messagebody";
	                }
	                ?>
	                <p class="tmmFormStyling form-textarea">
		                <textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> name="<?php echo $name ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" ><?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?></textarea>
	                </p>
                    <?php
	                break;

	            case 'title':
		            ?>
		            <<?php echo $input['title_heading']; ?> class="info-title"><?php echo $input['label']; ?></<?php echo $input['title_heading']; ?>>
					<?php
		            break;

                default:
                    break;
            }

        } ?>

		<div class="clear"></div>

        <?php if ($contact_form['has_capture']){ ?>

            <p class="tmmFormStyling form-captcha">
                <?php $hash = md5(time()); ?>
                <img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="54" width="72" />
	            <input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
            </p>

        <?php } ?>

        <p class="tmmFormStyling form-submit">
	        <button class="button middle <?php echo $contact_form['submit_button'] ?>" type="submit"><?php echo ($contact_form['submit_button_text']) ? $contact_form['submit_button_text'] : '<i class="icon-paper-plane-2"></i>'?></button>
        </p>

		<div class="contact_form_responce" style="display: none;"><ul></ul></div>

	</form>

	<div class="clear"></div>

	<?php
}
?>
