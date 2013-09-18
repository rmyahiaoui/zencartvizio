<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=shopping_cart.<br />
 * Displays shopping-cart contents
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_shopping_cart_default.php 5554 2007-01-07 02:45:29Z drbyte $
 */
?>

<div class="centerColumn" id="shoppingCartDefault">
<?php
  if ($flagHasCartContents) {
?>


<h1 id="cartDefaultHeading"><span class="title-left-bg"><span class="title-right-bg"><?php echo HEADING_TITLE; ?></span></span></h1>

<?php
 // if ($_SESSION['cart']->count_contents() > 0) {
?>
<!-- <div class="forward"><?php echo TEXT_VISITORS_CART; ?></div> -->
<?php
//  }
?>
<div class="clear"></div>

<?php  // if ($messageStack->size('shopping_cart') > 0) echo $messageStack->output('shopping_cart'); ?>

<?php echo zen_draw_form('cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product')); ?>
<!-- <div id="cartInstructionsDisplay" class="content"> -->
    <?php // echo TEXT_INFORMATION; ?>
  <!-- </div> -->

<?php if (!empty($totalsDisplay)) { ?>

  <div class="cartTotalsDisplay important"><?php
  $ok =  explode("&nbsp;&nbsp;", $totalsDisplay);
echo '<div id="pre" style="font-weight:normal;">'.$ok[0].'<br/>'.$ok[2].'</div>';
 ?></div>
  <br class="clearBoth" />
<?php } ?>

<?php  if ($flagAnyOutOfStock) { ?>

<?php    if (STOCK_ALLOW_CHECKOUT == 'true') {  ?>

<div class="messageStackError"><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></div>

<?php    } else { ?>
<div class="messageStackError"><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></div>

<?php    } //endif STOCK_ALLOW_CHECKOUT ?>
<?php  } //endif flagAnyOutOfStock ?>

<!--  DEBUT DESIGN PANIER  -->
<p>Details :</p>
<table  border="0" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay">
     <tr class="tableHeading">
        <th scope="col"  id="scQuantityHeading"><?php echo TABLE_HEADING_QUANTITY; ?></th>
        <!-- <th scope="col" id="scUpdateQuantity">&nbsp;</th> -->
        <th scope="col" id="scProductsHeading"><?php echo TABLE_HEADING_PRODUCTS; ?></th>
        <th scope="col" id="scUnitHeading"><?php echo TABLE_HEADING_PRICE; ?></th>
        <th scope="col" id="scTotalHeading"><?php echo TABLE_HEADING_TOTAL; ?></th>
        <th scope="col" id="scRemoveHeading">&nbsp;</th>
     </tr>
         <!-- Loop through all products /-->
<?php
  foreach ($productArray as $product) {
?>
     <tr class="<?php echo $product['rowClass']; ?>">
       <td class="cartQuantity" height="35" >
<?php
// <span class="alert bold">' . $product['flagStockCheck'] . '</span>
  if ($product['flagShowFixedQuantity']) {
    echo $product['showFixedQuantityAmount'] . '<br />' . $product['flagStockCheck'] . '<br /><br />' . $product['showMinUnits'];
  } else {
    $inpPanierUpd = str_replace("<input", "<input id=\"updInputPanier\"", $product['quantityField']);
    echo $inpPanierUpd;
    // echo $product['quantityField'] . '<br />' . $product['flagStockCheck'] . '<br /><br />' . $product['showMinUnits'];
  
  }
?>
<!--        </td>
       <td class="cartQuantityUpdate"> -->
<?php
  if ($product['buttonUpdate'] == '') {
    echo '' ;
  } else {
    echo '<p <p class="imgUpdt">'.str_replace("src=\"includes/templates/theme317/buttons/french/button_update_cart.gif\"", "src=\"images/tbi_images/shopping_cart/actua1.jpg\"", $product['buttonUpdate']).'</p>';
    // echo '<img src="images/tbi_images/shopping_cart/actua1.jpg" />';
  }
?>
       </td>
       <td class="cartProductDisplay">
        <!-- <span id="cartImage" class="back"><?php echo $product['productsImage']; ?></span> -->
        <!-- <span class="alert bold">' . $product['flagStockCheck'] . '</span> -->
<a href="<?php echo $product['linkProductsName']; ?>">
 <span id="cartProdTitle"><?php echo $product['productsName']; ?></span></a>
<br class="clearBoth" />


<?php
  echo $product['attributeHiddenField'];
  if (isset($product['attributes']) && is_array($product['attributes'])) {
  echo '<div class="cartAttribsList">';
  echo '<ul>';
    reset($product['attributes']);
    foreach ($product['attributes'] as $option => $value) {
?>

<li><?php echo $value['products_options_name'] . TEXT_OPTION_DIVIDER . nl2br($value['products_options_values_name']); ?></li>

<?php
    }
  echo '</ul>';
  echo '</div>';
  }
?>
       </td>
       <td class="cartUnitDisplay price"><?php echo $product['productsPriceEach']; ?></td>
       <td class="cartTotalDisplay"><span ><?php echo $product['productsPrice']; ?></span></td>
       <td class="cartRemoveItemDisplay">
<?php
  if ($product['buttonDelete']) {
?>
           <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, 'action=remove_product&product_id=' . $product['id']); ?>"><img src="images/tbi_images/shopping_cart/croix_close_card.png" /></a>
           <?php // echo zen_image($template->get_template_dir(ICON_IMAGE_TRASH, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_TRASH, ICON_TRASH_ALT); ?>
<?php
  }
  // if ($product['checkBoxDelete'] ) {
    // echo zen_draw_checkbox_field('cart_delete[]', $product['id']);
  // }
