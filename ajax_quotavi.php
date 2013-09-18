<?php
include_once ("includes/application_top.php" );

require_once('./quotavi/inc/utils.php');
require_once('./quotavi/inc/devis.php');
require_once('./quotavi/inc/products.php');

if(!empty($_POST['node']) && !empty($_POST['id_salle']))
		echo saveInfos($_POST['node'], $_POST['id_salle']);
else if(!empty($_POST['id']))
		echo product_details($_POST['id']);
else if(!empty($_POST['devis']) && $_POST['devis']=="create"){
	if(!empty($_SESSION['customer_id']))
		echo creerDevis($_SESSION['customer_id']);
	else
		echo creerDevis();
}
else if(!empty($_POST['devis']))
	echo chargerDevis($_POST['devis']);
else if(!empty($_POST['id_product']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo addProduct($_POST['id_product'], $_POST['cpt'], $_POST['id_salle']);
else if(!empty($_POST['remProduct']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo removeProduct($_POST['cpt'], $_POST['id_salle']);
else if(!empty($_POST['numSalle']))
	echo initEquipement($_POST['numSalle']);
else if(!empty($_POST['salles']) && $_POST['salles']=="save"){
	unset($_POST['salles']);
	echo saveSalles($_POST);
}
else if(!empty($_SESSION['quotavi']['nb_salle']))
		echo json_encode(array("nb_salle" => $_SESSION['quotavi']['nb_salle']));