<?php
	require_once('../inc/products.php');
	
	if(!empty($_POST['id']))
		echo product_details($_POST['id']);