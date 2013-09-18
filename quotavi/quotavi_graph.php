<?php
require_once('./Structures/Graph.php');
require_once('./inc/utils.php');
require_once('./inc/devis.php');
require_once('./inc/products.php');

$pageLink = "./index.php?main_page=quotavi&amp;";
$graph = new Structures_Graph(true);
$html_nodes = array();
$nodes = array();
$nodes_names = array('deb', 'salles', 'equipement' ,'type', 'fixe', 'proj_inter', 'vp', 'mi_f', 'mi_m', 'miwb', 'tableau', 'malette', 'proj_m', 'ordi_m', 'ordi_f', 'logiciel',
	'accessoires', 'services', 'devis');
$arretes = array('mi_m-malette', 'malette-proj_m', 'proj_m-ordi_m', 'ordi_m-logiciel', 'logiciel-accessoires', 'accessoires-services', 'proj_inter-tableau', 'tableau-ordi_f',
	'ordi_f-logiciel', 'mi_f-vp', 'vp-ordi_f', 'miwb-vp');
foreach($nodes_names as $name) {
    $nodes[$name] = new Structures_Graph_Node();
    $graph ->addNode($nodes[$name]);
    $nodes[$name]->setMetadata('name', $name);
}
foreach($arretes as $arrete){
    $data = preg_split("/-/",$arrete);
    $nodes[$data[0]]->connectTo($nodes[$data[1]]);
}
if(!empty($_GET['node']) && !empty($_GET['salle']))
	$nextNode = nextN($_GET['node'], $_GET['salle']);

