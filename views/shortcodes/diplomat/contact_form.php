<?php if (!defined('ABSPATH')) die('No direct access allowed'); ?>
<?php
//contact form on front by shortcode
$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
wp_enqueue_script("tmm_shortcode_contact_form_js", TMM_CC_URL . '/js/shortcodes/contact_form.js');
$unique_id = uniqid();
$form_type = (isset($contact_form['form_type'])) ? $contact_form['form_type'] : 'default';

if (!isset($dont_fill_inputs)) {
	$dont_fill_inputs = true;
}

//output fields
if (!empty($contact_form['inputs'])) {
	?>

	<form method="post" class="contact-form" enctype="multipart/form-data">

		<input type="hidden" name="contact_form_name" value="<?php echo $form_name ?>" />
            
            <?php if ($form_type!='default'){ ?>

                <div class="<?php echo ($form_type=='type2') ? 'full-inputs-block' : 'inputs-block' ?>">
                
            <?php } ?>

                <?php
                foreach ($contact_form['inputs'] as $key => $input){

	                $name = $input['type'] . $key;

                    switch ($input['type']) {
                        case "email":
                            ?>
                            <p class="input-block type-input">
                                <input id="email_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="email" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                            </p>
                            <?php
                            break;

                        case "textinput":
                            ?>
                            <p class="input-block type-input">
                                <input id="name_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                            </p>
                            <?php
                            break;


                        case "checkbox":
                            ?>
                            <p class="input-block">						
                                <input type="checkbox" name="<?php echo $name ?>" value="0" class="contact_form_option_checkbox" /><?php echo $input['label'] ?>						
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
                                            <input type="radio" name="<?php echo $name ?>" value="<?php echo $item ?>" />&nbsp;<?php echo $item ?>
                                        </label>
                                    <?php endforeach; ?>

                                </p>
                                <?php
                            endif;
                            break;

                        case "website":
                            ?>
                            <p class="input-block type-input">
                                <input id="url_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="url" name="<?php echo $name ?>" value="<?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" />
                            </p>
                            <?php
                            break;				

                        case "select":
                            $select_options = explode(",", $input['options']);
                            ?>
                            <p class="input-block">
	                            <label for="url_<?php echo $unique_id ?>"><?php echo $input['label'] ?><?php echo($input['is_required'] ? ': <span class="required">(' . __('required', TMM_CC_TEXTDOMAIN) . ')</span>' : '') ?></label>
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
                } ?>

                <?php if ($form_type!='default'){ ?>

                </div><!--/ .inputs-block-->
                
                <div class="<?php echo ($form_type=='type2') ? 'full-textarea-block' : 'textarea-block' ?>">
                    
                <?php } ?>
                    
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
                                        <textarea id="message_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> name="<?php echo $name ?>" placeholder="<?php echo $input['label'] ?><?php echo($input['is_required'] ? " *" : "") ?>" ><?php echo(!empty($_POST) ? $dont_fill_inputs ? "" : $_POST[$name]  : "") ?></textarea>
                                </p>
                            <?php
                        }
			
                    }
                    ?>
                    <?php if ($contact_form['has_capture']){ ?>

                        <p class="input-block">
                            <?php $hash = md5(time()); ?>
                            <img class="contact_form_capcha" src="<?php echo get_stylesheet_directory_uri(); ?>/helper/capcha/image.php?hash=<?php echo $hash ?>" height="54" width="72" /><input type="text" value="" name="verify" class="verify" /><input type="hidden" name="verify_code" value="<?php echo $hash ?>" />
                        </p><!--/ .row-->

                    <?php } ?>
                    <p>
                        <?php if ($form_type=='type2'){ ?>
                            <button class="button middle <?php echo $contact_form['submit_button'] ?>" type="submit"><?php echo ($contact_form['submit_button_text']) ? $contact_form['submit_button_text'] : '<i class="icon-paper-plane-2"></i>'?></button>
                            <?php
                        }else{
                            ?>
                            <button class="button middle <?php echo $contact_form['submit_button'] ?>" type="submit"><?php echo ($contact_form['submit_button_text']) ? $contact_form['submit_button_text'] : '<i class="icon-paper-plane-2"></i>'?></button>
                            <?php
                        } ?>
			
                    </p>
                
                <?php if ($form_type!='default'){ ?>
                    
                </div><!--/ .textarea-block-->
                
                <?php } ?>		
                                
		<div class="contact_form_responce" style="display: none;"><ul></ul></div>
	</form>


	<?php
}
?>
<div class="clear"></div>

