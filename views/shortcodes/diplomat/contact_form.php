<?php
if (!defined('ABSPATH')) exit;

$form_name = $content;
$contact_form = TMM_Contact_Form::get_form($form_name);
$unique_id = uniqid();

$countries = array(
	'AX' => 'Aland Islands',
	'AL' => 'Albania',
	'DZ' => 'Algeria',
	'AS' => 'American Samoa',
	'AD' => 'Andorra',
	'AO' => 'Angola',
	'AI' => 'Anguilla',
	'AQ' => 'Antarctica',
	'AG' => 'Antigua and Barbuda',
	'AR' => 'Argentina',
	'AM' => 'Armenia',
	'AW' => 'Aruba',
	'AU' => 'Australia',
	'AT' => 'Austria',
	'AZ' => 'Azerbaijan',

	'BS' => 'Bahamas',
	'BH' => 'Bahrain',
	'BD' => 'Bangladesh',
	'BB' => 'Barbados',
	'BE' => 'Belgium',
	'BZ' => 'Belize',
	'BJ' => 'Benin',
	'BM' => 'Bermuda',
	'BT' => 'Bhutan',
	'BO' => 'Bolivia',
	'BA' => 'Bosnia-Herzegovina',
	'BW' => 'Botswana',
	'BV' => 'Bouvet Island',
	'BR' => 'Brazil',
	'IO' => 'British Indian Ocean Territory',
	'BN' => 'Brunei Darussalam',
	'BG' => 'Bulgaria',
	'BF' => 'Burkina Faso',
	'BI' => 'Burundi',

	'KM' => 'Cambodia',
	'CA' => 'Canada',
	'CV' => 'Cape Verde',
	'KY' => 'Cayman Islands',
	'CF' => 'Central African Republic',
	'TD' => 'Chad',
	'CL' => 'Chile',
	'CN' => 'China',
	'CX' => 'Christmas Island',
	'CC' => 'Cocos (Keeling) Islands',
	'CO' => 'Colombia',
	'KM' => 'Comoros',
	'CD' => 'Democratic Republic of Congo',
	'CG' => 'Congo',
	'CK' => 'Cook Islands',
	'CR' => 'Costa Rica',
	'HR' => 'Croatia',
	'CY' => 'Cyprus',
	'CZ' => 'Czech Republic',

	'DK' => 'Denmark',
	'DJ' => 'Djibouti',
	'DM' => 'Dominica',
	'DO' => 'Dominican Republic',

	'EC' => 'Ecuador',
	'EG' => 'Egypt',
	'SV' => 'El Salvador',
	'ER' => 'Eriteria',
	'EE' => 'Estonia',
	'ET' => 'Ethiopia',

	'FK' => 'Falkland Islands (Malvinas)',
	'FO' => 'Faroe Islands',
	'FJ' => 'Fiji',
	'FI' => 'Finland',
	'FR' => 'France',
	'GF' => 'French Guiana',
	'PF' => 'French Polynesia',
	'TF' => 'French Southern Territories',

	'GA' => 'Gabon',
	'GM' => 'Gambia',
	'GE' => 'Georgia',
	'DE' => 'Germany',
	'GH' => 'Ghana',
	'GI' => 'Gibraltar',
	'GR' => 'Greece',
	'GL' => 'Greenland',
	'GD' => 'Grenada',
	'GP' => 'Guadeloupe',
	'GU' => 'Guam',
	'GT' => 'Guatemala',
	'GG' => 'Guernsey',
	'GN' => 'Guinea',
	'GW' => 'Guinea Bissau',
	'GY' => 'Guyana',

	'HM' => 'Heard Island / McDonald Islands',
	'VA' => 'Holy See (Vatican)',
	'HN' => 'Honduras',
	'HK' => 'Hong Kong',
	'HU' => 'Hungary',

	'IS' => 'Iceland',
	'IN' => 'India',
	'ID' => 'Indonesia',
	'IE' => 'Ireland',
	'IM' => 'Isle of Man',
	'IL' => 'Israel',
	'IT' => 'Italy',

	'JM' => 'Jamaica',
	'JP' => 'Japan',
	'JE' => 'Jersey',
	'JO' => 'Jordan',

	'KZ' => 'Kazakhstan',
	'KE' => 'Kenya',
	'KI' => 'Kiribati',
	'KR' => 'Korea, Republic of',
	'KW' => 'Kuwait',
	'KG' => 'Kyrgyzstan',

	'LA' => 'Laos',
	'LV' => 'Latvia',
	'LS' => 'Lesotho',
	'LI' => 'Liechtenstein',
	'LT' => 'Lithuania',
	'LU' => 'Luxembourg',

	'MO' => 'Macao',
	'MK' => 'Macedonia',
	'MG' => 'Madagascar',
	'MW' => 'Malawi',
	'MY' => 'Malaysia',
	'MV' => 'Maldives',
	'ML' => 'Mali',
	'MT' => 'Malta',
	'MH' => 'Marshall Islands',
	'MQ' => 'Martinique',
	'MR' => 'Mauritania',
	'MU' => 'Mauritius',
	'YT' => 'Mayotte',
	'MX' => 'Mexico',
	'FM' => 'Micronesia, Federated States of',
	'MD' => 'Moldova, Republic of',
	'MC' => 'Monaco',
	'MN' => 'Mongolia',
	'ME' => 'Montenegro',
	'MS' => 'Montserrat',
	'MA' => 'Morocco',
	'MZ' => 'Mozambique',

	'NA' => 'Namibia',
	'NR' => 'Nauru',
	'NP' => 'Nepal',
	'NL' => 'Netherlands',
	'AN' => 'Netherlands Antilles',
	'NC' => 'New Calendonia',
	'NZ' => 'New Zealand',
	'NI' => 'Nicaragua',
	'NE' => 'Niger',
	'NU' => 'Niue',
	'NF' => 'Norfolk Island',
	'MP' => 'Northern Mariana Islands',
	'NO' => 'Norway',

	'OM' => 'Oman',

	'PW' => 'Palau',
	'PS' => 'Palestine',
	'PA' => 'Panama',
	'PY' => 'Paraguay',
	'PG' => 'Papua New Guinea',
	'PE' => 'Peru',
	'PH' => 'Philippines',
	'PN' => 'Pitcairn',
	'PL' => 'Poland',
	'PT' => 'Portugal',
	'PR' => 'Puerto Rico',

	'QA' => 'Qatar',

	'RE' => 'Reunion',
	'RO' => 'Romania',
	'RS' => 'Republic of Serbia',
	'RU' => 'Russian Federation',
	'RW' => 'Rwanda',

	'SH' => 'Saint Helena',
	'KN' => 'Saint Kitts and Nevis',
	'LC' => 'Saint Lucia',
	'PM' => 'Saint Pierre and Miquelon',
	'VC' => 'Saint Vincent / Grenadines',
	'WS' => 'Samoa',
	'SM' => 'San Marino',
	'ST' => 'Sao Tome and Principe',
	'SA' => 'Saudi Arabia',
	'SN' => 'Senegal',
	'SC' => 'Seychelles',
	'SL' => 'Sierra Leone',
	'SG' => 'Singapore',
	'SK' => 'Slovakia',
	'SI' => 'Slovenia',
	'SB' => 'Solomon Islands',
	'SO' => 'Somalia',
	'ZA' => 'South Africa',
	'GS' => 'South Georgia / South Sandwich',
	'ES' => 'Spain',
	'LK' => 'Sri Lanka',
	'SR' => 'Suriname',
	'SJ' => 'Svalbard and Jan Mayen',
	'SZ' => 'Swaziland',
	'SE' => 'Sweden',
	'CH' => 'Switzerland',

	'TW' => 'Taiwan, Province of China',
	'TJ' => 'Tajikistan',
	'TZ' => 'Tanzania, United Republic of',
	'TH' => 'Thailand',
	'TL' => 'Timor-Leste',
	'TG' => 'Togo',
	'TK' => 'Tokelau',
	'TO' => 'Tonga',
	'TT' => 'Trinidad and Tobago',
	'TN' => 'Tunisia',
	'TR' => 'Turkey',
	'TM' => 'Turkmenistan',
	'TC' => 'Turks and Caicos Islands',
	'TV' => 'Tuvalu',

	'UG' => 'Uganda',
	'UA' => 'Ukraine',
	'AE' => 'United Arab Emirates',
	'GB' => 'United Kingdom',
	'US' => 'United States',
	'UM' => 'US Minor Outlying Islands',
	'UY' => 'Uruguay',
	'UZ' => 'Uzbekistan',

	'VU' => 'Vanuatu',
	'VE' => 'Venezuela',
	'VN' => 'Vietnam',
	'VG' => 'Virgin Islands, British',
	'VI' => 'Virgin Islands, U.S.',

	'WF' => 'Wallis and Futuna',
	'EH' => 'Western Sahara',

	'YE' => 'Yemen',

	'ZM' => 'Zambia'
);