$html_nodes["deb"]=
    	  '<p>QUOTAVI est un assistant vous permettant de vous présenter différents choix de solutions audiovisuelles interactives.
    QUOTAVI vous permettra d\'appréhender les différentes alternatives possibles et de produire un devis chiffrée.</p>
    <div class="border lDiv"><h1>Créer un nouveau devis</h1>
    <a class="cDevis button" href="'.$pageLink.'node=salles">Démmarer un devis pour un projet d\'équipement d\'école</a>
    <a class="cDevis button" href="'.$pageLink.'node=salles">Démmarer un devis pour un projet d\'équipement d\'entreprise</a>
    </div>
    <div class="border rDiv"><h1>Reprendre un devis existant</h1>
	<label for="numDevis"> Numéros de devis : </label><input type="text" id="numDevis" name="devis" value=""><a class="lDevis" href="'.$pageLink.'node=salles"><span class="button">Recherchez</span></a><br><span class="err"></span>
    </div>
    ';
    
	$html_nodes['salles']=
		 '<script src="./quotavi/js/salle_name.js"></script>
			<div id="mainCont"></div>';
	
	$html_nodes['equipement']=
		 '<h2 id="info">Cochez les équipements que vous souhaitez réutiliser pour la salle '.$_SESSION['quotavi']['salles_name'][$_GET['salle']].'</h2>
			<div id="mainCont">
			<div class="txtLeft">
			<p>Equipement à réutiliser : </p>
			<input type="checkbox" name="tableau" value="tableau">Tableau blanc (type velleda)<br>
			<input type="checkbox" name="proj" value="proj">Videoprojecteur<br>
			<input type="checkbox" name="ordi" value="ordi">Ordinateur<br>
			<p>Logiciels à  réutiliser: </p>
			<input type="checkbox" name="logiciel" value="logiciel">Cochez la case si vous possèdez déja les logiciels<br>
			<p>Service/Formation</p>
			<input type="checkbox" name="services" value="service">Cochez la case si vous ne souhaitez pas bénéficier de service d\'installation ou de formation<br>
			<a id="initEquipement" href="'.$pageLink.'salle='.$_GET['salle'].'&amp;node=type" class="button">Ok</a></p></div></div>';
	
	$html_nodes['type']=
			 '<h2 id="info"> Selectionnez le type de solution pour la salle '.$_SESSION['quotavi']['salles_name'][$_GET['salle']].' </h2>
				<div id="mainCont">
				<div class= "box" id="fixe"><h3>Fixe</h3><img src="./quotavi/img/fixe.jpg" class="fl"/><p>Une solution fixe est implémentée en fixant le vidéoprojecteur au plafond ou à un mur d\'une salle (salle de formation ou salle de cours).</p><a href="'.$pageLink.'salle='.$_GET['salle'].'&amp;node=fixe"  class="button">Suivant</a></div>
				<div class="box" id="mobile" ><h3>Mobile</h3><img src="./quotavi/img/mobile.jpg" class="fl"/><p>une solution mobile présente l\'avantage de pouvoir accompagner un formateur ou enseignant mobile ou d\'être partagée entre différents salles.</p><a href="'.$pageLink.'salle='.$_GET['salle'].'&amp;node=mi_m"  class="button">Suivant</a></div>
				<a href="'.$pageLink.'salle='.$_GET['salle'].'&amp;node=equipement" class="button">précédent</a>
				</div>';
	
	$html_nodes["fixe"]=
		/*$node1 = ($_SESSION['quotavi']['equipement']['proj']==true) ? nextN("tableau","proj_inter", $_GET['salle']) : "proj_inter";
		$node2 = ($_SESSION['quotavi']['equipement']['proj']==true) ? nextN("proj_f","vp", $_GET['salle']) : "vp";*/
		 "
			<h2 id='info'> Solution fixe</h2>
			<div id='mainCont'>
			<div class='box'><h3>videoprojecteur classique + tableau interactif</h3><img src='./quotavi/img/tbi.jpg' class='fl'/><p>cette solution offre un confort d'utilisation intéressant, elle permet d'utiliser des stylos de couleur différentes et \"sans pile\"; elle permet d'écrire directement avec le doigt.</p><a href='".$pageLink."salle=".$_GET['salle']."&amp;node=proj_inter' class='button'>Suivant</a></div>
			<div id='choix1' class='box'><h3>videoprojecteur interactif + tableau classique</h3><img src='./quotavi/img/vpi.png' class='fl'/><p>C'est une solution pratique et économique. Elle présente néanmoins un confort d'utilisation moindre solution videoprojecteur + tableau interactif</p><a href='".$pageLink."salle=".$_GET['salle']."&amp;node=mi_f' class='button'>Suivant</a></div>
			<div id='choix2' class='box'><h3>videoprojecteur classique + tableau classique + module interactif</h3><img src='./quotavi/img/mobile1.jpg' class='fl'/><p>cette solution offre un confort d'utilisation intéressant, elle permet d'utiliser des stylos de couleur différentes et \"sans pile\"; elle permet d'écrire directement avec le doigt</p><a href='".$pageLink."salle=".$_GET['salle']."&amp;node=miwb' class='button'>Suivant</a></div>
			<a href='".$pageLink."salle=".$_GET['salle']."&amp;node=type' class='button'>précédent</a>
			</div>";
	
	$html_nodes['proj_inter']=
		 choixProduit($_GET['salle'], "Choissisez votre vidéoprojecteur intéractif", array(38), $nextNode);
	
	$html_nodes['vp']=
		 choixProduit($_GET['salle'], "Choisissez votre vidéoprojecteur", array(36), $nextNode);
	
	$html_nodes["mi_f"]=
		 choixProduit($_GET['salle'],"Choissisez une solution mobile or pointer", array(40), $nextNode);

	$html_nodes["mi_m"]=
		 choixProduit($_GET['salle'],"Choissisez une solution mobile or pointer", array(40), $nextNode);
	
	$html_nodes["miwb"]=
		//$node = nextN("ordi_f",$_GET['node'], $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez une solution Easy Board", array(41), $nextNode);
	
	$html_nodes["tableau"]=
		//$node = nextN("ordi_f", "tableau", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez un tableau", array(49), $nextNode);
	
	$html_nodes["malette"]=
		//$node = nextN("proj_m", "malette", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez une malette", array(39), $nextNode);
	
	$html_nodes["proj_m"]=
		//$node = nextN("ordi_m", "proj_m", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez un vidéoprojecteur mobile", array(37), $nextNode);
	
	$html_nodes["ordi_m"]=
		//$node = nextN("logiciel", "ordi_m", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez un ordinateur", array(43), $nextNode);
	
	$html_nodes["ordi_f"]=
		//$node = nextN("logiciel", "ordi_f", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez un ordinateur", array(42), $nextNode);
	
	$html_nodes["logiciel"]=
		//$node = nextN("accessoires", "logiciel", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choissisez des logiciels", array(45), $nextNode);
	
	$html_nodes["accessoires"]=
		//$node = nextN("services", "accessoires", $_GET['salle']);
		 choixProduit($_GET['salle'],"Choix d'accessoires", array(34, 35), $nextNode);

	$html_nodes["services"]= choixProduit($_GET['salle'],"Services", array(44,47,48), $node2, "inc");
	
	$html_nodes["devis"]= genererDevis();
	

foreach($nodes_names as $key => $name){
    $nodes[$name]->setMetadata('html', $html_nodes[$name]);
}
?>