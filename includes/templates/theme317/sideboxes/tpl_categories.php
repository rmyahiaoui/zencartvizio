<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id:tpl_categories.php 4162 2006-08-17 03:55:02Z ajeh $
 */
  $content = "";

  // $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" >' . "\n";
  $content .= '<div id="menu_test" >
<p style="margin-top:-2px;margin-left:-2px"><img src="images/tbi_images/page_prod/boutique.png" /></p>
  ' . "\n";
  // $content .= '<div style="text-align:left;">' . "\n";

  $li_class="";
  $levels = array();

  $j = 0;
  foreach($main_category_tree->tree as $key => $value){
    for ($i=0;$i<sizeof($box_categories_array);$i++){
        if($box_categories_array[$i]['path'] == 'cPath=' . $value['path']) {
            $levels[$i] = $value['level'];
            // var_dump($box_categories_array[$i]['path']);
        }
    }
    $j++;
  }
  for ($i=0;$i<sizeof($box_categories_array);$i++) {


    // switch(true) {
// to make a specific category stand out define a new class in the stylesheet example:A.category-holiday
// uncomment the select below and set the cPath=3 to the cPath= your_categories_id
// many variations of this can be done
//      case ($box_categories_array[$i]['path'] == 'cPath=3'):
//        $new_style = 'category-holiday';
//        break;




      // case ($box_categories_array[$i]['top'] == 'true'):
      //         if($i == 0)
      //       {
      //         $new_style = 'category-top_un';
      //         $li_class='<li ><span class="top-span">';
      //         break;
      //       }

      //       else {
      //   $new_style = 'category-top';
      //   $li_class='<li ><span class="top-span">';
      //   break;
      //   }
      // case ($box_categories_array[$i]['has_sub_cat']):
      //   $new_style = 'category-subs';
      //   $li_class='<li  style="margin-left:' . 16 * ($levels[$i]) . 'px">';
      //   break;
      // default:
      //   $new_style = 'category-products';
      //   $li_class='<li style="margin-left:' . 15 * ($levels[$i]) . 'px">';
      //   break;

      // }

     if (zen_get_product_types_to_category($box_categories_array[$i]['path']) == 3 or ($box_categories_array[$i]['top'] != 'true' and SHOW_CATEGORIES_SUBCATEGORIES_ALWAYS != 1)) {
        // skip if this is for the document box (==3)
      } else {
      // $content .= $li_class;

     // echo  zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']).'<br/>';
      $id = preg_replace('#cPath=([0-9]+)#', '$1', $box_categories_array[$i]['path']);
      if ($box_categories_array[$i]['has_sub_cat']) { // Si on a des sous categories
        $infoCat = array();
        $sousSousCat = array();
        $sql = "SELECT categories_name, cat.categories_id
                FROM categories cat
                INNER JOIN  categories_description catdesc
                ON cat.categories_id = catdesc.categories_id
                WHERE parent_id = $id";
        $sousCat = $db->Execute($sql);
        $c=0;
        $p=0;
        // var_dump($sousCat);
        $infoCat[0]['parent'] = $id;
          while (!$sousCat->EOF) { // premiere sous categories
              $infoCat[$c]['name'] = $sousCat->fields['categories_name'];
              $infoCat[$c]['id'] = $sousCat->fields['categories_id'];
              $c++;
                 if($p != 0) {
                 $infoCatId .= '_'.$sousCat->fields['categories_id'];
                 $infoCatName .= '_'.$sousCat->fields['categories_name'];
                } else {
                 $infoCatId = $sousCat->fields['categories_id'];
                 $infoCatName = $sousCat->fields['categories_name'];
                }
                // $infoCat[$p]['id'] = $sousCat->fields['categories_id'];
                $p++;
                $sousCat->MoveNext();
          }
          $infoSousCatId = '';
          $infoSousCat = array();
          $e = 0;
          for ($x=0; $x < sizeof($infoCat); $x++) { 
             $sql = 'SELECT c.categories_id, cd.categories_name 
             FROM categories c
             INNER JOIN categories_description cd
             ON c.categories_id = cd.categories_id
             WHERE c.parent_id = '.$infoCat[$x]['id'].'';
             $sousSousCat = $db->Execute($sql); // deuxieme sous categorie
             $z=0;
              while (!$sousSousCat->EOF) {
                $infoSousCat[$z]['parent'] = $infoCat[$x]['id'];
                $infoSousCat[$z]['name'] = $sousSousCat->fields['categories_name'];
                $infoSousCat[$z]['id'] = $sousSousCat->fields['categories_id'];
                if($z != 0) {
                 $infoSousCatId .= '_'.$sousSousCat->fields['categories_id'];
                 $infoSousCatName .= '_'.$sousSousCat->fields['categories_name'];
                } else {
                 $infoSousCatId = $sousSousCat->fields['categories_id'];
                 $infoSousCatName = $sousSousCat->fields['categories_name'];
                }
                // $infoSousCat[$p]['id'] = $sousSousCat->fields['categories_id'];
                $z++;
                $sousSousCat->MoveNext();
              }
          }
        if (!$infoSousCatId) {
          $infoSousCatId = 0;
          $infoSousCatName = '';
        }

        // var_dump($infoSousCatId);
          $subCpath = 'cPath='.$infoCat['id'];
      // $sousM = '<img style="margin-top:5px" src="images/fleche_fold.png" />';
          $content .= '<h3 class="lienAvecSousCat"  onclick="chargeProduitCat(\''.$id.'\');affiche_menu(\''.$infoCatId.'\', \''.$id.'\', \''.zen_href_link(FILENAME_DEFAULT, $subCpath).'\', \'\');">
          <span style="color:transparent;" id="testeuh'.$id.'">&nbsp;&nbsp;..</span>&nbsp;'.$box_categories_array[$i]['name'] .'</h3>'; // TBI fixe, Logiciels... = Premiere categ

          for ($y=0; $y < sizeof($infoCat); $y++) { 
                if(($y+1)==sizeof($infoCat)) {
                  $borderSepartCat = 'border-bottom:1px solid #ccc;';
                }
                if($infoCat[$y]['id'] == $infoSousCat[0]['parent']) { //Ressource pedag.. etc = Sous sous (2) categ
                 $content .= '<h3 class="lienAvecSousCat" id="cache'.$infoCat[$y]['id'].'" style="display:none;margin-bottom:10px;padding-left:10px;'.$borderSepartCat.'" onclick="chargeProduitCat(\''.$infoCat[$y]['id'].'\');affiche_menu(\''.$infoSousCatId.'\', \''.$infoCat[$y]['id'].'\', \''.zen_href_link(FILENAME_DEFAULT, $subCpath).'\', \'\');">
                   <span style="color:transparent;" id="testeuh'.$infoCat[$y]['id'].'">&nbsp;&nbsp;..</span>'.$infoCat[$y]['name'].'</h3>';
                   for ($u=0; $u < sizeof($infoSousCat); $u++) { // CP, CM2 etc = Sous sous sous (3) categ
                        if(($u+1)==sizeof($infoSousCat)) {
                          $borderSepartSSCat = 'border-bottom:1px solid #ccc;';
                        }
                      $content .= '<h3  class="lienSansSousCat"  style="display:none;padding-left:60px;margin-bottom:10px;'.$borderSepartSSCat.'" onclick="chargeProduitCat(\''.$infoSousCat[$u]['id'].'\');affiche_menu(\'0\', \''.$infoSousCat[$u]['id'].'\', \'\', \'\');" id="cache'.$infoSousCat[$u]['id'].'" ><span  id="justLink"><img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;</span>'.$infoSousCat[$u]['name'].'</h3>';
                  }
                }
                else { // Si juste (1) sous categ
                 $content .= '<h3  class="lienSansSousCat"  id="cache'.$infoCat[$y]['id'].'" style="display:none;padding-left:30px;" onclick="chargeProduitCat(\''.$infoCat[$y]['id'].'\');affiche_menu(\'0\', \''.$infoCat[$y]['id'].'\', \''.zen_href_link(FILENAME_DEFAULT, $subCpath).'\', \'\');"><span id="justLink"><img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;</span>'.$infoCat[$y]['name'].'</h3>';
                }

          }

          // $content .= '<div  id="cache'.$id.'" style="display:none;padding-left:40px;margin-bottom:13px;"></div>';
      } else { // Si pas de sous-categ, on affiche direct
                // $content .= zen_href_link(FILENAME_DEFAULT, $subCpath);
          $content .= '<h3 class="lienSansSousCat" id="cache'.$id.'" onclick="chargeProduitCat(\''.$id.'\');affiche_menu(\'0\', \''.$id.'\', \'\', \'\');"><img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;'.$box_categories_array[$i]['name'].'</h3>';
          // <a href="'.zen_href_link(FILENAME_DEFAULT, $box_categories_array[$i]['path']).'" />'.$box_categories_array[$i]['name'].'</a>
      }

      // if ($box_categories_array[$i]['current']) {
      //   if ($box_categories_array[$i]['has_sub_cat']) {
      //     // Si on a un sous menu alors
      //     $sql = '';
      //     $content .= '<span class="category-subs-parent">' . $box_categories_array[$i]['name'] . '</span>';
      //   }else {
      //     $content .= '<span class="category-subs-selected">' . $box_categories_array[$i]['name'] . '</span>';
      //   }
      // }else {
      //   $content .= $box_categories_array[$i]['name'];
      // }
      // if ($box_categories_array[$i]['has_sub_cat']) {
      //   $content .= CATEGORIES_SEPARATOR;
      // }
      // $content .= '</div>';


      // $content .='<div id="cache'.$id.'" style="display:block;margin-left:20px;width:200px"></div>';


      if (SHOW_COUNTS == 'true') {
        if ((CATEGORIES_COUNT_ZERO == '1' and $box_categories_array[$i]['count'] == 0) or $box_categories_array[$i]['count'] >= 1) {
          $content .= CATEGORIES_COUNT_PREFIX . $box_categories_array[$i]['count'] . CATEGORIES_COUNT_SUFFIX;
        }
      }

      // $content .= '</span></li>';
    }
  }
      $content .= '</div>';

  if (SHOW_CATEGORIES_BOX_SPECIALS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true' or SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true' or SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {

// display a separator between categories and links
    if (SHOW_CATEGORIES_SEPARATOR_LINK == '1') {
      $content .= '<div id="catBoxDivider"></div>' . "\n";
    }

     $content .= '<div class="box_body_2"><ul>';


    if (SHOW_CATEGORIES_BOX_SPECIALS == 'true') {
      $show_this = $db->Execute("select s.products_id from " . TABLE_SPECIALS . " s where s.status= 1 limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<li><a class="category-links" href="' . zen_href_link(FILENAME_SPECIALS) . '">' . CATEGORIES_BOX_HEADING_SPECIALS . '</a></li>' . "\n";
      }
    }

    if (SHOW_CATEGORIES_BOX_PRODUCTS_NEW == 'true') {
      // display limits
//      $display_limit = zen_get_products_new_timelimit();
      $display_limit = zen_get_new_date_range();

      $show_this = $db->Execute("select p.products_id
                                 from " . TABLE_PRODUCTS . " p
                                 where p.products_status = 1 " . $display_limit . " limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<li><a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_NEW) . '">' . CATEGORIES_BOX_HEADING_WHATS_NEW . '</a></li>' . "\n";
      }
    }

    if (SHOW_CATEGORIES_BOX_FEATURED_PRODUCTS == 'true') {
      $show_this = $db->Execute("select products_id from " . TABLE_FEATURED . " where status= 1 limit 1");
      if ($show_this->RecordCount() > 0) {
        $content .= '<li><a class="category-links" href="' . zen_href_link(FILENAME_FEATURED_PRODUCTS) . '">' . CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS . '</a></li>' . "\n";
      }
    }

    if (SHOW_CATEGORIES_BOX_PRODUCTS_ALL == 'true') {
      $content .= '<li><a class="category-links" href="' . zen_href_link(FILENAME_PRODUCTS_ALL) . '">' . CATEGORIES_BOX_HEADING_PRODUCTS_ALL . '</a></li>' . "\n";
    }

    $content .= '</ul></div>';

  }
  $content .= '</div>';
?>
