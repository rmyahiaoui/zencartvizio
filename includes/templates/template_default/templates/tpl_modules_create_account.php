<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=create_account.<br />
 * Displays Create Account form.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version GIT: $Id: Author: DrByte  Sun Aug 19 09:47:29 2012 -0400 Modified in v1.5.1 $
 */
?>

<?php if ($messageStack->size('create_account') > 0) echo $messageStack->output('create_account'); ?>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<?php
  if (DISPLAY_PRIVACY_CONDITIONS == 'true') {
?> 
<fieldset>
<br/><legend><?php echo TABLE_HEADING_PRIVACY_CONDITIONS; ?></legend><br/>
<div class="information"><?php echo TEXT_PRIVACY_CONDITIONS_DESCRIPTION;?></div>
<?php echo zen_draw_checkbox_field('privacy_conditions', '1', false, 'class="form-control" "');?>
<label class="checkboxLabel" for="privacy"><?php echo TEXT_PRIVACY_CONDITIONS_CONFIRM;?></label>
</fieldset>
<?php
  }
?>

<?php
  if (ACCOUNT_COMPANY == 'true') {
?>
<fieldset>
<legend class="alert alert-info" ><?php echo CATEGORY_COMPANY; ?></legend><br/>
<label class="col-lg-2 control-label"  class="inputLabel" for="company"><?php echo ENTRY_COMPANY; ?></label>
<?php echo zen_draw_input_field('company', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_company', '40') . ' class="form-control"') . (zen_not_null(ENTRY_COMPANY_TEXT) ? '<span class="alert">' . ENTRY_COMPANY_TEXT . '</span>': ''); ?>
</fieldset>
<?php
  }
?>

<fieldset>
<br/><legend class="alert alert-info" ><?php echo TABLE_HEADING_ADDRESS_DETAILS; ?></legend>
<?php
  if (ACCOUNT_GENDER == 'true') {
?>
<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'.(zen_not_null(ENTRY_GENDER_TEXT) ? '<span class="alert">' . ENTRY_GENDER_TEXT . '</span>': '').zen_draw_radio_field('gender', 'm', '', 'id="gender-male"') . '&nbsp;&nbsp;<label   class="radioButtonLabel" for="gender-male">' . MALE . '</label>&nbsp;&nbsp;' . zen_draw_radio_field('gender', 'f', '', 'id="gender-female"') . '&nbsp;&nbsp;<label class="radioButtonLabel" for="gender-female">' . FEMALE . '</label>&nbsp;&nbsp;'; ?>
<br class="clearBoth" /><br/>
<?php
  }
?>

<label class="col-lg-2 control-label"   class="inputLabel" for="firstname"><?php echo (zen_not_null(ENTRY_FIRST_NAME_TEXT) ? '<span class="alert">' . ENTRY_FIRST_NAME_TEXT . '</span>': '').ENTRY_FIRST_NAME; ?></label>
<?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' class="form-control"') ?>
<br class="clearBoth" />

<label class="col-lg-2 control-label"  class="inputLabel" for="lastname"><?php echo  (zen_not_null(ENTRY_LAST_NAME_TEXT) ? '<span class="alert">' . ENTRY_LAST_NAME_TEXT . '</span>': '').ENTRY_LAST_NAME; ?></label>
<?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />

<label class="col-lg-2 control-label"  class="inputLabel" for="street-address"><?php echo (zen_not_null(ENTRY_STREET_ADDRESS_TEXT) ? '<span class="alert">' . ENTRY_STREET_ADDRESS_TEXT . '</span>': '').ENTRY_STREET_ADDRESS; ?></label>
  <?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />

<?php echo zen_draw_input_field('should_be_empty', '', ' size="40" id="CAAS" style="visibility:hidden; display:none;" autocomplete="off"'); ?>

<?php
  if (ACCOUNT_SUBURB == 'true') {
?>
<label class="col-lg-2 control-label"  class="inputLabel" for="suburb"><?php echo (zen_not_null(ENTRY_SUBURB_TEXT) ? '<span class="alert">' . ENTRY_SUBURB_TEXT . '</span>': '').ENTRY_SUBURB; ?></label>
<?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />
<?php
  }
