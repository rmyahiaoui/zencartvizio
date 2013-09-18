<?php
class ezl_langue
{
	// Ca part à 2 pour des raisons de compatibilité
	const CODE_LANGUE_FRANCAIS		= 2;
	const CODE_LANGUE_ESPAGNOL		= 3;
	const CODE_LANGUE_ALLEMAND		= 4;
	const CODE_LANGUE_ANGLAIS		= 5;
	const CODE_LANGUE_ITALIEN		= 6;
	const CODE_LANGUE_PORTUGAIS		= 7;
	const CODE_LANGUE_HORS_LIMITE	= 8;
	
	public static $chaines_langues = array(
		self::CODE_LANGUE_FRANCAIS		=>	array('courte' => 'fr', 'longue' => 'français',		'longue_anglais' => 'french'),
		self::CODE_LANGUE_ESPAGNOL 		=>	array('courte' => 'sp', 'longue' => 'espagnol',		'longue_anglais' => 'spanish'),
		self::CODE_LANGUE_ALLEMAND 		=>	array('courte' => 'de', 'longue' => 'allemand',		'longue_anglais' => 'german'),
		self::CODE_LANGUE_ANGLAIS 		=>	array('courte' => 'en', 'longue' => 'anglais',		'longue_anglais' => 'english'),
		self::CODE_LANGUE_ITALIEN 		=> 	array('courte' => 'it', 'longue' => 'italien',		'longue_anglais' => 'italian'),
		self::CODE_LANGUE_PORTUGAIS 	=>	array('courte' => 'pg', 'longue' => 'portugais',	'longue_anglais' => 'portuguese')
	);
	
	var $id = self::CODE_LANGUE_HORS_LIMITE;

	// Initialise l'objet
	function __construct($id)
	{
		$this->id = $id;
	}

	function __toString()
	{
		return (self::$chaines_langues[$this->id]['courte']);
	}

	function toString($type = 'courte')
	{
		return (self::$chaines_langues[$this->id][$type]);
	}

	function est($codeLangue)
	{
		$codeEstValide = is_integer($codeLangue) 
			&& ($codeLangue >= self::CODE_LANGUE_FRANCAIS)
			&& ($codeLangue < self::CODE_LANGUE_HORS_LIMITE);
		if (!$codeEstValide) {
			trigger_error(sprintf('Le code de langue (%d) n\'est pas valide.', $codeLangue), E_USER_NOTICE);
		}
		return ($codeLangue === $this->id);
	}

	function estParmi()
	{
		$resultat = false;
		$numargs = func_num_args();
		$arg_list = func_get_args();
		for ($i = 0; $i < $numargs; $i++) {
			$resultat = $this->est($arg_list[$i]);
			if ($resultat) 
				break;
		}
		return $resultat;
	}

	public static function chaineCourteACode($chaineCourte)
	{
		unset($resultat);
		foreach (self::$chaines_langues as $code => $chaines) {
			if ($chaineCourte == $chaines['courte']) {
				$resultat = $code;
				break;
			}
		}
		if (!isset($resultat)) {
			trigger_error(sprintf('La chaine courte (%s) ne correspond à aucune langue.', $chaineCourte), E_USER_NOTICE);
		}
		return $resultat;
	}
}	

class ezl_langueFrancais extends ezl_langue
{
	function __construct()
	{
		parent::__construct(self::CODE_LANGUE_FRANCAIS);	
	}
}

class ezl_langueAnglais extends ezl_langue
{
	function __construct()
	{
		parent::__construct(self::CODE_LANGUE_ANGLAIS);	
	}
}

?>