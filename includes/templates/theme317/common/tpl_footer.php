<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 3183 2006-03-14 07:58:59Z birdbrain $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));
?>

<?php
// if (!$flag_disable_footer) {
?>

	<?php
	// FVV
	/*
	$sql = "select fr_text,format from eb_contenus where ordre_affichage>0 and page = '". $_GET['main_page'] ."'";
	if  ( ($_SESSION['main_page']=="index")&&(strlen($_GET['cPath'])>0) )
	{
		$sql .= " and 0=1 ";
	}
	$rs = $db->Execute($sql);
	$resp = $rs->fields['fr_text'];
	if (strlen($resp)>0)
	{
		echo '<div id="footer">
			<div class="left-top">
				<div class="right-top">
					<div class="right-bot">
						<div class="left-bot">
							<div class="indent">';
		   while (!$rs->EOF)
		   {
//				$texte = utf8_encode ( $rs->fields['fr_text'] );
				$texte =  $rs->fields['fr_text'] ;
				$format =  $rs->fields['format'];
				
				if ( $format=='Titre'  )
				{
				 echo '<h1>'.$texte.'</h1>';
				}
				else if ( $format=='Sous-titre'  )
				{
				 echo '<h2>'.$texte.'</h2>';				
				}
				else if ( $format=='Paragraphe'  )
				{
				 echo '<p>'.$texte.'</p>';									
				}
				
				$rs->MoveNext();				
		   }
		echo '</div>
			</div>
			</div>
			</div>
			</div>
			</div>';
	}
	
*/
	?>

<!-- 	<div id="footer">
		<div class="left-top">
			<div class="right-top">
				<div class="right-bot">
					<div class="left-bot">
						<div class="indent">
							<div class="menu">
								<!-- ========== MENU ========== -->
									<?php // if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
									
										<!-- <a href="<?php echo HTTP_SERVER . DIR_WS_CATALOG; ?>"><?php echo HEADER_TITLE_CATALOG; ?></a><?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?> -->
								
									<?php // } ?>
								<!-- ========================== -->
							<!-- </div>
							<p> -->
								<!-- ========== COPYRIGHT ========== -->
									<?php // echo FOOTER_TEXT_BODY; ?>
							
									<?php
										// if (SHOW_FOOTER_IP == '1') {
									?>
											<!-- <span id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></span> -->
									<?php
										// }
									?>
								<!-- =============================== -->
							<!-- </p> 
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div> -->
<?php
// }
?>
		<div id="footer" >
			<div id="wrap_footer" >
				<div id="footBloc1">
					<h4>TBI MOBILE</h4>
					<div>
						<img src="images/tbi_images/footer/fleche.png" /> TBI pointer<br/>
						- TBI mobile nomade<br/>
						- Stylet tbi pointer<br/>
						- Coque de protection<br/>
						tbi pointer<br/>
						- Malette tbi pointer<br/>
						<img src="images/tbi_images/footer/fleche.png" /> TBI nomade<br/>
						- Stylet tbi nomade<br/>
						- Coque de protection<br/>
						tbi nomade<br/>
						- Malette tbi nomade<br/>
					</div>
				</div>
				<div id="footBloc2">
					<h4>TBI FIXE</h4>
					<div>
					<img src="images/tbi_images/footer/fleche.png" /> TBI Board<br/>
					- TBI fixe board<br/>
					- Stylet fixe bord<br/>
					- Coque de protection<br/>
					TBI fixe board<br/>
					- Malette TBI fixe board<br/>
					<img src="images/tbi_images/footer/fleche.png" /> Ecran interactif<br/>
					- Stylet &eacute;cran int&eacute;ractif<br/>
					- Coque de protection<br/>
					&eacute;cran interactif<br/>
					- Malette &eacute;cran interactif<br/>

					</div>
				</div>
				<div id="footBloc3">
					<h4>VPI</h4>
					<div>
						<img src="images/tbi_images/footer/fleche.png" /> Vid&eacute;oprojecteur interactif<br/>
						Vid&eacute;oprojecteur interactif<br/>
						- Stylet pour VPI<br/>
						- Feutre pour VPi<br/>
						- Malette pour VPI<br/>
					</div>
				</div>
				<div id="footBloc4">
					<h4>Visualisateur</h4>
					<div>
						- Visualisateur + marque 1<br/>
						- Visualisateur + marque 2<br/>
						- Visualisateur + marque 3<br/>
						- Visualisateur + marque 4<br/>
						- Visualisateur + marque 5<br/>
						- Visualisateur + marque 6<br/>
						- Visualisateur + marque 7<br/>
					</div>
				</div>
				<div id="footBloc5">
					<h4>Accessoires TBI</h4>
					<div>
						- Coque de protection TBI<br/>
						- Malette TBI<br/>
						- Stylet TBI<br/>
						- Accessoire TBI marque 1<br/>
						- Accessoire TBI marque 2<br/>
						- Accessoire TBI marque 3<br/>
						- Accessoire TBI marque 4<br/>
					</div>
				</div>
				<div id="footBloc6">
					<h4>Pack interactif</h4>
					<div>
						- Pack tbi pointer +<br/> Vid&eacute;projecteur<br/>
						- Pack TBI nomade +<br/> Videoprojecteur<br/>
						- Pack VPI<br/>
						- Pack TBI Marque 1<br/>
						- Pack TBI Marque 2<br/>
						- Pack TBI Marque 3<br/>
					</div>
				</div>
				<div id="reseauxSoc">
					<img src="images/tbi_images/footer/fb.png" /><br/>
					<img src="images/tbi_images/footer/twitter.png" /><br/>
					<img src="images/tbi_images/footer/youtube.png" />
				</div>
			</div>
		</div>