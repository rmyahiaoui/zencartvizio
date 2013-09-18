<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 5369 2006-12-23 10:55:52Z drbyte $
 */
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<div class="centerColumn" id="productGeneral">

<!--bof Product Name-->
<?php
  if(stripos($_GET['cPath'], "_")) {
    $tabId = array();
    $tabId = explode("_", intval($_GET['cPath']));
    $sql ="SELECT categories_name FROM categories_description WHERE categories_id = $tabId[0]";
    $rep = $db->Execute($sql);
    $pId = $_GET['products_id'];
    $sql = "SELECT categories_name FROM categories_description WHERE categories_id = $tabId[1]";
    $rep2 = $db->Execute($sql);
    // var_dump($sql);
    $afficheAriane = '<div style="margin-top:20px;color:#5e6d76;font-family:tahoma;font-style:italic;font-size:1em;">Home&nbsp;&nbsp;>&nbsp;&nbsp;'.$rep->fields['categories_name'].'&nbsp;&nbsp;>&nbsp;&nbsp;'.$rep2->fields['categories_name'].'&nbsp;&nbsp;>&nbsp;&nbsp;<span style="font-weight:normal;color:grey;">'.$products_name.'</span></div>';
  } else {
     $idFold = intval($_GET['cPath']);
     $sql ="SELECT categories_name FROM categories_description WHERE categories_id = $idFold";
     $rep = $db->Execute($sql);
     $afficheAriane = '<div style="margin-top:20px;color:#5e6d76;font-family:tahoma;font-style:italic;font-size:1em;">Accueil&nbsp;&nbsp;>&nbsp;&nbsp;'.$rep->fields['categories_name'].'&nbsp;&nbsp;>&nbsp;&nbsp;<span style="font-weight:normal;color:grey;">'.$products_name.'</span></div>' ;
  }

  $chapo = '<h3 style="color:#2798d4">'.$products_name.'</h3><p id="text_chapo_prod">Rncvuisdvnxfkvnfjkldvnfdjnvfkdvfdjk<br/>Rncvuisdvnxfkvnfjkldvnfdjnvfkdvfdjk<br/>Rncvuisdvnxfkvnfjkldvnfdjnvfkdvfdjk</p>';
// index.php?main_page=product_info&cPath=51_41&products_id=106
// index.php?main_page=index&cPath=54
if(isset($_GET['products_id'])) { }
?>

<script type="text/javascript"> affiche_menu('41_52', '51', '', ''); </script>
<h1 id="productNameAriane" ><span class="title-left-bg"><span class="title-right-bg"><?php echo $afficheAriane; ?></span></span></h1>
<?php echo $chapo;
echo '<p id="contact_prod"><img src="images/tbi_images/vue_prod/contact.png"></p>'; ?>
<!--eof Product Name-->

<!--bof Form start-->
<?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product'), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
<!--eof Form start-->

<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>

<!--bof Category Icon -->
<?php if ($module_show_categories != 0) {?>
<?php
/**
 * display the category icons
 */
// require($template->get_template_dir('/tpl_modules_category_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_icon_display.php'); ?>
<?php } ?>
<!--eof Category Icon -->

<!--bof Prev/Next top position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next top position-->

<!--bof Main Product Image -->
<?php
   if (zen_not_null($products_image)) { // Image principale
  ?>
<?php
/**
 * display the main product image
 */
  require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php');
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php');

   }
?>
<!--eof Main Product Image-->


<!--bof Product Price block -->
<!-- <h2 id="productPrices" class="productGeneral"> -->
<?php
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br />';
  } else {
    $one_time = '';
  }
  $prix = zen_get_products_display_price((int)$_GET['products_id']);
  $prix = preg_replace('#&euro;([0-9]+).00#', '$1', $prix). '&euro;';

  echo '<br/>
  <div id="prix_panier">
  <img src="images/tbi_images/page_prod/splash_prix.png" />&nbsp;<p class="prix"><span style="color:#2798d4">'.$prix.'</span></p><br/><br/>
  <img src="images/tbi_images/vue_prod/panier.png" /></div>
  <div id="social_prod"><img src="images/tbi_images/vue_prod/social.png" /></div>';

  // echo $one_time . 
