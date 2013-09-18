<?php
require_once('../../ezl_page.php'); 
require_once('../../ezl_utile.php'); 
require_once('../../ezl_langue.php'); 

/**
 * Trucs communs aux classes editionSEO
 */
class ezl_editionSEO_commun {

	const NOM_PARAM_ID_PAGE				= 'idPage';
	const NOM_PARAM_ID_ZONE				= 'idZone';
	const NOM_PARAM_INDICE				= 'indice';
	const NOM_PARAM_LANGUE				= 'langue';

	static public $params_editionHTML = array (
		self::NOM_PARAM_ID_PAGE,
		self::NOM_PARAM_ID_ZONE,
		self::NOM_PARAM_INDICE,
		self::NOM_PARAM_LANGUE);
}

?>
