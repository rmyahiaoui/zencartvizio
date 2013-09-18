<?php
session_start();
require_once('../inc/utils.php');

if(!empty($_POST['numSalle']))
	echo initEquipement($_POST['numSalle']);