?>

<label class="col-lg-2 control-label"  class="inputLabel" for="city"><?php echo (zen_not_null(ENTRY_CITY_TEXT) ? '<span class="alert">' . ENTRY_CITY_TEXT . '</span>': '').ENTRY_CITY; ?></label>
<?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />

<?php
  if (ACCOUNT_STATE == 'true') {
    if ($flag_show_pulldown_states == true) {
?>
<label class="col-lg-2 control-label"  class="inputLabel" for="stateZone" id="zoneLabel"><?php echo ENTRY_STATE; ?></label>
<?php
      echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $zone_id, 'class="form-control"');
      if (zen_not_null(ENTRY_STATE_TEXT)) echo '&nbsp;<span class="alert">' . ENTRY_STATE_TEXT . '</span>';
    }
?>

<?php if ($flag_show_pulldown_states == true) { ?>
<br class="clearBoth" id="stBreak" />
<?php } ?>
<label class="col-lg-2 control-label"   class="inputLabel" for="state" id="stateLabel"><?php echo $state_field_label; ?></label>
<?php
    echo zen_draw_input_field('state', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' class="form-control"');
    if (zen_not_null(ENTRY_STATE_TEXT)) echo '&nbsp;<span class="alert" id="stText">' . ENTRY_STATE_TEXT . '</span>';
    if ($flag_show_pulldown_states == false) {
      echo zen_draw_hidden_field('zone_id', $zone_name, ' ');
    }
?>
<br class="clearBoth" />
<?php
  }
?>

<label class="col-lg-2 control-label"  class="inputLabel" for="postcode"><?php echo (zen_not_null(ENTRY_POST_CODE_TEXT) ? '<span class="alert">' . ENTRY_POST_CODE_TEXT . '</span>': '').ENTRY_POST_CODE; ?></label>
<?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />

<label class="col-lg-2 control-label"  class="inputLabel" for="country"><?php echo (zen_not_null(ENTRY_COUNTRY_TEXT) ? '<span class="alert">' . ENTRY_COUNTRY_TEXT . '</span>': '').ENTRY_COUNTRY; ?></label>
<?php echo zen_get_country_list('zone_country_id', $selected_country, 'class="form-control" ' . ($flag_show_pulldown_states == true ? 'onchange="update_zone(this.form);"' : '')); ?>
<br class="clearBoth" />
</fieldset>