$states = array(
	'AL' => 'Alabama',
	'AK' => 'Alaska',
	'AS' => 'American Samoa',
	'AZ' => 'Arizona',
	'AR' => 'Arkansas',
	'CA' => 'California',
	'CO' => 'Colorado',
	'CT' => 'Connecticut',
	'DE' => 'Delaware',
	'DC' => 'District of Columbia',
	'FM' => 'Federated States of Micronesia',
	'FL' => 'Florida',
	'GA' => 'Georgia',
	'GU' => 'Guam',
	'HI' => 'Hawaii',
	'ID' => 'Idaho',
	'IL' => 'Illinois',
	'IN' => 'Indiana',
	'IA' => 'Iowa',
	'KS' => 'Kansas',
	'KY' => 'Kentucky',
	'LA' => 'Louisiana',
	'ME' => 'Maine',
	'MH' => 'Marshall Islands',
	'MD' => 'Maryland',
	'MA' => 'Massachusetts',
	'MI' => 'Michigan',
	'MN' => 'Minnesota',
	'MS' => 'Mississippi',
	'MO' => 'Missouri',
	'MT' => 'Montana',
	'NE' => 'Nebraska',
	'NV' => 'Nevada',
	'NH' => 'New Hampshire',
	'NJ' => 'New Jersey',
	'NM' => 'New Mexico',
	'NY' => 'New York',
	'NC' => 'North Carolina',
	'ND' => 'North Dakota',
	'MP' => 'Northern Mariana Islands',
	'OH' => 'Ohio',
	'OK' => 'Oklahoma',
	'OR' => 'Oregon',
	'PW' => 'Palau',
	'PA' => 'Pennsylvania',
	'PR' => 'Puerto Rico',
	'RI' => 'Rhode Island',
	'SC' => 'South Carolina',
	'SD' => 'South Dakota',
	'TN' => 'Tennessee',
	'TX' => 'Texas',
	'UT' => 'Utah',
	'VT' => 'Vermont',
	'VI' => 'Virgin Islands',
	'VA' => 'Virginia',
	'WA' => 'Washington',
	'WV' => 'West Virginia',
	'WI' => 'Wisconsin',
	'WY' => 'Wyoming',
	'AA' => 'Armed Forces Americas',
	'AE' => 'Armed Forces',
	'AP' => 'Armed Forces Pacific'
);


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
				                <input id="cb_<?php echo $item_id ?>" type="checkbox" name="<?php echo $name ?>[]" value="cb_<?php echo $key ?>" class="tmm-checkbox" />
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
			            <select id="country_<?php echo $unique_id ?>" class="tmm-country-select" name="country_<?php echo $name ?>"<?php echo($input['is_required'] ? " required" : "") ?>>
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
			            <input id="city_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="city_<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('City ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
		            </p>

		            <div class="row">

			            <div class="large-6 columns">
				            <p class="tmmFormStyling form-select">
					            <select id="state_<?php echo $unique_id ?>" class="tmm-state-select" name="state_<?php echo $name ?>"<?php echo($input['is_required'] ? " required" : "") ?>>
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
					            <input id="county_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" class="tmm-county-input" name="county_<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('County ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
				            </p>
			            </div>

			            <div class="large-6 columns">
				            <p class="input-block type-input">
					            <input id="zip_<?php echo $unique_id ?>" <?php echo($input['is_required'] ? "required" : "") ?> type="text" name="zip_<?php echo $name ?>" value="<?php echo !empty($_POST[$name]) ? $_POST[$name]  : ''; ?>" placeholder="<?php _e('Zip Code ', TMM_THEME_TEXTDOMAIN); ?><?php echo($input['is_required'] ? " *" : "") ?>" />
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
