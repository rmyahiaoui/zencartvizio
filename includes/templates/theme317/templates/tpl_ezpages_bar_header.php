<?php
/**
 * Page Template
 *
 * Displays EZ-Pages Header-Bar content.<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_ezpages_bar_header.php 3377 2006-04-05 04:43:11Z ajeh $
 */

  /**
   * require code to show EZ-Pages list
   */
  include(DIR_WS_MODULES . zen_get_module_directory('ezpages_bar_header.php'));
?>
<?php if (sizeof($var_linksList) >= 1) { ?>
<div id="navEZPagesTop">
	<ul>
<?php for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {
		
		if ($i==1) {
			$kk = ' class="li_un"';
		} else {
			$kk = '';
		}

  ?>
	
  <li<?php echo $kk; ?>><a href="<?php echo $var_linksList[$i]['link']; ?>"><?php echo $var_linksList[$i]['name']; ?></a></li>
  <?php echo ($i < $n ? EZPAGES_SEPARATOR_HEADER : '') . "\n"; ?>
  
<?php } // end FOR loop ?>

    </ul>
</div>
<?php } ?>
