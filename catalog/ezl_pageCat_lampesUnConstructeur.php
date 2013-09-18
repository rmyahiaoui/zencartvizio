<?php
require_once('ezl_pageCat.php');

// Fabrique le contenu de la page de catalogue de la liste des constructeurs
class ezl_pageCat_lampesUnConstructeur extends ezl_pageCat {

	public $nomFabricant = NULL;

    public function __construct() {
        parent::__construct();
		$this->nomFabricant =& $this->parametres[ezl_const::PARAM_NOM_FABRICANT];
	}

	protected function getId() {
		return ezl_page::PAGE_LAMPES_UN_CONSTRUCTEUR;
	}

	protected function getNomsParametres() {
		return array(ezl_const::PARAM_NOM_FABRICANT);
	}

	protected function remplacerChampParametre($texte) {
		// Il vaut mieux utiliser $this->parametres[ezl_const::PARAM_NOM_FABRICANT] que $this->nomFabricant 
		// car cette méthode est appelée depuis le constructeur de la méthode abstraite
		$resultat = str_replace(ezl_const::CHAINE_GENERIQUE_NOM_FABRICANT, strtoupper($this->parametres[ezl_const::PARAM_NOM_FABRICANT]), $texte);
		return $resultat;
	}

	protected function faireIMG_et_LienPageConstructeurs() {
		$contenu = '';
		$contenu .= '<div id="IMG_et_lien_page_constructeurs">';
		$contenu .= $this->faireBaliseIMG(strtoupper($this->nomFabricant));
		$contenu .= '<div id="lien_page_constructeurs">';
		$contenu .= ezl_lien::lienPageInterne(ezl_page::PAGE_CONSTRUCTEURS, $this->chaines['LIEN_AUTRES_CONSTRUCTEURS']);
		$contenu .= '</div>'; // id="lien_page_constructeurs"
		$contenu .= '</div>'; // id="IMG_et_lien_page_constructeurs"
		return $contenu;
	}

	protected function fairePartieListeLampes() {
		$contenu = $this->faireZone(ezl_page::ZONE_PAGE_TITRE_B);
		$contenu .= sprintf('<table id="liste_lampes" summary="%s">', $this->chaines['RESUME_TABLEAU']);
		$contenu .= '<caption align="bottom">';
		$contenu .= $this->remplacerChampsGeneriques($this->chaines['TITRE_TABLEAU_LAMPES']);
		$contenu .= '</caption>';
		$contenu .= '  <tr>';
		$contenu .= '    <th scope="col" class="ref_lampe">'.$this->chaines['TITRE_COLONNE_REFERENCE_LAMPE'].'</th>';
		$contenu .= '    <th scope="col" class="options_lampe">'.$this->chaines['TITRE_COLONNE_OPTIONS'].'</th>';
		$contenu .= '    <th scope="col" class="ref_video">'.$this->chaines['TITRE_COLONNE_REFERENCES_VP'].'</th>';
		$contenu .= '  </tr>';
		
		$listeLampes = ezl_db::extraireLampesUnFabricant($this->conn, $this->loc->langue->id, $this->nomFabricant);
		foreach ($listeLampes as $modele_lampe) {
			$contenu .= '<tr>';
			$contenu .= 	'<th scope="row" class="ref_lampe">';
			$contenu .= 		$modele_lampe;
			$contenu .= 		'<br/>';
			$contenu .= 		ezl_lien::lienPageCatalogue(ezl_page::PAGE_VIDEOPROJECTEURS_UNE_LAMPE, $this->nomFabricant, $modele_lampe, $this->chaines['DETAILS']);
			$contenu .= 	'</th>';
			// Remplissage de la cellule des options de la lampe
			$liste_options = ezl_db::extraireOptionsLampe($this->conn, $this->loc, $modele_lampe);
			$contenu .= 	'<td  class="options_lampe">'.implode($liste_options, '<br/>').'</td>';
			// Remplissage de la cellule des videoprojecteurs associés à la lampe
			$liste_videoprojecteurs = ezl_db::extraireVideoprojecteursLampe($this->conn, $this->loc->langue->id, $this->nomFabricant, $modele_lampe);
			$contenu .= 	'<td class="ref_video">'.implode($liste_videoprojecteurs, ', ').'</td>';
			$contenu .= '</tr>';
		}

/*		$sql = " select 1 value 
		         from el_seo_manufacturers 
				 where filter_lamps=0
				 and   manufacturer_code='" . strtoupper($this->nomFabricant) . "'";

		$recordSet_filter =& $this->conn->Execute($sql);

//  echo 	$sql.$recordSet_filter->fields['value'];exit;

		// si pas de filtre.....
		if ( $recordSet_filter->fields['value'] == 1 )
		{
		   $add_from = "";
		   $add_where = "";		   
		}
		else
		{
		   $add_from = ", 
					el_seo_displayed_lamps as seo";
		   $add_where = "seo.lamp_code = prd.products_model 
				AND";		   
		}
		

		$sql = "
			SELECT DISTINCT prd.products_model
			FROM 	categories AS cat, 
					categories_description AS catd, 
					categories AS cstr, 
					categories_description AS cstrd, 
					products AS prd, 
					products_description AS prdd, 
					manufacturers AS man ". $add_from . "
			WHERE 	". $add_where . " cat.categories_id = catd.categories_id
				AND cat.parent_id = cstr.categories_id
				AND cstrd.categories_id = cstr.categories_id
				AND prdd.products_id = prd.products_id
				AND prd.master_categories_id = cat.categories_id
				AND prd.manufacturers_id = man.manufacturers_id
				AND man.manufacturers_id IN ( 1, 4 ) 
				AND cstrd.categories_name = '" . strtoupper($this->nomFabricant) . "'
				AND cstrd.language_id = " . $this->loc->langue->id  . "
				AND prdd.language_id = " . $this->loc->langue->id  . "
				AND catd.language_id = " . $this->loc->langue->id;

//		echo $sql;
		$recordSet_lampes =& $this->conn->Execute($sql);      
		while (!$recordSet_lampes->EOF) {
			$contenu .= '<tr>';
			$modele_lampe = $recordSet_lampes->fields['products_model'];
			$contenu .= 	'<th scope="row" class="ref_lampe">';
			$contenu .= 		$modele_lampe;
			$contenu .= 		'<br/>';
			$contenu .= 		ezl_lien::lienPageCatalogue(ezl_page::PAGE_VIDEOPROJECTEURS_UNE_LAMPE, $this->nomFabricant, $modele_lampe, $this->chaines['DETAILS']);
			$contenu .= 	'</th>';
			// Remplissage de la cellule des options de la lampe
			$liste_options = ezl_db::extraireOptionsLampe($this->conn, $this->loc, $modele_lampe);
			$contenu .= 	'<td  class="options_lampe">'.implode($liste_options, '<br/>').'</td>';
			// Remplissage de la cellule des videoprojecteurs associés à la lampe
			$liste_videoprojecteurs = ezl_db::extraireVideoprojecteursLampe($this->conn, $this->loc->langue->id, $this->nomFabricant, $modele_lampe);
			$contenu .= 	'<td class="ref_video">'.implode($liste_videoprojecteurs, ', ').'</td>';
			$contenu .= '</tr>';
			$recordSet_lampes->moveNext();
		}
*/		

		$contenu .= '</table>';
		return $contenu;
	}

