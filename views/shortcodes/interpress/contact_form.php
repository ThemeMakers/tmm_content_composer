<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//contact form on front by shortcode
$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);

$unique_id = uniqid();

if (!isset($dont_fill_inputs)) {
	$dont_fill_inputs = true;
}

//output fields
if (!empty($contact_form['inputs'])) {
	?>

	<form method="post" class="lc-contact-form" enctype="multipart/form-data">

		<input type="hidden" name="contact_form_name" value="<?php echo esc_attr($form_name) ?>" />

            <?php
            foreach ($contact_form['inputs'] as $key => $input){

                $name = $input['type'] . $key;

                switch ($input['type']) {
                    case "email":
                        ?>
                        <p class="input-block type-input">
                            <input id="email_<?php echo esc_attr($unique_id) ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="email" name="<?php echo esc_attr($name) ?>" value="<?php echo(!empty($_POST) ? esc_attr($dont_fill_inputs) ? "" : esc_attr($_POST[$name]) : "") ?>" placeholder="<?php echo esc_attr($input['label']) ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                        </p>
                        <?php
                        break;

                    case "textinput":
                        ?>
                        <p class="input-block type-input">
                            <input id="name_<?php echo esc_attr($unique_id) ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo esc_attr($name) ?>" value="<?php echo(!empty($_POST) ? esc_attr($dont_fill_inputs) ? "" : esc_attr($_POST[$name]) : "") ?>" placeholder="<?php echo esc_attr($input['label']) ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                        </p>
                        <?php
                        break;


                    case "checkbox":
                        ?>
                        <p class="input-block">
                            <input type="checkbox" name="<?php echo $name ?>" value="0" class="contact_form_option_checkbox" /><?php echo esc_html($input['label']) ?>
                        </p>
                        <?php
                        break;

                    case "radio":
                        $radio_items = explode(",", $input['options']);
                        if (!empty($radio_items)):
                            ?>
                            <p class="input-block">

                                <?php foreach ($radio_items as $item) : ?>
                                    <label>
                                        <input type="radio" name="<?php echo esc_attr($name) ?>" value="<?php echo esc_attr($item) ?>" />&nbsp;<?php echo esc_html($item) ?>
                                    </label>
                                <?php endforeach; ?>

                            </p>
                            <?php
                        endif;
                        break;

                    case "website":
                        ?>
                        <p class="input-block type-input">
                            <input id="url_<?php echo esc_attr($unique_id) ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="url" name="<?php echo esc_attr($name) ?>" value="<?php echo(!empty($_POST) ?  esc_attr($dont_fill_inputs) ? "" : esc_attr($_POST[$name]) : "") ?>" placeholder="<?php echo esc_attr($input['label']) ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                        </p>
                        <?php
                        break;

                    case "select":
                        $select_options = explode(",", $input['options']);
                        ?>
                        <p class="input-block sel">
                            <label for="url_<?php echo esc_attr($unique_id) ?>"><?php echo esc_html($input['label']) ?><?php echo($input['is_required'] ? ': <span class="required">(' . __('required', 'tmm_content_composer') . ')</span>' : '') ?></label>
                            <select id="url_<?php echo esc_attr($unique_id) ?>" name="<?php echo esc_attr($name) ?>">
                                <?php if (!empty($select_options)): ?>
                                    <?php foreach ($select_options as $value) : ?>
                                        <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($value); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </p>
                        <?php
                        break;
                    default:
                        break;
                }
            } ?>

                <?php foreach ($contact_form['inputs'] as $key => $input){

                    $name = $input['type'] . $key;

                    if ($input['type']=='messagebody'){
                        ?>
                        <?php

                        if (empty($name)) {
                            $name = "messagebody";
                        }
                        ?>
                            <p class="input-block">
                                <textarea id="message_<?php echo esc_attr($unique_id) ?>" <?php echo($input['is_required'] ? "required" : "") ?> name="<?php echo esc_attr($name) ?>" placeholder="<?php echo esc_attr($input['label']) ?><?php echo($input['is_required'] ? " *" : "") ?>" ><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
                            </p>
                        <?php
                    }

                }
                ?>
                <?php if ($contact_form['has_capture']){ ?>

                    <p class="captcha">
                        <?php $hash = md5(time()); ?>
                        <img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="40" width="107" /><input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
                    </p><!--/ .row-->

                <?php } ?>
                <p>
                    <button class="button middle default<?php echo !empty($contact_form['submit_button']) ? ' ' . $contact_form['submit_button'] : '' ?>" type="submit"><?php echo ($contact_form['submit_button_text']) ? $contact_form['submit_button_text'] : __('Submit', 'tmm_content_composer')?></button>
                </p>
		<div class="contact_form_responce"><ul></ul></div>
	</form>

	<?php
}
?>