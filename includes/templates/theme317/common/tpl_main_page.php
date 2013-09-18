<?php
/**
 * Common Template - tpl_main_page.php
 *
 * Governs the overall layout of an entire page<br />
 * Normally consisting of a header, left side column. center column. right side column and footer<br />
 * For customizing, this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * - make a directory /templates/my_template/privacy<br />
 * - copy /templates/templates_defaults/common/tpl_main_page.php to /templates/my_template/privacy/tpl_main_page.php<br />
 * <br />
 * to override the global settings and turn off columns un-comment the lines below for the correct column to turn off<br />
 * to turn off the header and/or footer uncomment the lines below<br />
 * Note: header can be disabled in the tpl_header.php<br />
 * Note: footer can be disabled in the tpl_footer.php<br />
 * <br />
 * $flag_disable_header = true;<br />
 * $flag_disable_left = true;<br />
 * $flag_disable_right = true;<br />
 * $flag_disable_footer = true;<br />
 * <br />
 * // example to not display right column on main page when Always Show Categories is OFF<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 * <br />
 * example to not display right column on main page when Always Show Categories is ON and set to categories_id 3<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '' or $cPath == '3') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_main_page.php 4886 2006-11-05 09:01:18Z drbyte $
 */

// the following IF statement can be duplicated/modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'quotavi')) ) {
    $flag_disable_left = true;
  }

  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_main_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
?>


<!-- ========== IMAGE BORDER TOP ========== -->

<div id="main-width">

<!-- ====================================== -->



<!-- ========== HEADER ========== -->
<?php
 /* prepares and displays header output */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }
  require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');
?>
<!-- ============================ -->


 <!-- <body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>> -->
 <body>

<?php 
 		if (!stripos($_SERVER['REQUEST_URI'], 'cPath' )
 			AND !stripos($_SERVER['REQUEST_URI'], 'shopping_cart')
 			AND !stripos($_SERVER['REQUEST_URI'], 'create_account')
 			AND !stripos($_SERVER['REQUEST_URI'], 'time_out')
 			AND !stripos($_SERVER['REQUEST_URI'], 'account')
 			AND !stripos($_SERVER['REQUEST_URI'], 'address_book')
			AND !stripos($_SERVER['REQUEST_URI'], 'login' )) 
 			 {
?> 
				<div id="body">
			<div id="wrap_body">
				<div id="bloc_droite">
					<div id="boutique">
						<a style="" href="http://127.0.0.1/tbi/index.php?main_page=index&cPath=8&products_id=43"><h3 >PARCOURIR<br/> LA BOUTIQUE</h3></a>
					</div>
					<div id="grand_compte">
						<h3>ADMINISTRATION<br/>GRANDS COMPTES</h3>
						<a href="#"></a>
					</div>
					<div id="installation">
						<h3>INSTALLATION</h3>
						<a href="#"></a>
					</div>
					<div id="formation">
						<h3>FORMATION</h3>
						<a href="#"></a>
					</div>
				</div>
				<div id="bonnes_affaires">
					<div id="home_produit1">
						<div id="pastille1"><span class="home_prix">1200&euro;</span><br/><span class="home_prix_barre">1670&euro;</span></div>
						<img src="images/tbi_images/body/produits/prod1.png" />
						<p class="imgtexte"><span class="titre">EASYBEAM</span><br/><span class="home_texte_prod">TBI mobile : le nomade</span></p>
						<br/><p class="boutonprod"><a href="index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/body/savoirplus.png" /></a></p>
					</div>
					<div id="home_produit2">
						<div id="pastille2"><span class="home_prix">1890&euro;</span><br/><span class="home_prix_barre">1970&euro;</span></div>
						<img src="images/tbi_images/body/produits/prod2.png" />
						<p class="imgtexte"><span class="titre">SMART</span><br/><span class="home_texte_prod">Board interactive whiteboard<br/>system</span></p>
						<br/><p class="boutonprod"><a href="index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/body/savoirplus.png" /></a></p>
					</div>
					<div id="home_produit3">
						<div id="pastille3"><span class="home_prix">500&euro;</span><br/><span class="home_prix_barre">600&euro;</span></div>
						<img src="images/tbi_images/body/produits/prod3.png" />
						<p class="imgtexte"><span class="titre">EASYBEAM</span><br/><span class="home_texte_prod">Interactive Projector</span></p>
						<br/><p class="boutonprod"><a href="index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/body/savoirplus.png" /></a></p>
					</div>
					<div id="home_produit4">
						<div id="pastille4"><span class="home_prix">5600&euro;</span><br/><span class="home_prix_barre">6600&euro;</span></div>
						<img src="images/tbi_images/body/produits/prod4.png" />
						<p class="imgtexte"><span class="titre">Hitachi</span><br/><span class="home_texte_prod">StarBord DCHD5M<br/>visualisateur de documents</span></p>
						<br/><p class="boutonprod"><a href="index.php?main_page=product_info&cPath=8&products_id=43"><img src="images/tbi_images/body/savoirplus.png" /></a></p>
					</div></p>

				</div>
				<div id="devis_body">
					<div id="home_image_devis"></div>

				</div>
				<div id="temoignages">
					<div id="fond_com1"><div id="aste_temoi1" /></div><h4>Murielle,<br/> enseignante en classe de 4eme</h4><p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p></div>
					<div id="fond_com2"><div id="aste_temoi2" /></div><h4>Ludovic,<br/> directeur marketing</h4><p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore 		magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p></div>
					<div id="fond_com3"><div id="aste_temoi1" /></div><h4>Marie,<br/> directrice de lyc&eacute;e</h4><p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitationminim veniam, quis nostrud exercitationminim veniam, quis nostrud exercitationminim veniam, quis nostrud exercitation</p></div>
				</div>
			</div>
		</div>



<!-- <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
	<tr>
    
		<?php
			if (COLUMN_LEFT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
			  // global disable of column_left
			  $flag_disable_left = true;
			}
			if (!isset($flag_disable_left) || !$flag_disable_left) {
		?>
		
            <td id="column-left" style="width:<?php echo COLUMN_WIDTH_LEFT; ?>;">
				<div style="width:<?php echo COLUMN_WIDTH_LEFT; ?>;">
					<?php
                     /* ----- prepares and displays left column sideboxes ----- */
                    ?>
                 <?php // require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?> 
                </div>
            </td> -->
            
		<?php
			}
        ?>	
<!-- 		
            <td id="column-center" valign="top">
            	
                <div class="main-content">
                	<div class="left-top-corner">
						<div class="right-top-corner">
							<div class="right-bot-corner">
								<div class="left-bot-corner">
									<div class="main-indent">
									<div class="margin-bot">
									<!--content_center-->
								
								
										<!-- bof breadcrumb -->
										<?php  //if (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page) ) { ?>
											<!-- <div id="navBreadCrumb"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div> -->
										<?php  //} ?>
										<!-- eof breadcrumb -->
									
					
										<!-- bof upload alerts -->
										<?php // if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); ?>
										<!-- eof upload alerts -->
					
									
										<?php
											/* ----- prepares and displays center column ----- */
											// require($body_code);
										
										?>
										
								
									<!-- <div class="clear"></div> -->
									
									<!--eof content_center
									</div>
									</div>
                				</div>
							</div>
						</div>
					</div>
                </div>                  
                
            </td> -->
			
		<?php
        if (COLUMN_RIGHT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
          // global disable of column_right
          $flag_disable_right = true;
        }
        if (!isset($flag_disable_right) || !$flag_disable_right) {
        ?>

            <td id="column_right" style="width:<?php echo COLUMN_WIDTH_RIGHT; ?>">
    
                <div style="width:<?php echo COLUMN_WIDTH_RIGHT; ?>;">
                    <?php
                     /* ----- prepares and displays right column sideboxes ----- */
                    ?>
                    <?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?>
                </div>
    
            </td>
			
        <?php
        }
        ?>
        
    </tr>
</table>

<!-- ========== FOOTER ========== -->
<?php
 /* prepares and displays footer output */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_footer = true;
  }
  require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
