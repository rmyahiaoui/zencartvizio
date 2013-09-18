<?php
require_once('main.php');
require_once('../ezl_lien.php');
require_once('../ezl_page.php');
require_once('../ezl_const.php');
require_once('../ezl_db.php');
require_once('../ezl_localisation.php');
require_once('../ezl_utile.php');
require_once('../includes/languages/ezl_'.$loc->langue->toString('longue_anglais').'.php');
require_once('../ezl_modele_pageAccueil.php');
//session_start();

// Classe générique qui fabrique le contenu d'une des pages de catalogue
abstract class ezl_pageCat {
	public $title = '';
	public $keywords = '';
	public $description = '';
	public $connected = false;
	protected $chaines = NULL;
	protected $parametres = NULL;
	protected $loc = NULL;
	protected $conn = NULL;
	protected $marcheConstructeurs = array('consumers', 'professionals', 'show_business');

    function __construct() {
		global $chainesPages;
		global $loc;
		global $conn;
		$this->loc =& $loc;
		$this->conn =& $conn;
        $this->parametres = array();
		$nomsParametres =& $this->getNomsParametres();
		if (!empty($nomsParametres)) {
			foreach ($nomsParametres as $p) {		
				if (!array_key_exists($p, $_GET)) {
					trigger_error(sprintf('Paramètre (%s) attendu mais absent dans l\'url', $p), E_USER_ERROR);
				}
				$this->parametres[$p] = $_GET[$p];
			}
		}
        $this->chaines =& $this->getTextesZone(ezl_page::ZONE_PAGE_VRAC, false); // chainesPages[$this->getId()];
    }

	// Remplace les champs génériques (nom_fabricant, nom de lampe, nom de domaine etc) dans la chaine
    protected function remplacerChampsGeneriques($texte) {
		$resultat = str_replace(ezl_const::CHAINE_GENERIQUE_NOM_DOMAINE, ucfirst(GEN_NOM_DOMAINE), $texte);
		$resultat = $this->remplacerChampParametre($resultat);
		return $resultat;
	}

    // GP Remplacé  par getTexteZone ci dessous (indice retourné pas la méthode)
	// Recherche dans la table el_seo_texts d'une valeur unique de zone de texte
	// Mise a jour des champs génériques
    public function getUnTexteZone($screen_code, $screen_zone, $indice=0 )
	{
		//$resultat = ezl_db::getTexteZone($this->getId(), $id_zone, $this->loc->langue, $this->conn, ($avecParametre?$this->parametres:NULL));
		$sql = "select screen_text_".$this->loc->langue." text 
		        from el_seo_texts 
		        where screen_code = '". $screen_code . "' 
				and screen_zone = '". $screen_zone . "' ";
		 if ( $indice>0 )
		 {
		     $sql .= "and indice =".$indice;
		 }
		 
		 
		$recordSet =& $this->conn->Execute($sql);
        $resultat = $recordSet->fields['text'];
		
		$resultat = $this->remplacerChampsGeneriques($resultat);
        return $resultat;
    }
	

	// Recherche dans la table el_seo_texts de plusieurs valeurs de zones de texte
	// Mise a jour des champs génériques
    protected function getTexteZone($id_zone, $avecParametre = false) {
		$resultat = ezl_db::getTexteZone($this->getId(), $id_zone, $this->loc->langue, $this->conn, ($avecParametre?$this->parametres:NULL));
		$resultat = $this->remplacerChampsGeneriques($resultat);
        return $resultat;
    }
	// Recherche dans la table el_seo_texts de plusieurs valeurs de zones de texte
	// Mise a jour des champs génériques
    protected function getTextesZone($id_zone, $avecParametre = false) {
		$resultat =& ezl_db::getTextesZone($this->getId(), $id_zone, $this->loc->langue, $this->conn, ($avecParametre?$this->parametres:NULL));
		foreach ($resultat as &$texte) {
			$texte = $this->remplacerChampsGeneriques($texte);
		}
        return $resultat;
    }
	
    protected function faireZone($id_zone) {
		$texte = $this->getTexteZone($id_zone);
		$contenu = '';
		switch ($id_zone) {
			case ezl_page::ZONE_PAGE_TITRE_A:
				$contenu .= sprintf('<h1>%s</h1>', ucfirst($texte));
				break;
			case ezl_page::ZONE_PAGE_TITRE_B:
			case ezl_page::ZONE_PAGE_TITRE_C:
			case ezl_page::ZONE_PAGE_TITRE_D:
				$contenu .= sprintf('<h2>%s</h2>', ucfirst($texte));
				break;
			case ezl_page::ZONE_PAGE_CONTENU_A:
				$contenu .= ezl_lien::insererLienPageInterne($texte);
				break;
			default:	
				trigger_error(sprintf('Zone (%s) non traitée.', ezl_page::$chaines_db_zone[$id_zone]), E_USER_ERROR);
		}
        return $contenu;
    }
	
