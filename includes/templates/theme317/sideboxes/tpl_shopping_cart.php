<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cartt Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_shopping_cart.php 4821 2006-10-23 10:54:15Z drbyte $
 */
  $content ="";

  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  if ($_SESSION['cart']->count_contents() > 0) {
  $content .= '<div id="cartBoxListWrapper">' . "\n" . '<ul>' . "\n";
    $products = $_SESSION['cart']->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      $content .= '<li>';

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $content .= '<span class="cartNewItem">';
      } else {
        $content .= '<span class="cartOldItem">';
      }

      $content .= $products[$i]['quantity'] . BOX_SHOPPING_CART_DIVIDER . '</span><a href="' . zen_href_link(zen_get_info_page($products[$i]['id']), 'products_id=' . $products[$i]['id']) . '">';

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $content .= '<span class="cartNewItem">';
      } else {
        $content .= '<span class="cartOldItem">';
      }

      $content .= $products[$i]['name'] . '</span></a></li>' . "\n";

      if (($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $products[$i]['id'])) {
        $_SESSION['new_products_id_in_cart'] = '';
      }
    }
    $content .= '</ul>' . "\n" . '</div>';
  } else {
    $content .= '<div id="cartBoxEmpty">' . BOX_SHOPPING_CART_EMPTY . '</div>';
  }

  if ($_SESSION['cart']->count_contents() > 0) {
    $content .= '<div class="cart_line">' . zen_draw_separator($image = 'pixel_trans.gif', '1', '1') . '</div>';
    $content .= '<div class="cartBoxTotal price">' . $currencies->format($_SESSION['cart']->show_total()) . '</div>';
    $content .= '<div class="clear"></div>';
  }

  if (isset($_SESSION['customer_id'])) {
    $gv_query = "select amount
                 from " . TABLE_COUPON_GV_CUSTOMER . "
                 where customer_id = '" . $_SESSION['customer_id'] . "'";
   $gv_result = $db->Execute($gv_query);

    if ($gv_result->RecordCount() && $gv_result->fields['amount'] > 0 ) {
      $content .= '<div id="cartBoxGVButton"><a href="' . zen_href_link(FILENAME_GV_SEND, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_SEND_A_GIFT_CERT , BUTTON_SEND_A_GIFT_CERT_ALT) . '</a></div>';
      $content .= '<div id="cartBoxVoucherBalance">' . VOUCHER_BALANCE . $currencies->format($gv_result->fields['amount']) . '</div>';
    }
  }
  $content .= '</div>';
	
	
?>
