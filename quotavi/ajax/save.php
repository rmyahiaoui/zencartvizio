<?php
session_start();
require_once('../inc/utils.php');

	if(!empty($_POST['node']) && !empty($_POST['id_salle']))
		echo saveInfos($_POST['node'], $_POST['id_salle']);