?><!-- </h2> -->
<!--eof Product Price block -->

<!--bof free ship icon  -->
<?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
<div id="freeShippingIcon"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
<?php } ?>
<!--eof free ship icon  -->

 <!--bof Product description -->

<div id="descriptGlobal" >
  <div id='ongletPresentation'  onclick="affiche_onglet('ongletPresentation', 'productDescription');" ><p>Pr&eacute;sentation</p></div>
  <div id='ongletAvantages'  onclick="affiche_onglet('ongletAvantages', 'productAvantages');"><p>Avantages</p></div>
  <div id='ongletCaracTech' onclick="affiche_onglet('ongletCaracTech', 'productCaracTech');"><p>Caract&eacute;ristique techniques</p></div>
  <div id='ongletLogiAssoc' onclick="affiche_onglet('ongletLogiAssoc', 'productLogiAssoc');"><p>Logiciel associ&eacute;</p></div>
  <div id='ongletAccessAssoc' onclick="affiche_onglet('ongletAccessAssoc', 'productAccesAssoc');"><p>Accesssoires<br/> associ&eacute;s</p></div>
  <div id='ongletAppliAssoc' onclick="affiche_onglet('ongletAppliAssoc', 'productAppliAssoc');"><p>Application /<br/> T&eacute;moignages</p></div>
  <div id='descriptTextContener'>
    <div  id="productDescription" style="display:block" class="biggerText"><?php echo stripslashes($products_description); ?></div>
    <div  id="productAvantages"  style="display:none" class="biggerText" ><?php echo stripslashes($productsAvantages); ?></div>
    <div  id="productCaracTech"  style="display:none" class="biggerText"><?php echo stripslashes($productsCaracTech); ?></div>
    <div  id="productLogiAssoc"  style="display:none" class="biggerText"><?php echo stripslashes($productsLogiAssoc); ?></div>
    <div  id="productAccesAssoc" style="display:none" class="biggerText"><?php echo stripslashes($productsAccesAssoc); ?></div>
    <div  id="productAppliAssoc" style="display:none" class="biggerText"><?php echo stripslashes($productsAppliAssoc); ?></div>
  <div id="fond_bot">jnkl<br/></div>
  </div>
</div>



<!--eof Product description -->
<br class="clearBoth" />
<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
    <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            } else {
              // show the quantity box
    $the_button = PRODUCTS_ORDER_QTY_TEXT . '<input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" /><br />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . '<br />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            }
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
    <?php
      // echo '<div id="cartAdd">'.$display_qty;
      // echo $display_button.'</div>';
    ?>


