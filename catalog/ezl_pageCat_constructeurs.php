<?php
require_once('ezl_pageCat.php');
require_once('ezl_pageCat.php');

// Fabrique le contenu de la page de catalogue de la liste des constructeurs
class ezl_pageCat_constructeurs extends ezl_pageCat {

    public function __construct() {
        parent::__construct();
	}

	protected function getId() {
		return ezl_page::PAGE_CONSTRUCTEURS;
	}

	protected function getNomsParametres() {
		return array();
	}

	protected function remplacerChampParametre($texte) {
		return $texte;
	}

	protected function fairePartie_A() {
		$contenu = '';
		$contenu .= $this->faireZone(ezl_page::ZONE_PAGE_TITRE_A);
		$contenu .= $this->faireZone(ezl_page::ZONE_PAGE_CONTENU_A);
		return $contenu;
	}

	protected function fairePartieListeConstructeurs() {
		$contenu = $this->faireZone(ezl_page::ZONE_PAGE_TITRE_B);
		$marquesAffichees = ezl_db::extraireMarquesRateau($this->conn, $this->loc);

		$contenu .= '<div id="liste_logosMarques">';
		$contenu .= '<ul>';
		foreach ($marquesAffichees as $i => $marque) {
			$contenu .= '<li>';
			$baliseIMG = $this->faireBaliseIMG($marque);
			$contenu .= ezl_lien::lienPageCatalogue(ezl_page::PAGE_LAMPES_UN_CONSTRUCTEUR, $marque, '', $baliseIMG);
			$contenu .= '</li>';
		}
		$contenu .= '</ul>';
		$contenu .= '</div>'; //  id="liste_marques"
		
		return $contenu;
	}

	protected function faireContenu() {
		$contenu = '';
		$contenu .= $this->fairePartie_A();
		$contenu .= $this->fairePartieListeConstructeurs();
		return $contenu;
	}
}

$page = new ezl_pageCat_constructeurs();
$page->afficher()

?>