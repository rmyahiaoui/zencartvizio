<?php
  /*
  $Id: cart_upsell.php, v1
  Copyright (c) 2006 TooLateSmart
  Released under the GNU General Public License for zencart
  */

  // number of upsells/xsells to display
  define('NUMBER_UPSELLS_DISPLAY', '9');
  define('NUMBER_XSELLS_DISPLAY', '9');

  // number of upsells/xsells columns to display
  define('UPSELLS_COLUMNS_DISPLAY', '3');
  define('XSELLS_COLUMNS_DISPLAY', '3');

  // upsells/xsells box title to display
  define('UPSELLS_TITLE_DISPLAY', 'Customers who selected the items in your cart also chose...');
  define('TEXT_XSELL_PRODUCTS', 'To go with the items in your cart we also recommend...');

  if ($_SESSION['cart']->contents) {
    $i = 0;
    foreach($_SESSION['cart']->contents as $id => $qty) {
      $prod[$i] = zen_get_prid($id);
      $i++;
    }

    //check if xsell module installed
    if (@file_exists(DIR_WS_MODULES . zen_get_module_directory('xsell_products.php'))) {
      $c = NUMBER_XSELLS_DISPLAY;
      $num = round($c/sizeof($prod));
      $extra = $num + 1;
      $max = $c;
      for ($i = 0; $i < sizeof($prod); $i++) {
        if ($i < sizeof($prod) - 1) {
          $xsell_query_raw .= "(select p.products_id, p.products_image from " . TABLE_PRODUCTS_XSELL . " xp, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where xp.products_id = '"                                                               . $prod[$i] . "' and xp.xsell_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and p.products_status = '1'                                                              order by xp.products_id asc limit " . $extra . ") UNION ";
          $c -= $num;
        } else {
          $c += 2;
          $xsell_query_raw .= "(select p.products_id, p.products_image from " . TABLE_PRODUCTS_XSELL . " xp, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where xp.products_id = '"                                                               . $prod[$i] . "' and xp.xsell_id = p.products_id and p.products_id = pd.products_id and pd.language_id = '" . $_SESSION['languages_id'] . "' and p.products_status = '1'                                                              order by xp.products_id asc limit " . $c . ")";
        }
      }
      $xsell_query = $db->Execute($xsell_query_raw);
      $db->Execute("create temporary table cross_sell ( products_id int(11), products_image varchar(64) )");
      while (!$xsell_query->EOF) {
        $db->Execute("insert into cross_sell values('" . $xsell_query->fields['products_id'] . "', '" . $xsell_query->fields['products_image'] . "')");
        $xsell_query->MoveNext();
      }
      for ($i = 0; $i < sizeof($prod); $i++) {
        $db->Execute("delete from cross_sell where products_id = '" . $prod[$i] . "'");
      }
      $xsell_query_final = "select * from cross_sell limit " . $max;
      $xsell_final = $db->Execute($xsell_query_final);
      $db->Execute("drop table cross_sell");
      $num_products_xsell = $xsell_final->RecordCount();
      if ($num_products_xsell >= MIN_DISPLAY_ALSO_PURCHASED) {
        $row = 0;
        $col = 0;
        $list_box_contents = array();

        if ($num_products_xsell < SHOW_PRODUCT_INFO_COLUMNS_XSELL_PRODUCTS || SHOW_PRODUCT_INFO_COLUMNS_XSELL_PRODUCTS==0) {
          $col_width = floor(100/$num_products_xsell);
        } else {
          $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_XSELL_PRODUCTS);
        }
        while (!$xsell_final->EOF) {
          $xsell_final->fields['products_name'] = zen_get_products_name($xsell_final->fields['products_id']);
          $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContentsCrossSell centeredContent back"' . ' ' . 'style="width:' . $col_width . '%;"',
                                                 'text' => '<a href="' . zen_href_link(zen_get_info_page($xsell_final->fields['products_id']), 'products_id=' . (int)$xsell_final->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $xsell_final->fields['products_image'], $xsell_final->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br /><a href="' . zen_href_link(zen_get_info_page($xsell_final->fields['products_id']), 'products_id=' . $xsell_final->fields['products_id']) . '">' . $xsell_final->fields['products_name'] . '</a>' . (XSELL_DISPLAY_PRICE=='true'? '<br />'.zen_get_products_display_price($xsell_final->fields['products_id']):'') );
          $col ++;
          if ($col > 2) {
            $col = 0;
            $row ++;
          }
          $xsell_final->MoveNext();
        }
       // store data into array for display later where desired:
       $xsell_data = $list_box_contents;

      require($template->get_template_dir('tpl_modules_xsell_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_xsell_products.php');    }
    }
    unset($title, $list_box_contents, $c, $max, $i);
    $c = NUMBER_UPSELLS_DISPLAY;
    $num = round($c/sizeof($prod));
    $extra = $num + 1;
    $max = $c;
    for ($i = 0; $i < sizeof($prod); $i++) {
      if ($i < sizeof($prod) - 1) {
        echo TABLE_ORDERS_PRODUCTS;
        $query_raw .= "(select p.products_id, p.products_image from " . TABLE_ORDERS_PRODUCTS . " opa, " . TABLE_ORDERS_PRODUCTS . " opb, " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p where
                       opa.products_id = '" . $prod[$i] . "' and opa.orders_id = opb.orders_id and opb.products_id != '" . $prod[$i] . "' and opb.products_id = p.products_id and opb.orders_id = o.orders_id
                       and p.products_status = '1' group by p.products_id order by o.date_purchased desc limit " . $extra . ") UNION ";
        $c -= $num;
      } else {
        $c += 2;
        $query_raw .= "(select p.products_id, p.products_image from " . TABLE_ORDERS_PRODUCTS . " opa, " . TABLE_ORDERS_PRODUCTS . " opb, " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p where
                       opa.products_id = '" . $prod[$i] . "' and opa.orders_id = opb.orders_id and opb.products_id != '" . $prod[$i] . "' and opb.products_id = p.products_id and opb.orders_id = o.orders_id
                       and p.products_status = '1' group by p.products_id order by o.date_purchased desc limit " . $c . ")";
// echo $query_raw;
      }
    }
    $query = $db->Execute($query_raw);
    $db->Execute("create temporary table upsell ( products_id int(11), products_image varchar(64) )");
    while (!$query->EOF) {
      $db->Execute("insert into upsell values('" . $query->fields['products_id'] . "', '" . $query->fields['products_image'] . "')");
      $query->MoveNext();
    }
    for ($i = 0; $i < sizeof($prod); $i++) {
      $db->Execute("delete from upsell where products_id = '" . $prod[$i] . "'");
    }
    $query_final = "select * from upsell limit " . $max;
    $final = $db->Execute($query_final);
    $db->Execute("drop table upsell");
    $num_products_ordered = $final->RecordCount();
    if ($num_products_ordered > 0) {
      $row = 0;
      $col = 0;
      if ($num_products_ordered < SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS) {
        $col_width = floor(100/$num_products_ordered);
      } else {
        $col_width = floor(100/SHOW_PRODUCT_INFO_COLUMNS_ALSO_PURCHASED_PRODUCTS);
      }
      $list_box_contents = array();
      while (!$final->EOF) {
        $final->fields['products_name'] = zen_get_products_name($final->fields['products_id']);
        $list_box_contents[$row][$col] = array('params' => 'class="centerBoxContentsAlsoPurch"' . ' ' . 'style="width:' . $col_width . '%;"',
                                               'text' => '<a href="' . zen_href_link(zen_get_info_page($final->fields['products_id']), 'products_id=' . $final->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $final->fields['products_image'], $final->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br /><a href="' . zen_href_link(zen_get_info_page($final->fields['products_id']), 'products_id=' . $final->fields['products_id']) . '">' . $final->fields['products_name'] . '</a>');
        $col ++;
        if ($col > (UPSELLS_COLUMNS_DISPLAY - 1)) {
          $col = 0;
          $row ++;
        }
        $final->MoveNext();
        $title = '<h4 class="centerBoxHeading">' . UPSELLS_TITLE_DISPLAY . '</h4>';
        $zc_show_also_purchased = true;
      }
?>
<div class="centerBoxWrapper" id="alsoPurchased">
<?php
      require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
    }
  }
?>
</div>