?>
</td>
     </tr>
<?php
  } // end foreach ($productArray as $product)
?>
       <!-- Finished loop through all products /-->
      </table>

<div id="cartSubTotal"><?php echo SUB_TITLE_SUB_TOTAL; ?> <span class="price" style="color:#ee8012;font-size:1.5em;font-family:Sans-serif"><?php echo $cartShowTotal; ?></span></div>
<br class="clearBoth" />
<!-- zen_image_button(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT) -->
 <!-- zen_image_button(BUTTON_IMAGE_CONTINUE_SHOPPING, BUTTON_CONTINUE_SHOPPING_ALT) .  -->
<!--bof shopping cart buttons-->
<div class="buttonRow forward" style="margin-left:816px;"><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '"><img src="images/tbi_images/shopping_cart/valider_panier_2.jpg" /></a>'; ?></div>
<div class="buttonRow back" style="margin-top:-35px;margin-left:-5px"><?php echo zen_back_link().'<img src="images/tbi_images/shopping_cart/poursuivre_achat_2.jpg" /></a>'; ?></div>
<?php
// show update cart button
  if (SHOW_SHOPPING_CART_UPDATE == 2 or SHOW_SHOPPING_CART_UPDATE == 3) {
?>
<!-- <div class="buttonRow back"><?php echo zen_image_submit(ICON_IMAGE_UPDATE, ICON_UPDATE_ALT); ?></div> -->
<?php
  } else { // don't show update button below cart
?>
<?php
  } // show update button
?>
<!--eof shopping cart buttons-->
</form>

<br class="clearBoth" />
<?php
    if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '1') {
?>
<!-- zen_image_button(BUTTON_IMAGE_SHIPPING_ESTIMATOR, BUTTON_SHIPPING_ESTIMATOR_ALT) -->
<div class="buttonRow back"><?php echo '<a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_SHIPPING_ESTIMATOR) . '\')">
  <img src="images/tbi_images/shopping_cart/button_shipping_estimator.gif" /></a>'; ?></div>
<?php
    }
?>

<!-- ** BEGIN PAYPAL EXPRESS CHECKOUT ** -->
<?php  // the tpl_ec_button template only displays EC option if cart contents >0 and value >0
if (defined('MODULE_PAYMENT_PAYPALWPP_STATUS') && MODULE_PAYMENT_PAYPALWPP_STATUS == 'True') {
  include(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/paypal/tpl_ec_button.php');
}
?>
<!-- ** END PAYPAL EXPRESS CHECKOUT ** -->

<?php
      if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '2') {
/**
 * load the shipping estimator code if needed
 */
?>
      <?php require(DIR_WS_MODULES . zen_get_module_directory('shipping_estimator.php')); ?>

<?php
      }
?>
<?php
  } else {
?>

<h2 id="cartEmptyText"><?php echo TEXT_CART_EMPTY; ?></h2>

<?php
$show_display_shopping_cart_empty = $db->Execute(SQL_SHOW_SHOPPING_CART_EMPTY);

while (!$show_display_shopping_cart_empty->EOF) {
?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php
  if ($show_display_shopping_cart_empty->fields['configuration_key'] == 'SHOW_SHOPPING_CART_EMPTY_UPCOMING') {
    include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
  }
?>
<?php
  $show_display_shopping_cart_empty->MoveNext();
} // !EOF
?>
<?php
  }
?>
</div>
<?php

require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CART_UPSELL)); ?>