<!-- Produit liés -->
<div id="acceProduct" style="margin-top:0px;">
  <img src="images/tbi_images/vue_prod/access_lie.png" /><br/><br/>
  <div style="border:1px solid #eeeeee;margin-bottom:50px;">
  <table   border="0" cellspacing="0" cellpadding="0" id="" style="border:0;border-collapse:collapse;width:750px">
                <tr class="productListing-odd">
                  <td class="productListing-data" align="center" style="width:310px;">
                    <?php
                  if(1==1) {
                      echo '<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&">
                      <img src="images/tbi_images/vue_prod/img_lie_defaut.png" alt="" title="" width="130" class="listingProductImage" style="position:relative" ></a>';
                  } else {
                      echo '<img src="images/" />';
                  } 
                    echo '
                  </td>
                  <td class="productListing-data" style="width:393px">
                    <h3  class="itemTitle"  style="background-color:#2798d4;font-size:1em;padding:7px;padding-left:15px;margin-top:-1px;">
                  <a style="color:white" href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&zenid=oqcvhm6b11063dcfir1jjiep42">Marque :
                  Smartech</a></h3>
                      <div style="background-image:url(images/tbi_images/page_prod/fond_prod.png);background-repeat:no-repeat;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;font-weight:none;font-family:Tahoma;margin-top:-10px;margin-bottom:10px;color:#858585;font-size:0.9em" class="listingDescription"><p style="margin-top:-5px;font-weight:bold;">Référence : 789456-45612</p>djsqhdsqjldhqsjldjqlsblablabla<br/>djsqhdsqjldhqsjldjqlsblablabla<br/>djsqhdsqjldhqsjldjqlsblablabla[...]<br/>
                        <p style="margin-top:20px;"><a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/page_prod/savoir_plus.png" /></a>&nbsp;&nbsp;<img src="images/tbi_images/page_prod/decouvrir.png" /></p>
                  </td>
                  <td class="productListing-data" align="right" style="font-weight:normal;font-size:1em;text-align:center;width:285px">
                    <div style="position:absolute;margin-top:-55px;margin-left:20px;">
                      <img src="images/tbi_images/page_prod/splash_prix.png" /><span style="color:#2798d4;font-size:1.4em;">
                        779&euro;</span>
                        <br/>
                        <span style="color:green"> Stock :</span>23</div>
                     <div style="position:absolute;margin-top:40px;"><img  name="products_id[2]" src="images/tbi_images/page_prod/ajouter_panier.png" /></div>
                  </td>
                </tr>';
           echo '</table>

           </div>';


    echo '  <img src="images/tbi_images/vue_prod/access_lie_ress.png" /><br/><br/>
          <div style="border:1px solid #eeeeee">
          <table   border="0" cellspacing="0" cellpadding="0" id="" style="border:0;border-collapse:collapse;width:750px;">
                <tr class="productListing-odd">
                  <td class="productListing-data" style="width:310px;text-align:center;">';
                  if(1==1) {
                      echo '<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&zenid=oqcvhm6b11063dcfir1jjiep42">
                      <img src="images/tbi_images/vue_prod/img_lie_logiciel_defaut.png" alt="" title="" width="130" class="listingProductImage" style="position:relative" ></a>';
                  } else {
                      echo '<img src="images/" />';
                  } 
                    echo '
                  </td>
                  <td class="productListing-data" style="width:393px">
                    <h3  class="itemTitle"  style="background-color:#2798d4;font-size:1em;padding:7px;padding-left:15px;margin-top:-1px;">
                  <a style="color:white" href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&zenid=oqcvhm6b11063dcfir1jjiep42">Marque :
                  Smartech</a></h3>
                      <div style="background-image:url(images/tbi_images/page_prod/fond_prod.png);background-repeat:no-repeat;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;font-weight:none;font-family:Tahoma;margin-top:-10px;margin-bottom:10px;color:#858585;font-size:0.9em" class="listingDescription"><p style="font-weight:bold;margin-top:-5px;">Référence : 789456-45612</p>djsqhdsqjldhqsjldjqlsblablabla<br/>djsqhdsqjldhqsjldjqlsblablabla<br/>djsqhdsqjldhqsjldjqlsblablabla[...]<br/>
                        <p style="margin-top:20px;"><a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/page_prod/savoir_plus.png" /></a>&nbsp;&nbsp;<img src="images/tbi_images/page_prod/decouvrir.png" /></p>
                  </td>
                  <td class="productListing-data" align="right" style="font-weight:normal;font-size:1em;text-align:center;width:315px;">
                    <div style="position:absolute;margin-top:-55px;margin-left:20px;">
                      <img src="images/tbi_images/page_prod/splash_prix.png" /><span style="color:#2798d4;font-size:1.4em;">
                        779&euro;</span>
                        <br/>
                        <span style="color:green"> Stock :</span>23</div>
                     <div style="position:absolute;margin-top:40px;"><img  name="products_id[2]" src="images/tbi_images/page_prod/ajouter_panier.png" /></div>
                  </td>
                </tr>';
           echo '</table></div>';

            ?>
