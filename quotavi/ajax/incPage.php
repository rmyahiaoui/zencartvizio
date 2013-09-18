<?php
session_start();
	if(!empty($_SESSION['nb_salle']))
		echo json_encode(array("nb_salle" => $_SESSION['nb_salle']));