<?php
require_once('ezl_const.php');

function array_walk_recursive_maison($input, $nomFonction, $parametres = NULL)
{
	if (!is_array($input)) // Doit être un tableau
		trigger_error("Tableau attendu.", E_USER_ERROR);
	foreach ($input as $key => $value)
		if (is_array($value))
			array_walk_recursive_maison($value, $nomFonction, $parametres);
		else
			if (isset($parametres))
				call_user_func($nomFonction, $value, $key, $parametres);
			else	
				call_user_func($nomFonction, $value, $key);
}

function object_search_all(&$needle, &$haystack, $strict=false)
{
    $results = array();
    if (!is_array($haystack))
		trigger_error("Tableau attendu.", E_USER_ERROR);
    foreach($haystack as $k => $v)
	{
        if (($strict && $needle===$v) || (!$strict && $needle==$v))
		{
			$results[] = $k;
		}
    }
	return (count($results) == 0) ? false : $results;
}

class ezl_utile {
	/**
	 * Supprime les blancs dans une chaine
	 */
	public static function supprimerBlancs($chaine) {
		$resultat = str_replace (' ', '', $chaine);
		return $resultat;
	}

	/**
	 * Supprime les blancs dans une chaine
	 */
	public static function changerBlancsEnEntite_nbsp($chaine) {
		$resultat = str_replace (' ', '&nbsp;', $chaine);
		return $resultat;
	}

	/**
	 * indique si la chaine $chaine commence par la sous-chaine $prefixe
	 */
	public static function chaine_finitPar($chaine, $suffixe)
	{
		$posDerniereOccurence = strrpos($chaine, $suffixe);
		$resultat = (false !== $posDerniereOccurence) && ((strlen($chaine) - strlen($suffixe)) == $posDerniereOccurence);
		return $resultat;
	}

	/**
	 * Indique si la chaine finit par la sous-chaine $suffixe
	 */
	public static function chaine_commencePar($chaine, $prefixe)
	{
		$resultat = (0 === strpos($chaine, $prefixe));
		return $resultat;
	}

	/**
	 * Retourne la fin d'une chaine située après la sous-chaine $separateur
	 */
	public static function chaine_suivant($chaine, $separateur)
	{
		$resultat = false;
		$posSeparateur = strpos($chaine, $separateur);
		if ($posSeparateur !== false)
		{
			$posSuite = $posSeparateur + strlen($separateur);
			if ($posSuite < strlen($chaine))
				$resultat = substr($chaine, $posSuite);
		}
		return $resultat;
	}

	/**
	 * Retourne le début d'une chaine situé avant la sous-chaine $separateur
	 */
	public static function chaine_precedent($chaine, $separateur)
	{
		$resultat = false;
		$posSeparateur = strpos($chaine, $separateur);
		if ($posSeparateur !== false)
			$resultat = substr($chaine, 0, $posSeparateur);
		return $resultat;
	}

	/**
	 * Replace les caractères accentués
	 */
	public static function removeAccents($string) { 
		  $resultat = strtr($string,  "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
								   "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"); 
		  $resultat = str_replace('ß','ss', $resultat);
		  return $resultat;
	}

	/**
	 * Met en forme les chaines destinées aux balises META, aux titres, etc....
	 * Remplace le mot clef génénérique '((nom_doamine))'
	 */
	public static function metEnFormeBalise($texte) { 
		$resultat = str_replace(ezl_const::CHAINE_GENERIQUE_NOM_DOMAINE, ucfirst(GEN_NOM_DOMAINE), $texte);
		$resultat = strip_tags($resultat);
		return $resultat;
	}
	
	/**
	 * Fournit une chaine lisible pour un booléen
	 */
	function booleanToString($b, $traducteur = NULL)
	{
		$chainePourVrai = (isset($traducteur) ? $traducteur->traduire('true', 'vrai') : 'true');
		$chainePourFaux = (isset($traducteur) ? $traducteur->traduire('false', 'faux') : 'false');
		return ($b? $chainePourVrai : $chainePourFaux);
	}
	
	/**
	 * Fournit la valeur 1 pour true et 0 pour false
	 */
	function booleanTo01($b)
	{
		return ($b? 1 : 0);
	}
	
	/**
	 * Indique si on est en PHP4
	 */
	function enPHP4()
	{
		return (-1 == version_compare(phpversion(), '5.0.0'));
	}
	
	/**
	 * Tronque une chaine (pour l'écran) en coupant entre deux mots et met des ... à a fin
	 */
	public static function tronquerChaine($texte, $longueurMax) {
		$resultat = $texte;
		if (strlen($resultat) > $longueurMax) {
			// Slction du maximum de caractres  
			$resultat = substr($resultat, 0, $longueurMax);
			// Rcupration de la position du dernier espace (afin dviter de tronquer un mot)
			$position_espace = strrpos($resultat, ' ');
			$resultat = substr($resultat, 0, $position_espace);
			// Ajout des "..."
			$resultat .= ' [...]';
		}
		return $resultat;
	}
	
	public static function renvoiValeursEnum($table,$champ){ //ajout SAM le 10/09/2011
		$sqllang='SHOW COLUMNS FROM '.$table.' LIKE "'.$champ.'"';
		$qrylang=mysql_query($sqllang) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$rowlang=mysql_fetch_array($qrylang);
		$type = substr($rowlang['Type'], 6, (strlen($rowlang['Type'])-8));
		$enumvalues = preg_split('#\',\'#', $type);
		return $enumvalues;
	}
	
}
	
function ezl_sansBlancs($chaine)
{
	return ezl_utile::supprimerBlancs($chaine);
}

function ezl_chgBlancsEnEntite_nbsp($chaine)
{
	return ezl_utile::changerBlancsEnEntite_nbsp($chaine);
}

?>