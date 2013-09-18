<?php

/**
 * Gestion des constantes ezl générales du site
 */
 
class ezl_const {
	const COURRIEL_WEBMESTRE ='retoursmail@easylamps.eu'; // Courriel du webmestre
//	const COURRIEL_WEBMESTRE = 'gilles.penissard@sympatico.ca'; // Courriel du webmestre
	const MAX_NB_LIENS_PRODUITS_PAR_PAGE = 40; // Le nombre de liens de produits maximum par page
	const CHARTE_GRAPHIQUE_COULEUR_ORANGE = '#FF9211'; // Le orange principale du site (boite blocEspaceClient par exemple)
	const CHARTE_GRAPHIQUE_COULEUR_OCRE = '#b93d09'; // L'orcre de certains libellés, du bloc messageIntro (fond dégradé) et des boutons ronds 1 2 3

	const MAX_NB_MARQUES_FLOTTANTES_RATEAU = 4; // Le nombre de liens de produits maximum par page

	const PARAM_NOM_LAMPE = 'lamp_name';
	const PARAM_NOM_FABRICANT = 'constructor_name';

	const CHAINE_GENERIQUE_NOM_DOMAINE = '((nom_domaine))'; // La chaine a remplacer par le nom de domaine dans les textes des contenus écran
	const CHAINE_GENERIQUE_NOM_FABRICANT = '((nom_fabricant))'; // La chaine a remplacer par le nom du fabricant dans les textes des contenus écran
	const CHAINE_GENERIQUE_NOM_LAMPE = '((nom_lampe))'; // La chaine a remplacer par le nom de la lampe dans les textes des contenus écran

	/*
	 * Définit les chaines correspondant aux codes "manufacturers_name" des produits lampes
	 * Sont rédénies au niveau ezl_langue.php
	 */
	static public $chaines_type_produits = array (
		'LO5' => 'lampe originale',
		'LO9' => 'lampe originale',
		'LC5' => 'lampe compatible',
		'BC5' => 'bulbe compatible',
		'BO5' => 'bulbe original');
	
}

?>