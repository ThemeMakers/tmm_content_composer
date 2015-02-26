<?php
if (!defined('ABSPATH')) exit;

$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
$unique_id = uniqid();


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
					<fieldset class="input-block type-input">
                        <input id="email_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                    </fieldset>
                    <?php
                    break;

                case "textinput":
                    ?>
                    <fieldset class="input-block type-input">
                        <input id="name_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                    </fieldset>
                    <?php
                    break;

	            case "website":
		            ?>
		            <fieldset class="input-block type-input">
			            <input id="url_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
		            </fieldset>
		            <?php
		            break;

                case "checkbox":
	                $unique_id = uniqid();
                    ?>
                    <fieldset class="checkbox">
                        <input id="cb_<?php echo $unique_id ?>" type="checkbox" name="<?php echo $name ?>" value="0" class="contact_form_option_checkbox" />
	                    <label for="cb_<?php echo $unique_id ?>"><?php echo $input['label'] ?></label>
                    </fieldset>
                    <?php
                    break;

                case "radio":
                    $radio_items = explode(",", $input['options']);
                    if (!empty($radio_items)):
                        ?>
                        <fieldset class="input-block">

                            <?php foreach ($radio_items as $item) : ?>
                                <label>
                                    <input type="radio" name="<?php echo $name ?>" value="<?php echo $item ?>" />&nbsp;<?php echo $item ?>
                                </label>
                            <?php endforeach; ?>

                        </fieldset>
                        <?php
                    endif;
                    break;

                case "select":
                    $select_options = explode(",", $input['options']);
                    ?>
                    <fieldset class="input-block">
                        <select id="url_<?php echo $unique_id ?>" name="<?php echo $name ?>"<?php echo($input['is_required'] ? " required" : "") ?>>
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
                    </fieldset>
                    <?php
                    break;

                case 'messagebody':
	                if (empty($name)) {
		                $name = "messagebody";
	                }
	                ?>
	                <fieldset class="input-block">
		                <textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> name="<?php echo $name ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" ><?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?></textarea>
	                </fieldset>
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

            <p class="input-block">
                <?php $hash = md5(time()); ?>
                    <img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="54" width="72" /><input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
            </p><!--/ .row-->

        <?php } ?>

        <fieldset>
	        <button class="button middle <?php echo $contact_form['submit_button'] ?>" type="submit"><?php echo ($contact_form['submit_button_text']) ? $contact_form['submit_button_text'] : '<i class="icon-paper-plane-2"></i>'?></button>
        </fieldset>

		<div class="contact_form_responce" style="display: none;"><ul></ul></div>

	</form>

	<div class="clear"></div>

	<?php
}
?>
