<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_header = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $
 */
?>
<?php


  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message']);
} else {

}
?>


<?php
$styleSlide ='';
global $bodyTrue;
if(!stripos($_SERVER['REQUEST_URI'], 'cPath' )
 AND !stripos($_SERVER['REQUEST_URI'], 'shopping_cart')
 AND !stripos($_SERVER['REQUEST_URI'], 'create_account')
 AND !stripos($_SERVER['REQUEST_URI'], 'time_out')
 AND !stripos($_SERVER['REQUEST_URI'], 'account')
 AND !stripos($_SERVER['REQUEST_URI'], 'address_book')
 AND !stripos($_SERVER['REQUEST_URI'], 'checkout_shipping')
 AND !stripos($_SERVER['REQUEST_URI'], 'login' )) {
	$styleSlide = '';
} else {
	$styleSlide = 'style="background-image:none;height:256px;"';
}
var_dump($_SESSION);
?>
<body>
		<div id="slide_bulle" <?php echo $styleSlide; ?> >
			<div id="wrap_menu" style="position:relative;width:1100px;margin-left:auto;margin-right:auto;">
				<div id="logo"><a href="/" ></a></div>
				<div id="tel"></div>
				<div id="devis_head"></div>
				<?php // echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?> <!-- lien -->
				<?php // echo BOX_HEADING_SHOPPING_CART;?> <!-- texte -->
				<div id="panier"><a style="display:block;width:100%;height:100%" href="index.php?main_page=shopping_cart"></a>: <?php echo $cart_text ?></div>
				<div id="esp_client"><a style="display:block;width:100%;height:100%" href="index.php?main_page=login"></a></div>
				<div id="barre_menu">
						<!-- ========== MENU ========== -->
						<div class="menu" style="margin-top:8px;height:45px;margin-left:-20px;width:1019px;text-align:left;">

							<!-- if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) {
								require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php');
							 }  -->
							<ul >
								<li style="width:96px;height:40px;margin-top:-8px;font-size:0.9em;">

							        <div class="zmenu" style="margin-left:0px;margin-top:39px;width:979px;height:500px;">
							        	<div id="illu1_menu" ><img src="images/tbi_images/menu/illu_1.jpg" /></div>
								        <div id="illu2_menu" ><img src="images/tbi_images/menu/illu_2.png" /></div>
										<div id="separt_menu" ></div>

							        	<div id="gaucheSMenu" style="float:left">
								        	<h3 >TBI Pointer</h3><br/>
								        	<table >
								        		<tr><td ><h4>Le produit :</h4></td></tr>
												<tr><td nowrap><img src="images/tbi_images/menu/fleche.png" /><a style="color:black" href="http://127.0.0.1/tbi/index.php?main_page=index&cPath=8">Achat TBI mobile pointer</a></td></tr></table>
												<div>
													<h4 >Les accessoires les + vendus :</h4><br/>
													<img src="images/tbi_images/menu/miniillu_1.jpg" ><br.>
													<div style="margin-top:-100px;margin-left:72px;">
													<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="http://127.0.0.1/tbi/index.php?main_page=index&cPath=54">Stylet tbi pointer</a><br/><br/>
													<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Coque de protection tbi pointer	</a><br/><br/>
													<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Malette tbi pointer</a><br/><br/>
													<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Voir tous les accessoires du tbi pointer</a></div><br/>
										<!-- 		<tr><td colspan="2"><h4 >Les logiciels les + utilis&eacute;s</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel pour maternelle : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel histoire g&eacute;o : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel math&eacute;matique : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Voir tous les logiciels du tbi nomade</a></td></tr> -->
											</div>
										</div>
										<div id='droiteSMenu' style="float:right;">
											<h3 style="border-bottom:1px solid #ccc;">TBI Nomade</h3>
												<h4 >Le produit :</h4><br/>
												<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Achat TBI mobile nomade</a><br/><br/>
												<div>
												<h4 >Les accessoires les + vendus :</h4>
												<img src="images/tbi_images/menu/miniillu_1.jpg" />
												<div style="margin-top:-100px;margin-left:72px;">
													<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Stylet tbi nomade</a><br/><br/>
												<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Coque de protection tbi nomade</a><br/><br/>
												<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#">Malette tbi nomade</a><br/><br/>
												<img src="images/tbi_images/menu/fleche.png" />&nbsp;&nbsp;<a style="color:black" href="#"> Voir tous les accessoires du tbi nomade</a>
												<!-- <tr><td colspan="2">
												<h4 >Les logiciels les + utilis&eacute;s</h4>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel pour maternelle : r&eacute;f&eacute;rence  </a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel histoire g&eacute;o : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel math&eacute;matique : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Voir tous les logiciels du tbi nomade</a></td></tr> -->
											</div>
										</div>
									<div id="contient_menu_pub" style="width:978px;height:113px;position:absolute;margin-top:70px;margin-left:-515px;">
										<div class="menu_pub_1"></div>
										<div class="menu_pub" style="margin-left:163px"><span>GARANTIE</span><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<div style="text-align:left;font-family:tahoma;text-decoration:underline;color:#1c4358;margin-left:5px">
											<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:326px"><span>INSTALLATION TBI/VPI</span><img src="images/tbi_images/menu/outils.png" /></div>
										<div class="menu_pub" style="margin-left:489px"><span>FORMATION TBI/VPI</span><img src="images/tbi_images/menu/formation.png" /></div>
										<div class="menu_pub" style="margin-left:652px"><span>LOGICIEL TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:815px"><span>RESSOURCES TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
									</div>
							    </li>

							<!-- 2?me sous-partie du menu -->
								<li style="width:81px;margin-top:-8px;margin-left:-5px;height:40px;padding:0;padding-left:15px;padding-right:15px;padding-top:10px;font-size:0.9em;">
						<!-- 			<p style="margin-left:px;">
							    		<a href="#" style="color:black">TBI FIXE</a>
							    	</p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:29px;margin-left:-110px;">
										<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">TBI board</h3><br/>
								        	<table >
								        		<tr><td colspan="2"><h4 >Le produit :</h4></td>
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat TBI fixe board	</a></td>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet TBI fixe board</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection TBI fixe board</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette TBI fixe board</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Voir tous les accessoires du TBI fixe board</a></td></tr>
											</table>
										</div>
										<div id='droiteSMenu' style="float:right">
											<h3 style="border-bottom:1px solid #ccc;">Ecran interactif</h3>
												<table>
												<tr><td colspan="2"><h4 >Le produit :</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat &eacute;cran interactif</a></td></tr>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet &eacute;cran interactif</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection &eacute;cran interactif	</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette &eacute;cran interactif</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#"> Voir tous les accessoires de l'&eacute;cran interactif	</a></td></tr>
											</table>
										</div>
							        <div id="contient_menu_pub" style="width:978px;height:113px;position:absolute;margin-top:385px;margin-left:-1px;">
										<div class="menu_pub_1"></div>
										<div class="menu_pub" style="margin-left:163px"><span>GARANTIE</span><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<div style="text-align:left;font-family:tahoma;text-decoration:underline;color:#1c4358;margin-left:5px">
											<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:326px"><span>INSTALLATION TBI/VPI</span><img src="images/tbi_images/menu/outils.png" /></div>
										<div class="menu_pub" style="margin-left:489px"><span>FORMATION TBI/VPI</span><img src="images/tbi_images/menu/formation.png" /></div>
										<div class="menu_pub" style="margin-left:652px"><span>LOGICIEL TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:815px"><span>RESSOURCES TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
									</div>
							    </li>

							<!-- 3?me sous-partie du menu -->
								<li style="width:147px;margin-top:-8px;margin-left:-5px;height:40px;padding:0;font-size:0.9em;">
							<!-- 		<p style="margin-top:18px;">
							    	<a style="color:black;" href="#">VID&EACUTE;OPROJECTEUR<br/> INT&EACUTE;RACTIF (VPI)</a>
							        </p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-175px;">
							        	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">TBI Pointer</h3><br/>
								        	<table >
								        		<tr><td colspan="2"><h4 >Le produit :</h4></td>
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat TBI mobile pointer</a></td>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet tbi pointer</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection tbi pointer	</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette tbi pointer</a></td>
												<tr><td colspan="2"><h4 >Les logiciels les + utilis&eacute;s</h4></td></tr>
											</table>
										</div>
										<div id='droiteSMenu' style="float:right">
											<h3 style="border-bottom:1px solid #ccc;">TBI Nomade</h3>
												<table>
												<tr><td colspan="2"><h4 >Le produit :</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat TBI mobile nomade</a></td></tr>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet tbi nomade</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection tbi nomade</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette tbi nomade</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#"> Voir tous les accessoires du tbi nomade</a></td></tr>
											</table>
										</div>
										<div id="contient_menu_pub" style="width:978px;height:113px;position:absolute;margin-top:385px;margin-left:-1px;">
										<div class="menu_pub_1"></div>
										<div class="menu_pub" style="margin-left:163px"><span>GARANTIE</span><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<div style="text-align:left;font-family:tahoma;text-decoration:underline;color:#1c4358;margin-left:5px">
											<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:326px"><span>INSTALLATION TBI/VPI</span><img src="images/tbi_images/menu/outils.png" /></div>
										<div class="menu_pub" style="margin-left:489px"><span>FORMATION TBI/VPI</span><img src="images/tbi_images/menu/formation.png" /></div>
										<div class="menu_pub" style="margin-left:652px"><span>LOGICIEL TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:815px"><span>RESSOURCES TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
									</div>
							        </div>
							    </li>
							<!-- 3?me BIS sous-partie du menu -->
								<li style="width:126px;margin-left:-5px;margin-top:-8px;height:40px;padding:0;font-size:0.9em;">
									<!-- <p style="margin-top:18px;">
							    	<a style="color:black;" href="#">VISUALISEUR</a>
							        </p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-321px">
							            	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">Gamme de visualiseur</h3><br/>
								        	<table >
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 1</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 2</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 3</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 4</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 5</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 6</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 7</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">visualiseur + marque 8</a></td>
											</tr></table>
										</div>
										<div id='droiteSMenu' style="float:right">
											<h3 style="border-bottom:1px solid #ccc;">Qu'est ce qu'un visualiseur</h3>
												<table>
												<tr><td style="text-align:center">
												<h4 >Descriptif</h4></td></tr>
												<tr><td><img src="images/vis3.jpg" /></td></tr>
											</table>
										</div>
							        </div>
							    </li>

							<!-- 4?me sous-partie du menu -->
									<li style="width:135px;margin-top:-8px;height:40px;padding:0;font-size:0.9em;margin-left:-5px">
							    	<!-- <p style="margin-top:18px;">
							    		<a style="color:black;" href="#">ACCESSOIRES <br/>TBI</a>
							    	</p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-446px">
							        	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">Accessoires TBI class&eacute;s par produit</h3><br/>
								        	<table >
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection TBI 	</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette TBI 	</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet TBI</a></td></tr>
											</tr></table>
										</div>
										<div id='droiteSMenu' style="float:right">
											<h3 style="border-bottom:1px solid #ccc;">Accessoires TBI class&eacute;s par marque</h3>
												<table>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Accessoires TBI marque 1</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Accessoires TBI marque 2	</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Accessoires TBI marque 3</a></td></tr>
											</table>
										</div>
							        </div>
							    </li>
							<!-- 5eme partie  -->
							    <li style="margin-top:-8px;font-size:0.9em;height:40px;padding:0;width:152px;margin-left:-5px;">
							    <!-- 	<p style="margin-top:12px;">
							    		<a style="color:black;" href="#">PACK SOLUTIONS<br/> INTERACTIVES</a>
							        </p -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-580px">
							        	   	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">Pack TBI class&eacute;s par produit</h3><br/>
								        	<table >
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Pack tbi pointer / vid&eacute;oprojecteur</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Pack tbi nomade / vid&eacute;oprojecteur</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">etc.</a></td></tr>
											</tr></table>
										</div>
										<div id='droiteSMenu' style="float:right">
											<h3 style="border-bottom:1px solid #ccc;">Pack TBI class&eacute;s par marque</h3>
												<table>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Pack TBI marque 1</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Pack TBI marque 2</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Pack TBI marque 3</a></td></tr>
											</table>
										</div>
										<div id="contient_menu_pub" style="width:978px;height:113px;position:absolute;margin-top:385px;margin-left:-1px;">
										<div class="menu_pub_1"></div>
										<div class="menu_pub" style="margin-left:163px"><span>GARANTIE</span><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<div style="text-align:left;font-family:tahoma;text-decoration:underline;color:#1c4358;margin-left:5px">
											<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:326px"><span>INSTALLATION TBI/VPI</span><img src="images/tbi_images/menu/outils.png" /></div>
										<div class="menu_pub" style="margin-left:489px"><span>FORMATION TBI/VPI</span><img src="images/tbi_images/menu/formation.png" /></div>
										<div class="menu_pub" style="margin-left:652px"><span>LOGICIEL TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
										<div class="menu_pub" style="margin-left:815px"><span>RESSOURCES TBI/VPI</span>
											<div style="text-align:left;color:#1c4358;font-family:tahoma;text-decoration:underline;margin-left:5px">
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">En savoir plus</a><br/>
											<img src="images/tbi_images/menu/fleche2.jpg" />&nbsp;&nbsp;<a href="#" style="color:#1c4358;">Packs d extention de garantie</a><br/>
											</div>
										</div>
									</div>
							        </div>
							    </li>

							    <li style="width:125px;height:40px;margin-top:-9px;border:0;padding:0;margin-left:-5px;">
							    <!-- 	<p style="margin-top:18px;margin-left:px;font-size:0.9em">
							    		<a style="color:black;" href="#">TOUT SUR LES<br/> TBI / VPI</a>
							    	</p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-731px">
							        	   	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">TBI Pointer</h3><br/>
								        	<table >
								        		<tr><td colspan="2"><h4 >Le produit :</h4></td>
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat TBI mobile pointer</a></td>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet tbi pointer</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection tbi pointer	</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette tbi pointer</a></td>
												<tr><td colspan="2"><h4 >Les logiciels les + utilis&eacute;s</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel pour maternelle : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel histoire g&eacute;o : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel math&eacute;matique : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Voir tous les logiciels du tbi nomade</a></td>
											</tr></table>
										</div>
							        </div>
							    </li>
							    <li style="width:124px;height:40px;margin-top:-9px;border:0;padding:0;margin-left:-5px;">
							    <!-- 	<p style="margin-top:18px;margin-left:px;font-size:0.9em">
							    		<a style="color:black;" href="#">TOUT SUR LES<br/> TBI / VPI</a>
							    	</p> -->
							        <div class="zmenu" style="width:979px;height:500px;margin-top:39px;margin-left:-855px">
							        	   	<div id="gaucheSMenu" style="float:left">
								        	<h3 style="border-bottom:1px solid #ccc;">TBI Pointer</h3><br/>
								        	<table >
								        		<tr><td colspan="2"><h4 >Le produit :</h4></td>
												<tr><td><img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Achat TBI mobile pointer</a></td>
												<tr><td colspan="2"><h4 >Les accessoires les + vendus :</h4></td></tr>												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Stylet tbi pointer</a></td>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Coque de protection tbi pointer	</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Malette tbi pointer</a></td>
												<tr><td colspan="2"><h4 >Les logiciels les + utilis&eacute;s</h4></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel pour maternelle : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel histoire g&eacute;o : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Logiciel math&eacute;matique : r&eacute;f&eacute;rence</a></td></tr>
												<tr><td>
												<img src="images/tbi_images/menu/fleche.png" /></td><td><a style="color:black" href="#">Voir tous les logiciels du tbi nomade</a></td>
											</tr></table>
										</div>
							        </div>
							    </li>
							</ul>
						</div>
					<!-- ========================== -->
				</div>
			</div>
