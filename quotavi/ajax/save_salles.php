<?php
session_start();
require_once("../inc/utils.php");

if(!empty($_POST))
	echo saveSalles($_POST);