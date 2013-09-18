<?php
	ini_set('display_errors', '1');
	$defDir = getcwd(); 
	chdir('/homez.548/tsrinfor/www/zencartvizio/quotavi');
	require_once('quotavi_graph.php');
	chdir($defDir);

	if(empty($_GET['node'])){
		$_SESSION['quotavi']=array();
	}
	if(!empty($_GET['salle']))
		saveArrianne($_GET['salle']);
	$devis = (!empty($_SESSION['quotavi']['devis']))?' - Devis '.$_SESSION['quotavi']['devis']:'';
	echo '
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="./quotavi/js/script.js"></script>';
    echo '<div id="content"><div class="devis_reset">
		    <div class="devis_header">
		     	<h2 class="devis_title">Créez votre devis en ligne</h2>
		     	<span class="devis_number">Devis 407</span><span class="devis_montant">Montant total: 407 Euros</span>
		     	<strong class="devis_tel">TEL: 01 71 86 46 66</strong> 
		     </div>';
	if(!empty($_GET['node']))
    	echo afficheEnTete($_GET['node'], $_GET['salle']);
    
    if(empty($_GET['node'])){
    	echo '<div><h1>Objectif Quotavi</h1><p>QUOTAVI est un assistant vous permettant de vous présenter différents choix de solutions audiovisuelles interactives.
 QUOTAVI vous permettra d’appréhender les différentes alternatives possibles et de produire un devis chiffré.</p></div>
	<table>
	<tr>
	<td><h1>Projection Interactive</h1><img src="./quotavi/img/etape1.jpg"></td>
  	<td><h1>Informatique</h1><img src="./quotavi/img/etape2.jpg"></td>
  	<td><h1>Accessoires</h1><img src="./quotavi/img/etape3.jpg"></td>
  	<td><h1>Services</h1><img src="./quotavi/img/etape4.jpg"></td>
	</tr>
  	<tr><td colspan="4"><h1>Devis</h1><img src="./quotavi/img/devis.jpg"></td></tr>
	</table>
	<p><a href="index.php?main_page=quotavi&amp;node=deb" class="button">LANCER LA CONFIGURATION DU DEVIS</a></p>';
	}
	else{
		$getNode = (string)$_GET['node'];
		if(array_key_exists($getNode, $html_nodes))
			echo $nodes[$getNode]->getMetadata('html');
	}

	echo '</div></div></body></html>';

	?>