<fieldset>
<br/><legend class="alert alert-info" ><?php echo TABLE_HEADING_PHONE_FAX_DETAILS; ?></legend>
<label class="col-lg-2 control-label"  class="inputLabel" for="telephone"><?php  echo (zen_not_null(ENTRY_TELEPHONE_NUMBER_TEXT) ? '<span class="alert">' . ENTRY_TELEPHONE_NUMBER_TEXT . '</span>': '').ENTRY_TELEPHONE_NUMBER; ?></label>
<?php echo zen_draw_input_field('telephone', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_telephone', '40') . ' class="form-control"'); ?>

<?php
  if (ACCOUNT_FAX_NUMBER == 'true') {
?>
<br class="clearBoth" />
<label class="col-lg-2 control-label" class="inputLabel" for="fax"><?php echo (zen_not_null(ENTRY_FAX_NUMBER_TEXT) ? '<span class="alert">' . ENTRY_FAX_NUMBER_TEXT . '</span>': '').ENTRY_FAX_NUMBER; ?></label>
<?php echo zen_draw_input_field('fax', '', 'class="form-control"'); ?>
<?php
  }
?>
</fieldset>

<?php
  if (ACCOUNT_DOB == 'true') {
?>
<fieldset>
<br/><legend class="alert alert-info" ><?php echo TABLE_HEADING_DATE_OF_BIRTH; ?></legend>
<label class="col-lg-2 control-label" class="inputLabel" for="dob"><?php echo ENTRY_DATE_OF_BIRTH; ?></label>
<?php echo zen_draw_input_field('dob','', 'class="form-control"') . (zen_not_null(ENTRY_DATE_OF_BIRTH_TEXT) ? '<span class="alert">' . ENTRY_DATE_OF_BIRTH_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
</fieldset>
<?php
  }
?>

<fieldset>
<br/><legend class="alert alert-info" ><?php echo TABLE_HEADING_LOGIN_DETAILS; ?></legend>
<label class="col-lg-2 control-label" class="inputLabel" for="email-address"><?php echo (zen_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="alert">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>': '').ENTRY_EMAIL_ADDRESS; ?></label>
<?php echo zen_draw_input_field('email_address', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_email_address', '40') . ' class="form-control"'); ?>
<br class="clearBoth" />

<?php
  if ($phpBB->phpBB['installed'] == true) {
?>
<label class="col-lg-2 control-label" class="inputLabel" for="nickname"><?php echo ENTRY_NICK; ?></label>
<?php echo zen_draw_input_field('nick','','class="form-control"') . (zen_not_null(ENTRY_NICK_TEXT) ? '<span class="alert">' . ENTRY_NICK_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
<?php
  }
?>

<label class="col-lg-2 control-label" class="inputLabel" for="password-new"><?php echo '<span class="alert">*</span>'.ENTRY_PASSWORD ; ?></label>
<?php echo zen_draw_password_field('password', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '20') . ' class="form-control" placeholder="'.str_replace('*','',ENTRY_PASSWORD_TEXT).'"'); ?>
<br class="clearBoth" />

<label class="col-lg-2 control-label" class="inputLabel" for="password-confirm"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></label>
<?php echo zen_draw_password_field('confirmation', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_password', '20') . ' class="form-control"') . (zen_not_null(ENTRY_PASSWORD_CONFIRMATION_TEXT) ? '<span class="alert">' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
</fieldset>

<fieldset>
<br/><legend class="alert alert-info" ><?php echo ENTRY_EMAIL_PREFERENCE; ?></legend>
<?php
  if (ACCOUNT_NEWSLETTER_STATUS != 0) {
?>
<?php echo zen_draw_checkbox_field('newsletter', '1', $newsletter, 'class="form-control"') . '<label class="checkboxLabel" for="newsletter-checkbox">' . ENTRY_NEWSLETTER . '</label>' . (zen_not_null(ENTRY_NEWSLETTER_TEXT) ? '<span class="alert">' . ENTRY_NEWSLETTER_TEXT . '</span>': ''); ?>
<br class="clearBoth" />
<?php } ?>

<?php echo zen_draw_radio_field('email_format', 'HTML', ($email_format == 'HTML' ? true : false),'id="email-format-html"') . '&nbsp;&nbsp;&nbsp;&nbsp;<label class="radioButtonLabel" for="email-format-html">' . ENTRY_EMAIL_HTML_DISPLAY . '</label>&nbsp;&nbsp;&nbsp;&nbsp;' .  zen_draw_radio_field('email_format', 'TEXT', ($email_format == 'TEXT' ? true : false), 'id="email-format-text"') . '&nbsp;&nbsp;&nbsp;&nbsp;<label class="radioButtonLabel" for="email-format-text">' . ENTRY_EMAIL_TEXT_DISPLAY . '</label>&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
<br class="clearBoth" />
</fieldset>

<?php
  if (CUSTOMERS_REFERRAL_STATUS == 2) {
?>
<fieldset>

<br/><legend class="alert alert-info" ><?php echo TABLE_HEADING_REFERRAL_DETAILS; ?></legend>
<label class="col-lg-2 control-label" class="inputLabel" for="customers_referral"><?php echo ENTRY_CUSTOMERS_REFERRAL; ?></label>
<?php echo zen_draw_input_field('customers_referral', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_referral', '15') . ' id="customers_referral"'); ?>
<br class="clearBoth" />
</fieldset>
<?php } ?>