?>
<!-- ============================ -->


<!--bof- parse time display -->
<?php
  if (DISPLAY_PAGE_PARSE_TIME == 'true') {
?>
<div class="smallText center">Parse Time: <?php echo $parse_time; ?> - Number of Queries: <?php echo $db->queryCount(); ?> - Query Time: <?php echo $db->queryTime(); ?></div>
<?php
  }
?>
<!--eof- parse time display -->


<!-- BOF- BANNER #6 display -->
<?php
	if (SHOW_BANNERS_GROUP_SET6 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET6)) {
  		if ($banner->RecordCount() > 0) {
?>
			<div id="bannerSix" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    	}
	}
?>
<!-- EOF- BANNER #6 display -->


<!-- ========== IMAGE BORDER BOTTOM ========== -->

    </div>

<!-- ========================================= -->

<?php
	if (GOOGLE_ANALYTICS_TRACKING_TYPE == "Asynchronous") {
	// Do nothing
	} else {
	require(DIR_WS_TEMPLATE . 'google_analytics/google_analytics.php');
	}

} else  {
 	if(!stripos($_SERVER['REQUEST_URI'], 'shopping_cart' ) // On affiche la boutique si on est pas dans al home ou page c
		AND !stripos($_SERVER['REQUEST_URI'], 'create_account' )
		AND !stripos($_SERVER['REQUEST_URI'], 'time_out' )
		AND !stripos($_SERVER['REQUEST_URI'], 'account' )
		AND !stripos($_SERVER['REQUEST_URI'], 'address_book' )
		AND !stripos($_SERVER['REQUEST_URI'], 'login' ))
 	 {
 		require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); 
 	}
 	echo '<div id="wrap_body_code">';
		require($body_code);
	echo '</div>';
}// Fin if

?>
</body>