<!-- CAROUSEL  -->
	<?php
	// echo'lovine';var_dump($body_code);
		  if(!stripos($_SERVER['REQUEST_URI'], 'cPath' )
			 AND !stripos($_SERVER['REQUEST_URI'], 'shopping_cart')
			 AND !stripos($_SERVER['REQUEST_URI'], 'create_account')
			 AND !stripos($_SERVER['REQUEST_URI'], 'time_out')
			 AND !stripos($_SERVER['REQUEST_URI'], 'account')
			 AND !stripos($_SERVER['REQUEST_URI'], 'address_book')
			 AND !stripos($_SERVER['REQUEST_URI'], 'login' )) {
		echo'
		<div style="position:relative;margin-top:-134px;margin-left:auto;margin-right:auto;width:1366px" id="carousel-example-generic" class="carousel slide" >
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active" >
		      <img src="images/tbi_images/slide/slide1.jpg" alt="">
		    </div>
		    <div class="item ">
		      <img src="images/tbi_images/slide/slide2.jpg" alt="">
		    </div>		    <div class="item ">
		      <img src="images/tbi_images/slide/slide3.jpg" alt="">
		    </div>		    <div class="item ">
		      <img src="images/tbi_images/slide/slide4.jpg" alt="">
		    </div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    <span class="icon-prev"></span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    <span class="icon-next"></span>
		  </a>
		</div>';
		
	} else {
		echo '<div id="noslide" style="margin-top:-134px;margin-left:auto;margin-right:auto;width:1366px;height:256px;"></div>';
	}
	
	?>
<!-- FIN CAROUSEL  -->
	</div> <!-- Fin Slide -->
