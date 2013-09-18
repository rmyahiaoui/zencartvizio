<?php
session_start();

require_once('../inc/utils.php');
require_once('../inc/devis.php');
require_once('../inc/products.php');


if(!empty($_POST['node']) && !empty($_POST['id_salle']))
		echo saveInfos($_POST['node'], $_POST['id_salle']);
else if(!empty($_POST['id']))
		echo product_details($_POST['id']);
else if(!empty($_SESSION['nb_salle']))
		echo json_encode(array("nb_salle" => $_SESSION['nb_salle']));
else if(!empty($_POST['devis']) && $_POST['devis']=="create")
	echo creerDevis();
else if(!empty($_POST['devis']))
	echo chargerDevis($_POST['devis']);
else if(!empty($_POST['id_product']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo addProduct($_POST['id_product'], $_POST['cpt'], $_POST['id_salle']);
else if(!empty($_POST['remProduct']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo removeProduct($_POST['cpt'], $_POST['id_salle']);
else if(!empty($_POST['numSalle']))
	echo initEquipement($_POST['numSalle']);
else if(!empty($_POST))
	echo saveSalles($_POST);