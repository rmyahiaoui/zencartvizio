<?php
session_start();
require_once('../inc/devis.php');

if(!empty($_POST['devis']) && $_POST['devis']=="create")
	echo creerDevis();
else if(!empty($_POST['devis']))
	echo chargerDevis($_POST['devis']);