<!--   <table >
    <tr>
      <td style="border:1px solid grey;width:152px;text-align:center;height:100px">Image<br/>produit</td>
      <td style="border:1px solid grey;width:350px;text-align:center;height:100px">Marque<br/>R&eacute;f&eacute;rence<br/><br/>
        Descriptif : les 20 premiers mots + en savoir + lien vers la fiche</td>
      <td style="border:1px solid grey;width:182px;text-align:center;height:100px">399&euro;<br/><p><?php echo zen_get_buy_now_button('1', $the_button); ?></p></td>
    </tr>
  </table> -->
</div>
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->

<!--bof Product details list  -->
<?php // if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
<!--<ul id="productDetailsList" class="floatingBox back"> -->
  <?php //echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li>' . TEXT_PRODUCT_MODEL . $products_model . '</li>' : '') . "\n"; ?>
  <?php //echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li>' . TEXT_PRODUCT_WEIGHT .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
  <?php //echo (($flag_show_product_info_quantity == 1) ? '<li>' . $products_quantity . TEXT_PRODUCT_QUANTITY . '</li>'  : '') . "\n"; ?>
  <?php //echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
<!--</ul> -->
<?php
  // }
?>
<br class="clearBoth" />
<!--eof Product details list -->

<!--bof Attributes Module -->
<?php
  if ($pr_attr->fields['total'] > 0) {
?>
<?php
/**
 * display the product atributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
<?php
  }
?>
<!--eof Attributes Module -->

<!--bof Quantity Discounts table -->
<?php
  if ($products_discount_type != 0) { ?>
<?php
/**
 * display the products quantity discount
 */
  require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
<?php
  }
?>
<!--eof Quantity Discounts table -->

<!--bof Additional Product Images -->
<?php
/**
 * display the products additional images
 */
 ?>
<!--eof Additional Product Images -->

<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>

<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CART_UPSELL));
/**
 * display the product previous/next helper
 */
 //require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next bottom position -->

<!--bof Tell a Friend button -->
<?php
  if ($flag_show_product_info_tell_a_friend == 1) { ?>
<div id="productTellFriendLink" class="buttonRow forward"><?php echo ($flag_show_product_info_tell_a_friend == 1 ? '<a href="' . zen_href_link(FILENAME_TELL_A_FRIEND, 'products_id=' . $_GET['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_TELLAFRIEND, BUTTON_TELLAFRIEND_ALT) . '</a>' : ''); ?></div>
<?php
  }
?>
<!--eof Tell a Friend button -->

<!--bof Reviews button and count-->
<?php

//  if ($flag_show_product_info_reviews == 1) {
    // if more than 0 reviews, then show reviews button; otherwise, show the "write review" button
//    if ($reviews->fields['count'] > 0 ) { ?>
<!-- <div id="productReviewLink" class="buttonRow back">
<?php // echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?></div>
<br class="clearBoth" />
<p class="reviewCount">
// echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?></p>
<?php // } else { ?>
<div id="productReviewLink" class="buttonRow back">
//echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?></div>
<br class="clearBoth" />
  }
}
<!--eof Reviews button and count -->


<!--bof Product date added/available-->
<?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
  <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
<?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
<!--       <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p> -->
<?php
    } // $flag_show_product_info_date_added
  }
?>
<!--eof Product date added/available -->

<!--bof Product URL -->
<?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
    <p id="productInfoLink" class="productGeneral centeredContent"><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($products_url), 'NONSSL', true, false)); ?></p>
<?php
    } // $flag_show_product_info_url
  }
?>
<!--eof Product URL -->

<!--bof also purchased products module-->
<?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
<!--eof also purchased products module-->

<!--bof Form close-->
</form>
<!--bof Form close-->
</div>