	protected function fairePartieListeAutresCaracteristiques() 
	{
	
		$sql =  "select categories_id, categories_description from categories_description where categories_name = '". strtoupper($this->nomFabricant) ."'";
//$contenu .= $sql;
		$recordSet =& $this->conn->Execute($sql);
		
        $cat_id = $recordSet->fields['categories_id'];		
        $cat_desc = $recordSet->fields['categories_description'];		
		if ( $cat_desc==3  )
		   $nb_mois = 3;
		else
		   $nb_mois = 1;
		
		$contenu = '';
     	$contenu .=  '<h2>'. $this->getUnTexteZone('Lampes cstr', 'Titre C' ) . '</h2>';
		
		$contenu .=  '<ul>
		             <li>' .str_replace('[category_id]', $cat_id , $this->getUnTexteZone('Lampes cstr', 'Liste C',1 ) ) .'</li>'; 
		
		$contenu .=  '<li>' .str_replace('[nb_mois]', $nb_mois , $this->getUnTexteZone('Lampes cstr', 'Liste C',2 ) ) .'</li>'; 
		
		$contenu .=  '<li>' . $this->getUnTexteZone('Lampes cstr', 'Liste C',3 ).'</li>'; 
//		$contenu .=  '<li>' . $this->getUnTexteZone('Lampes cstr', 'Liste C',4 ).'</li>'; 
		
		$contenu .=  '</ul>';
		
					 
		return $contenu;
    }	
	protected function faireContenu() {
		$contenu = '';
		$contenu .= $this->faireZone(ezl_page::ZONE_PAGE_TITRE_A);
		$contenu .= $this->faireIMG_et_LienPageConstructeurs();
		$contenu .= $this->fairePartieCaracteristiques();
		$contenu .= $this->fairePartieListeLampes();
		$contenu .= $this->fairePartieListeAutresCaracteristiques();

		return $contenu;
	}
}



$page = new ezl_pageCat_lampesUnConstructeur();
$page->afficher()

?>