	protected function faireBaliseIMG($marque) {
		$source = sprintf('../img_cstr/%s.gif', $marque);
		$titre = strip_tags(sprintf($this->chaines['TEXTE_BALISE_IMG'], $marque));
		$resultat = sprintf('<img title="%s" alt="%1$s" src="%2$s">', $titre, $source);
		return $resultat;
	}

	// Fait la premiere zone h2 (caractéristiques) des pages B et C
	protected function fairePartieCaracteristiques() {
		$contenu = '';
		$contenu .= '<div id="partie_caracteristiques">';
		$textes = $this->getTextesZone(ezl_page::ZONE_PAGE_LISTE_A, true);
		$contenu .= '<ul>';
		foreach ($textes as $texte) {
			$contenu .= '<li>';
			$contenu .= ucfirst($texte);
			$contenu .= '</li>';
		}
		$contenu .= '</ul>';
		$contenu .= '</div>'; // id="caracteristiques_lampes_marque"
		return $contenu;
	}

	public function afficher() {
		$this->title = ezl_utile::metEnFormeBalise($this->getTexteZone(ezl_page::ZONE_PAGE_META_TITLE));
		$this->description = ezl_utile::metEnFormeBalise($this->getTexteZone(ezl_page::ZONE_PAGE_META_DESC));
		$this->keywords = '';//$this->getTexteZone(ezl_page::ZONE_PAGE_META_KEYWORDS);
		$modelePageAccueil = new ezl_modele_pageAccueil();
		echo '<head>
			<title>'. $this->title .'</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<meta name="keywords" content=" ' . $this->keywords . ' " />
			<meta name="description" content="' . $this->description . '" />';
		
		echo '<meta name="robots" content="index, follow" />';
		
		echo '<meta http-equiv="imagetoolbar" content="no" />      
			<link rel="stylesheet" type="text/css" href="../catalog/css/ezl_catalog.css" />
			<link rel="stylesheet" type="text/css" href="../includes/templates/classic/css/stylesheet.css" />
			<link rel="stylesheet" type="text/css" href="../includes/templates/classic/css/stylesheet_css_buttons.css" />
			<link rel="stylesheet" type="text/css" href="../includes/templates/classic/css/style_lvp_navigation.css" />
			<link rel="stylesheet" type="text/css" href="../includes/templates/classic/css/style_lvp.css" />
			<link rel="stylesheet" type="text/css" media="print" href="../includes/templates/classic/css/print_stylesheet.css" />
			<script type="text/javascript" src="../includes/templates/template_default/jscript/jscript_lvp_menu.js"></script>
			</head>
			<body>';
		   
		echo '<div id="mainWrapper">';
		echo	$modelePageAccueil->faireBandeauSuperieur('',''/*$_SESSION['customer_id'], $_SERVER['SERVER_NAME']*/);
		echo	'<div id="blocCentral">';
		echo	 	$modelePageAccueil->faireBlocLatGauche($this->connected, 0/*$_SESSION['cart']->count_contents()*/, $this->getId());
		echo 		'<div id="blocLatDroit">';
		echo 			$modelePageAccueil->faireFrise();
		echo 			'<div id="blocContenuVariable">';
//		echo 			$this->faireTitre();
		echo 			$this->faireContenu();
		echo			'</div>'; // id="blocContenuVariable" // 
		echo			$modelePageAccueil->faireBandeauxPrestataires();
		echo 		'</div>'; // id="blocLatDroit"
		echo	'</div>'; // id="blocCentral"
		echo	'<div id="separateurCentralBas">';
		echo	'</div>';
		echo	$modelePageAccueil->faireBandeauBasReferences();
		echo	$modelePageAccueil->faire_rateauMarques($this->getId(), $this->conn, $this->loc);
		echo '</div>'; // id="mainWrapper"
		echo '</body>';
	}

	// Gère le contenu spécifique de la page
	abstract protected function faireContenu();

	// Retourne l'id spécifique de la page
	abstract protected function getId();

	// Retourne le nom du parametre principal de la page
	abstract protected function getNomsParametres();

	// Remplace la chaine generique appropriée par la valeur du parametre
	abstract protected function remplacerChampParametre($texte);
	
}

?>