<?php
/**
 * product_listing module
 *
 * @package modules
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product_listing.php 18695 2011-05-04 05:24:19Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
// $show_submit = zen_run_normal();
$listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_PRODUCTS_LISTING, 'p.products_id', 'page');
$zco_notifier->notify('NOTIFY_MODULE_PRODUCT_LISTING_RESULTCOUNT', $listing_split->number_of_rows);
$how_many = 0;

// $list_box_contents[0] = array('params' => 'class="productListing-rowheading"');

// $zc_col_count_description = 0;
// $lc_align = '';
// $lc_text = '<div style="border:1px solid black">';
// for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
//   switch ($column_list[$col]) {
//     case 'PRODUCT_LIST_MODEL':
//     $lc_text = TABLE_HEADING_MODEL;
//     $lc_align = '';
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_NAME':
//     $lc_text = TABLE_HEADING_PRODUCTS;
//     $lc_align = '';
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_MANUFACTURER':
//     $lc_text = TABLE_HEADING_MANUFACTURER;
//     $lc_align = '';
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_PRICE':
//     $lc_text = TABLE_HEADING_PRICE;
//     $lc_align = 'right' . (PRODUCTS_LIST_PRICE_WIDTH > 0 ? '" width="' . PRODUCTS_LIST_PRICE_WIDTH : '');
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_QUANTITY':
//     $lc_text = TABLE_HEADING_QUANTITY;
//     $lc_align = 'right';
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_WEIGHT':
//     $lc_text = TABLE_HEADING_WEIGHT;
//     $lc_align = 'right';
//     $zc_col_count_description++;
//     break;
//     case 'PRODUCT_LIST_IMAGE':
//     $lc_text = TABLE_HEADING_IMAGE;
//     $lc_align = 'center';
//     $zc_col_count_description++;
//     break;
//   }

//   if ( ($column_list[$col] != 'PRODUCT_LIST_IMAGE') ) {
//     $lc_text = zen_create_sort_heading($_get['sort'], $col+1, $lc_text);
//   }



//   $list_box_contents[0][$col] = array('align' => $lc_align,
//                                       'params' => 'class="productListing-heading"',
//                                       'text' => $lc_text);
// }

if ($listing_split->number_of_rows > 0) {
  $rows = 0;
  $listing = $db->Execute($listing_split->sql_query);
  $extra_row = 0;
  // while (!$listing->EOF) {
  //   $rows++;

  //   if ((($rows-$extra_row)/2) == floor(($rows-$extra_row)/2)) {
  //     $list_box_contents[$rows] = array('params' => 'class="productListing-even"');
  //   } else {
  //     $list_box_contents[$rows] = array('params' => 'class="productListing-odd"');
  //   }

  //   $cur_row = sizeof($list_box_contents) - 1;

        $sql = "
        SELECT  pd.products_id, products_name, products_quantity, products_image, pd.products_description, products_price, c.parent_id, cd.categories_name, cd.categories_description, cd.categories_id, p.manufacturers_id, man.manufacturers_name
        FROM products_description pd
        INNER JOIN products p
        ON p.products_id = pd.products_id
        INNER JOIN products_to_categories pc
        ON pd.products_id = pc.products_id
        INNER JOIN categories_description cd
        ON pc.categories_id = cd.categories_id 
        INNER JOIN categories c
        ON cd.categories_id = c.categories_id
        INNER JOIN manufacturers man
        ON p.manufacturers_id = man.manufacturers_id
        WHERE cd.categories_id = 41";
        $r = $db->Execute($sql);
 $return ='<div id="conteneurListeProd">';
 // 
 // var_dump($r);
        $sql = "SELECT categories_name, categories_description FROM categories_description WHERE  categories_id = 51";
        $rAriane = $db->Execute($sql);
         // On affiche le fil d'ariane et desc une seule fois
           echo  '<div id="filariane" style="margin-top:20px;color:#5e6d76;font-family:tahoma;font-style:italic">Accueil >'.$rAriane->fields['categories_name'].'</div><h3 style="font-family:Tahoma;color:#0299d4;">'.$rAriane->fields['categories_name'].'</h3><div style="padding:3px;color:#1b3442;font-family:tahoma;font-weight:bold;font-size:0.9em">'.$rAriane->fields['categories_description'].'</div><br/>';
              
              echo '
                 <div id="barreTriProduit" >
                  <form style="margin-top:-2px;">
                  Trier par prix 
                  <select name="ordrePrix"  onchange="request(this.options[this.selectedIndex].value, 41);" >
                    <option value="3a">Ordre croissant</option>
                    <option value="3d">Ordre decroissant</option>
                  </select>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trier par
                  <select name="ordreName" onchange="request(this.options[this.selectedIndex].value, 41);" >
                    <option value="">Marque</option>';
                    $manVerifDouble = array();
                    for ($i=0; $i < sizeof($r); $i++) { // Sert a verifier qu'on a pas de doublon de marque dans la liste
                      if($i==0) {
                        $manVerifDouble[$i] = $r->fields['manufacturers_name'];
                        echo '<option onchange="request(this.options[this.selectedIndex].value, 41);" value="'.$r->fields['manufacturers_id'].'">'.$r->fields['manufacturers_name'].'</option>';
                      }
                      else {
                        if (!in_array($r->fields['manufacturers_name'], $manVerifDouble)) {
                          $manVerifDouble[$i] = $r->fields['manufacturers_name']; // On ajoute dans notre array s'il n'existe pas
                          echo '<option onchange="request(this.options[this.selectedIndex].value, 41);" value="'.$r->fields['manufacturers_id'].'">'.$r->fields['manufacturers_name'].'</option>';
                        }
                      }
                    }
                  echo '
                  </select>
                  </form>
                  </div>';


          while (!$r->EOF) {
              if (strlen($r->fields['products_description']) >= 200) {
              $desc = substr($r->fields['products_description'], 0, 150);
              $desc .= '...';
              $desc = stripslashes($desc);
              } elseif($r->fields['products_description'] == null) { $desc =  'Pas de description disponible'; }
              $desc = str_replace('<p></p>', '', $desc);
               $return .= '<br/>
              <div id="wrapListeCat">
                <div id="imgListeCat">';
                  if(empty($r->fields['products_image']) OR !file_exists('images/'.$r->fields['products_image'].'')) {
                      $return .= '<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43">
                      <img src="images/tbi_images/body/produits/prod1.png" alt="'.$r->fields['products_name'].'" title=" '.$r->fields['products_name'].'"" width="130" class="listingProductImage" style="position:relative" onmouseover="showtrail(\'images/no_picture.gif\',\''.$r->fields['products_name'].'\',100,80,100,80,this,0,0,100,80);" onmouseout="hidetrail();">
                    </a>';
                  } else {
                       $return .= '<img src="images/'.$r->fields['products_image'].'" />';
                  }
                     $return .= '
                  </div>
                  <div id="descListeCat">
                    <h3 style="background-color:#2798d4;color:white;font-size:1em;padding:7px;padding-left:15px;margin-top:-1px;width:394px;">' . $r->fields['manufacturers_name'] . '</h3>
                      <div id="listeBod" class=""><p style="font-weight:bold">Référence :  '.$r->fields['products_name'].'</p><p style="margin-top:-5px">'.$desc.'<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43"></p><img src="images/tbi_images/page_prod/savoir_plus.png" /></a>
                      </div>
                    </div>
                    <div id="prixListeCat" align="right">
                      <div class="prixListeCatOk">
                        <img src="images/tbi_images/page_prod/splash_prix.png" /><p style="margin-left:80px;margin-top:-40px">'.round($r->fields['products_price'], 0).'<sup>&euro;</sup></p>
                      </div>
                      <div class="prixListeCatBarre">1200<sup>&euro;</sup></div>
                      <div class="prixListeCatStock"><span style="font-family:Tahoma;font-size:0.9em;color:#568203"> STOCK : </span>'.$r->fields['products_quantity'].'</div>
                       <div class="prixListeCatAjouter" >
                        <a href="index.php?main_page=products_new&action=buy_now&products_id='.$r->fields['products_id'].'"><img  name="products_id['.$r->fields['products_id'].']" src="images/tbi_images/page_prod/ajouter_panier.png" /></a>
                       </div>
                    </div>
                  </div>'; // fermeture wrapListeCat
            // echo 1;
           $r->MoveNext();

           }
            $return .= '</div>';
      echo $return;
// --------------------------------------------------DEBUT LISTE PRODUIT ----------------------------------------------- 

//     for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
//       $lc_align = '';
//       switch ($column_list[$col]) {
//         case 'PRODUCT_LIST_MODEL':
//         $lc_align = '';
//         $lc_text = $listing->fields['products_model'];
//         break;
//         case 'PRODUCT_LIST_NAME':
//         $lc_align = '';

//         $lc_text = '<h3  class="itemTitle"  style="background-color:#2798d4;font-size:1em;padding:5px;margin-top:-1px;">

//         <a style="color:white" href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . (($_GET['manufacturers_id'] > 0 and $_GET['filter_id'] > 0) ?  zen_get_generated_category_path_rev($_GET['filter_id']) : ($_GET['cPath'] > 0 ? zen_get_generated_category_path_rev($_GET['cPath']) : zen_get_generated_category_path_rev($listing->fields['master_categories_id']))) . '&products_id=' . $listing->fields['products_id']) . '">

//         ' . $listing->fields['products_name'] . '</a></h3>
//         <div style="background-color:#eeeeee;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;font-weight:none;font-family:verdana;margin-top:-10px;margin-bottom:10px" class="listingDescription"><p style="font-weight:bold;">Référence : ' .$listing->fields['products_name'].'</p>'. zen_trunc_string(zen_clean_html(stripslashes(zen_get_products_description($listing->fields['products_id'], $_SESSION['languages_id']))), PRODUCT_LIST_DESCRIPTION) . '[...]<br/><br/>
//         <div style="width:100%;text-align:center"><a style="color:white" href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . (($_GET['manufacturers_id'] > 0 and $_GET['filter_id'] > 0) ?  zen_get_generated_category_path_rev($_GET['filter_id']) : ($_GET['cPath'] > 0 ? zen_get_generated_category_path_rev($_GET['cPath']) : zen_get_generated_category_path_rev($listing->fields['master_categories_id']))) . '&products_id=' . $listing->fields['products_id']) . '">

//         ' . $listing->fields['products_name'] . '<img src="images/tbi_images/page_prod/savoir_plus.png" /></a></div>

//         </div>';
//         break;
//         case 'PRODUCT_LIST_MANUFACTURER':
//         $lc_align = '';
//         $lc_text = '<a href="' . zen_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing->fields['manufacturers_id']) . '">' . $listing->fields['manufacturers_name'] . '</a>';
//         break;
//         case 'PRODUCT_LIST_PRICE':
//         $lc_price = zen_get_products_display_price($listing->fields['products_id']) . '<br />';
//         $lc_align = 'right';
//         $lc_text =  $lc_price;

//         // more info in place of buy now
//         $lc_button = '';
//         if (zen_has_product_attributes($listing->fields['products_id']) or PRODUCT_LIST_PRICE_BUY_NOW == '0') {
//           $lc_button = '<a href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . (($_GET['manufacturers_id'] > 0 and $_GET['filter_id']) > 0 ?  zen_get_generated_category_path_rev($_GET['filter_id']) : ($_GET['cPath'] > 0 ? $_GET['cPath'] : zen_get_generated_category_path_rev($listing->fields['master_categories_id']))) . '&products_id=' . $listing->fields['products_id']) . '">' . MORE_INFO_TEXT . '</a>';
//         } else {
//           if (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0) {
//             if (
//                 // not a hide qty box product
//                 $listing->fields['products_qty_box_status'] != 0 &&
//                 // product type can be added to cart
//                 zen_get_products_allow_add_to_cart($listing->fields['products_id']) != 'N'
//                 &&
//                 // product is not call for price
//                 $listing->fields['product_is_call'] == 0
//                 &&
//                 // product is in stock or customers may add it to cart anyway
//                 ($listing->fields['products_quantity'] > 0 || SHOW_PRODUCTS_SOLD_OUT_IMAGE == 0) ) {
//               $how_many++;
//             }
//             // hide quantity box
//             if ($listing->fields['products_qty_box_status'] == 0) {
//               $lc_button = '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT, 'class="listingBuyNowButton"') . '</a>';
//             } else {
//               // $lc_button = TEXT_PRODUCT_LISTING_MULTIPLE_ADD_TO_CART . "<input type=\"text\" name=\"products_id[" . $listing->fields['products_id'] . "]\" value=\"0\" size=\"4\" />";
//               $lc_button = '<img src="images/tbi_images/page_prod/ajouter_panier.png" />';
//             }
//           } else {
// // qty box with add to cart button
//             if (PRODUCT_LIST_PRICE_BUY_NOW == '2' && $listing->fields['products_qty_box_status'] != 0) {
//               $lc_button= zen_draw_form('cart_quantity', zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=add_product&products_id=' . $listing->fields['products_id']), 'post', 'enctype="multipart/form-data"') . '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($listing->fields['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_draw_hidden_field('products_id', $listing->fields['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT) . '</form>';
//             } else {
//               $lc_button = '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('action')) . 'action=buy_now&products_id=' . $listing->fields['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_BUY_NOW, BUTTON_BUY_NOW_ALT, 'class="listingBuyNowButton"') . '</a>';
//             }
//           }
//         }
//         $the_button = $lc_button;
//         $products_link = '<a href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . ( ($_GET['manufacturers_id'] > 0 and $_GET['filter_id']) > 0 ? zen_get_generated_category_path_rev($_GET['filter_id']) : $_GET['cPath'] > 0 ? zen_get_generated_category_path_rev($_GET['cPath']) : zen_get_generated_category_path_rev($listing->fields['master_categories_id'])) . '&products_id=' . $listing->fields['products_id']) . '">' . MORE_INFO_TEXT . '</a>';
//         $lc_text .= '<br />' . zen_get_buy_now_button($listing->fields['products_id'], $the_button, $products_link) . '<br />' . zen_get_products_quantity_min_units_display($listing->fields['products_id']);
//         $lc_text .= '<br />' . (zen_get_show_product_switch($listing->fields['products_id'], 'ALWAYS_FREE_SHIPPING_IMAGE_SWITCH') ? (zen_get_product_is_always_free_shipping($listing->fields['products_id']) ? TEXT_PRODUCT_FREE_SHIPPING_ICON . '<br />' : '') : '');

//         break;
//         case 'PRODUCT_LIST_QUANTITY':
//         $lc_align = 'right';
//         $lc_text = $listing->fields['products_quantity'];
//         break;
//         case 'PRODUCT_LIST_WEIGHT':
//         $lc_align = 'right';
//         $lc_text = $listing->fields['products_weight'];
//         break;
//         case 'PRODUCT_LIST_IMAGE':
//         $lc_align = 'center';
//         if ($listing->fields['products_image'] == '' and PRODUCTS_IMAGE_NO_IMAGE_STATUS == 0) {
//           $lc_text = '';
//         } else {
//           if (isset($_GET['manufacturers_id'])) {
//             $lc_text = '<div style="width:176px"><a href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . (($_GET['manufacturers_id'] > 0 and $_GET['filter_id']) > 0 ?  zen_get_generated_category_path_rev($_GET['filter_id']) : ($_GET['cPath'] > 0 ? zen_get_generated_category_path_rev($_GET['cPath']) : zen_get_generated_category_path_rev($listing->fields['master_categories_id']))) . '&products_id=' . $listing->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $listing->fields['products_image'], $listing->fields['products_name'], IMAGE_PRODUCT_LISTING_WIDTH, IMAGE_PRODUCT_LISTING_HEIGHT, 'class="listingProductImage"') . '</a></div>';
//           } else {
//             $lc_text = '<div style="width:176px;"><a href="' . zen_href_link(zen_get_info_page($listing->fields['products_id']), 'cPath=' . (($_GET['manufacturers_id'] > 0 and $_GET['filter_id']) > 0 ?  zen_get_generated_category_path_rev($_GET['filter_id']) : ($_GET['cPath'] > 0 ? zen_get_generated_category_path_rev($_GET['cPath']) : zen_get_generated_category_path_rev($listing->fields['master_categories_id']))) . '&products_id=' . $listing->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $listing->fields['products_image'], $listing->fields['products_name'], IMAGE_PRODUCT_LISTING_WIDTH, IMAGE_PRODUCT_LISTING_HEIGHT, 'class="listingProductImage"') . '</a></div>';
//           }
//         }
//         break;
//       }

//       $list_box_contents[$rows][$col] = array('align' => $lc_align,
//                                               'params' => 'class="productListing-data"',
//                                               'text'  => $lc_text);
//     }
// --------------------------------------------------FIN LISTE PRODUIT ----------------------------------------------- 
    // add description and match alternating colors
    //if (PRODUCT_LIST_DESCRIPTION > 0) {
    //  $rows++;
    //  if ($extra_row == 1) {
    //    $list_box_description = "productListing-data-description-even";
    //    $extra_row=0;
    //  } else {
    //    $list_box_description = "productListing-data-description-odd";
    //    $extra_row=1;
    //  }
    //  $list_box_contents[$rows][] = array('params' => 'class="' . $list_box_description . '" colspan="' . $zc_col_count_description . '"',
    //  'text' => zen_trunc_string(zen_clean_html(stripslashes(zen_get_products_description($listing->fields['products_id'], $_SESSION['languages_id']))), PRODUCT_LIST_DESCRIPTION));
    //}
    $listing->MoveNext();
  // }
  // $lc_text .= "";
  $error_categories = false;
 } // else {
//   $list_box_contents = array();

//   $list_box_contents[0] = array('params' => 'class="productListing-odd"');
//   $list_box_contents[0][] = array('params' => 'class="productListing-data"',
//                                               'text' => TEXT_NO_PRODUCTS);

//   $error_categories = true;
// }

// if (($how_many > 0 and $show_submit == true and $listing_split->number_of_rows > 0) and (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART == 1 or  PRODUCT_LISTING_MULTIPLE_ADD_TO_CART == 3) ) {
//   $show_top_submit_button = true;
// } else {
//   $show_top_submit_button = false;
// }
// if (($how_many > 0 and $show_submit == true and $listing_split->number_of_rows > 0) and (PRODUCT_LISTING_MULTIPLE_ADD_TO_CART >= 2) ) {
//   $show_bottom_submit_button = true;
// } else {
//   $show_bottom_submit_button = false;
// }



  if ($how_many > 0 && PRODUCT_LISTING_MULTIPLE_ADD_TO_CART != 0 and $show_submit == true and $listing_split->number_of_rows > 0) {
  // bof: multiple products
    // echo zen_draw_form('multiple_products_cart_quantity', zen_href_link(FILENAME_DEFAULT, zen_get_all_get_params(array('action')) . 'action=multiple_products_add_product', $request_type), 'post', 'enctype="multipart/form-data"');
  }

