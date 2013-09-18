<?php
require_once('ezl_pageCat.php');

// Fabrique le contenu de la page de catalogue de la liste des constructeurs
class ezl_pageCat_videoprojecteursUneLampe extends ezl_pageCat {

	public $nomLampe = NULL;
	public $nomFabricant = NULL;
	public $optionsLampe = NULL;

    public function __construct() {
        parent::__construct();
		$this->nomLampe =& $this->parametres[ezl_const::PARAM_NOM_LAMPE];
		$this->nomFabricant =& $this->parametres[ezl_const::PARAM_NOM_FABRICANT];
		$this->optionsLampe =& ezl_db::extraireOptionsLampe($this->conn, $this->loc, $this->nomLampe);
		$this->parametres['options_lampe'] =& $this->optionsLampe;
	}

	protected function getId() {
		return ezl_page::PAGE_VIDEOPROJECTEURS_UNE_LAMPE;
	}

	protected function getNomsParametres() {
		return array(ezl_const::PARAM_NOM_FABRICANT, ezl_const::PARAM_NOM_LAMPE);
	}

	protected function remplacerChampParametre($texte) {
		$resultat = $texte;
		$resultat = str_replace(ezl_const::CHAINE_GENERIQUE_NOM_LAMPE, $this->parametres[ezl_const::PARAM_NOM_LAMPE], $resultat);
		$resultat = str_replace(ezl_const::CHAINE_GENERIQUE_NOM_FABRICANT, strtoupper($this->parametres[ezl_const::PARAM_NOM_FABRICANT]), $resultat);
		return $resultat;
	}

	protected function fairePartieVideoprojecteursCompatibles() {
		$contenu = $this->faireZone(ezl_page::ZONE_PAGE_TITRE_B);
		$liste_videoprojecteurs = ezl_db::extraireVideoprojecteursLampe($this->conn, $this->loc->langue->id, $this->nomFabricant, $this->nomLampe);
		$contenu .= '<ul id="liste_videoprojecteursCompatibles">';
		foreach ($liste_videoprojecteurs as $vp) {
			$contenu .= '<li>';
			$contenu .= $vp;
			$contenu .= '</li>';
		}
		$contenu .= '</ul>';
		return $contenu;
	}

	protected function fairePartieSolutions() {
		$contenu = $this->faireZone(ezl_page::ZONE_PAGE_TITRE_C);
		$liste_options = ezl_db::extraireOptionsLampe($this->conn, $this->loc, $this->nomLampe);
		$contenu .= '<ul id="liste_options">';
		foreach ($liste_options as $o) {
			$contenu .= '<li>';
			$contenu .= $o;
			$contenu .= '</li>';
		}
		$contenu .= '</ul>';
		return $contenu;
	}

	protected function fairePartieD() 
	{
		$contenu = $this->faireZone(ezl_page::ZONE_PAGE_TITRE_D);
		$textes = $this->getTextesZone(ezl_page::ZONE_PAGE_LISTE_D);
		$contenu .=  '<ul id="liste_D">'; 
		foreach ($textes as $texte) {
			$contenu .= '<li>';
			$contenu .= $texte;
			$contenu .= '</li>';
		}
		$contenu .=  '</ul>';
		return $contenu;
    }	

	protected function faireContenu() {
		$contenu = '';
		$contenu .= $this->faireZone(ezl_page::ZONE_PAGE_TITRE_A);
		$contenu .= $this->fairePartieCaracteristiques();
		$contenu .= $this->fairePartieVideoprojecteursCompatibles();
		$contenu .= $this->fairePartieSolutions();
		$contenu .= $this->fairePartieD();
		return $contenu;
	}
}

$page = new ezl_pageCat_videoprojecteursUneLampe();
$page->afficher()

?>