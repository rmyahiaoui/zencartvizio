<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_search.php 4142 2006-08-15 04:32:54Z drbyte $
 */
  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
  $content .= zen_draw_form('quick_find', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get');
  $content .= zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
  $content .= zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();

  if (strtolower(IMAGE_USE_CSS_BUTTONS) == 'no') {

    $content .= '
    <p><span style="color:grey">Type produit</span>
    <select style="width:200px">
        <option>&nbsp;TBI pointer</option>
        <option>&nbsp;TBI mobile</option>
        <option>&nbsp;TBI fixe</option>
        <option>&nbsp;VPI</option>
      </select>
    </p><br/>
      <p>
       <span style="color:grey"> Marque</span>
          <select style="width:200px">
        <option>&nbsp;Epson</option>
        <option>&nbsp;Casio</option>
        <option>&nbsp;Hitachi</option>
        <option>&nbsp;Benq</option>
      </select>
      </p><br/><br/>';
    $content .= zen_draw_input_field('keyword', '', 'class="input1"' . ($column_width-85) . 'px"') . ' ' . zen_image_submit ('search1.gif',HEADER_SEARCH_BUTTON);
    //$content .= '<br /><a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>';
  } else {
    $content .= zen_draw_input_field('keyword', '', 'size="18" maxlength="100" style="width: ' . ($column_width-85) . 'px;" value="' . HEADER_SEARCH_DEFAULT_TEXT . '" onfocus="if (this.value == \'' . HEADER_SEARCH_DEFAULT_TEXT . '\') this.value = \'\';" onblur="if (this.value == \'\') this.value = \'' . HEADER_SEARCH_DEFAULT_TEXT . '\';"') . ' <input type="submit" value="' . HEADER_SEARCH_BUTTON . '" style="width: 47px" /><br/></input type="text />';
    $content .= '<br /><a href="' . zen_href_link(FILENAME_ADVANCED_SEARCH) . '">' . BOX_SEARCH_ADVANCED_SEARCH . '</a>';
  }

  $content .= "</form>";
  $content .= '</div>';
?>
