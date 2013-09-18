<?php
session_start();
require_once('../inc/products.php');

if(!empty($_POST['id_product']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo addProduct($_POST['id_product'], $_POST['cpt'], $_POST['id_salle']);
else if(!empty($_POST['remProduct']) && !empty($_POST['cpt']) && !empty($_POST['id_salle']))
	echo removeProduct($_POST['cpt'], $_POST['id_salle']);