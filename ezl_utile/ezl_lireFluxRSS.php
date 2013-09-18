<?php
/**
 * List le flux RSS de atout-videoprojecteur.com (3 premiers articles) et construit un bout de code html reprenant titre, date et d�but du r�sum�
 * Ce code est destine� � la page principale du site fr
 */
class ezl_lireFluxRSS {
	const ADRESSE_FLUX_PAR_DEFAUT 		= 'http://feeds.feedburner.com/videoprojecteur';
	const MAX_CARACTERES_DESCRIPTION 	= 120;
	const MAX_CARACTERES_TITRE 			= 40;
	const NB_ARTICLE_PARCOURUS 			= 3;
	const NOM_DIV_CONTENEUR				= 'fil_RSS';
	const CONTENU_TITRE_H3				= 'Nouveaut�s <em>atout-videoprojecteur.com</em>';
    public $sortieHTMLFlux 				= NULL;
    public $adresseFluxRSS 				= NULL;
	
	function __construct($adresseFlux = '') {
		$this->adresseFluxRSS = empty($adresseFlux) ? self::ADRESSE_FLUX_PAR_DEFAUT : $adresseFlux;
		$this->lireFlux();
	}

    public function __toString() {
        return $this->sortieHTMLFlux;
    }

	/**
	 * Tronque le texte �l�gamment
	 */
	function tronquerTexte($texte, $longueurMax) {
		$resultat = $texte;
		if (strlen($resultat) > $longueurMax) {
			// S�l�ction du maximum de caract�res  
			$resultat = substr($resultat, 0, $longueurMax);
			// R�cup�ration de la position du dernier espace (afin d�viter de tronquer un mot)
			$position_espace = strrpos($resultat, ' ');
			$resultat = substr($resultat, 0, $position_espace);
			// Ajout des "..."
			$resultat .= ' [...]';
		}
		return $resultat;
	}

	/**
	 * Met le texte dans le bon encodage et le tronque si besoin
	 */
	function formaterTexte($texte, $longueurMax = 0) {
		$resultat = $texte;
		if (0 != $longueurMax) {
			$resultat = $this->tronquerTexte($resultat, $longueurMax);
		}
		$resultat = utf8_decode($resultat);
		return $resultat;
	}

	/**
	 * Lit les donn�es du flux et les transforme en HTML
	 */
	public function lireFlux() {
		$this->sortieHTMLFlux = '';
		$errorLevelInit = error_reporting();
		error_reporting($errorLevelInit & ~E_WARNING); // D�sactive les arnings
		$xml = simplexml_load_file($this->adresseFluxRSS);
		error_reporting($errorLevelInit);
		if (FALSE !== $xml) {
			$this->sortieHTMLFlux .= sprintf('<div id="%s">', self::NOM_DIV_CONTENEUR);
			$this->sortieHTMLFlux .= sprintf('<h3>%s</h3>', self::CONTENU_TITRE_H3);
			$this->sortieHTMLFlux .= '<ul>';
			for ($i=0;$i<self::NB_ARTICLE_PARCOURUS;$i++) {
					$article =& $xml->channel->item[$i];
					$this->sortieHTMLFlux .= '<li>';
					$this->sortieHTMLFlux .= '<div class="frss_fond_titre">';
					$this->sortieHTMLFlux .= '<h4>';
					$titreTronqu� = $this->formaterTexte($article->title, self::MAX_CARACTERES_TITRE);
					$this->sortieHTMLFlux .= sprintf('<a href="%s">%s</a>', $article->link, $titreTronqu�);
					$this->sortieHTMLFlux .= '</h4>';
					$this->sortieHTMLFlux .= '<p>';
					setlocale( LC_TIME, "fr" );
					$datetime = strtotime($article->pubDate);
					$this->sortieHTMLFlux .= strftime('%A %d %b %Y', $datetime);
					$this->sortieHTMLFlux .= '</p>';
					$this->sortieHTMLFlux .= '</div>';
					$this->sortieHTMLFlux .= '<p>';
					$this->sortieHTMLFlux .= $this->formaterTexte($article->description, self::MAX_CARACTERES_DESCRIPTION);
					$this->sortieHTMLFlux .= '</p>';
					$this->sortieHTMLFlux .= '</li>';
				}
			$this->sortieHTMLFlux .= '</ul>';
			$this->sortieHTMLFlux .= '</div>';
		}	
	}
}

?>
