<?php

/**
 * Gestion les pages du site
 */
class ezl_page {
	/**
	 * Liste de toutes les pages internes du site
	 */
	const PAGE_ACCUEIL 						= 0;
	const PAGE_QUI_SOMMES_NOUS				= 1;
	const PAGE_LAMPES_ORIGINALES 			= 2;
	const PAGE_LAMPES_COMPATIBLES 			= 3;
	const PAGE_RECHERCHE 					= 4;
	const PAGE_NOUVELLES_PROMOTIONS 		= 5;
	const PAGE_PANIER 						= 6;
	const PAGE_GARANTIE 					= 7;
	const PAGE_ENVIRONNEMENT 				= 8;
	const PAGE_VIDEOS 						= 9;
	const PAGE_SOYEZ_CREATIFS 				= 10;
	const PAGE_CONFIDENTIALITE_SECURITE 	= 11;
	const PAGE_TEMOIGNAGE_CLIENTS 			= 12;
	const PAGE_CONTACT 						= 13;
	const PAGE_LIENS 						= 14;
	const PAGE_DEVIS 						= 15;
	const PAGE_SAV 							= 16;
	const PAGE_RMA 							= 17;
	const PAGE_CONDITIONS					= 18;
	const PAGE_LOGIN						= 19;
	const PAGE_CONSTRUCTEURS				= 20;
	const PAGE_LAMPES_UN_CONSTRUCTEUR		= 21;
	const PAGE_PAIEMENT_PORT				= 22;
	const PAGE_LAMPES_OI					= 23;
	const PAGE_VIDEOPROJECTEURS_UNE_LAMPE	= 24;
	
	const PAGE_PAGE_INTROUVABLE				= 25; // DOIT IMPERATIVEMENT ETRE LA DERNIERE
	
	const CHAMP_PAGE_TITRE					= 0;
	const CHAMP_PAGE_LIEN					= 1;

	// Rappel des zones selon la nomenclature de la base 'table el_seo_texts'
	const ZONE_PAGE_META_TITLE				= 0;
	const ZONE_PAGE_META_DESC				= 1;
	const ZONE_PAGE_META_KEYWORDS			= 2;
	const ZONE_PAGE_TITRE_A					= 3;
	const ZONE_PAGE_TITRE_B					= 4;
	const ZONE_PAGE_TITRE_C					= 5;
	const ZONE_PAGE_TITRE_D					= 6;
	const ZONE_PAGE_TITRE_N					= 7;	
	const ZONE_PAGE_CONTENU_A				= 8;
	const ZONE_PAGE_CONTENU_B				= 9;
	const ZONE_PAGE_CONTENU_C				= 10;
	const ZONE_PAGE_CONTENU_D				= 11;
	const ZONE_PAGE_CONTENU_N				= 12;	
	const ZONE_PAGE_LISTE_A					= 13;
	const ZONE_PAGE_LISTE_B					= 14;
	const ZONE_PAGE_LISTE_C					= 15;
	const ZONE_PAGE_LISTE_D					= 16;
	const ZONE_PAGE_LISTE_N					= 17;	
	const ZONE_PAGE_VRAC					= 18;

	// Mapping des id avec la nomenclature zencart (body_dd ou current_page_base)
	static public $chaines_db_zone = array (
		self::ZONE_PAGE_META_TITLE		=> 'Meta title',
		self::ZONE_PAGE_META_DESC		=> 'Meta desc',
		self::ZONE_PAGE_META_KEYWORDS	=> 'Meta keywords',

		self::ZONE_PAGE_TITRE_A			=> 'Titre A',
		self::ZONE_PAGE_CONTENU_A		=> 'Contenu A',
		self::ZONE_PAGE_LISTE_A			=> 'Liste A',

		self::ZONE_PAGE_TITRE_B			=> 'Titre B',
		self::ZONE_PAGE_CONTENU_B		=> 'Contenu B',
		self::ZONE_PAGE_LISTE_B			=> 'Liste B',

		self::ZONE_PAGE_TITRE_C			=> 'Titre C',
		self::ZONE_PAGE_CONTENU_C		=> 'Contenu C',
		self::ZONE_PAGE_LISTE_C			=> 'Liste C',

		self::ZONE_PAGE_TITRE_D			=> 'Titre D',
		self::ZONE_PAGE_CONTENU_D		=> 'Contenu D',
		self::ZONE_PAGE_LISTE_D			=> 'Liste D',
		
		self::ZONE_PAGE_TITRE_N			=> 'Titre N',
		self::ZONE_PAGE_CONTENU_N		=> 'Contenu N',
		self::ZONE_PAGE_LISTE_N			=> 'Liste N',		

		self::ZONE_PAGE_VRAC			=> 'Vrac'
	);

	// Mapping des id avec la nomenclature zencart (body_dd ou current_page_base)
	static public $chaineSelonId = array (
		self::PAGE_ACCUEIL						=> 'index',
		self::PAGE_QUI_SOMMES_NOUS				=> 'privacy',
		self::PAGE_LAMPES_ORIGINALES 			=> 'lampes_originales',
		self::PAGE_LAMPES_COMPATIBLES			=> 'lampes_compatibles',
		self::PAGE_RECHERCHE					=> 'advanced_search',
		self::PAGE_NOUVELLES_PROMOTIONS 		=> 'nouvelles_et_promotions',
		self::PAGE_PANIER 						=> 'shopping_cart',
		self::PAGE_GARANTIE 					=> 'shippinginfo',
		self::PAGE_ENVIRONNEMENT 				=> 'environnement',
		self::PAGE_VIDEOS 						=> 'videos',
		self::PAGE_SOYEZ_CREATIFS 				=> 'soyez_creatifs',
		self::PAGE_CONFIDENTIALITE_SECURITE		=> 'confidentialite_securite',
		self::PAGE_TEMOIGNAGE_CLIENTS 			=> 'temoignage_client',
		self::PAGE_CONTACT 						=> 'xxxxxxx_xx',
		self::PAGE_LIENS 						=> 'liens',
		self::PAGE_DEVIS 						=> 'devis',
		self::PAGE_SAV 							=> 'sav',
		self::PAGE_RMA 							=> 'rma',
		self::PAGE_CONDITIONS					=> 'conditions',
		self::PAGE_LOGIN						=> 'login',
		self::PAGE_CONSTRUCTEURS				=> 'PAGE_CONSTRUCTEURS',
		self::PAGE_LAMPES_UN_CONSTRUCTEUR		=> 'PAGE_LAMPES_UN_CONSTRUCTEUR',
		self::PAGE_PAIEMENT_PORT            	=> 'paiement_port',
		self::PAGE_LAMPES_OI		            => 'lampes_oi',
		self::PAGE_VIDEOPROJECTEURS_UNE_LAMPE	=> 'PAGE_VIDEOPROJECTEURS_UNE_LAMPE',
		self::PAGE_PAGE_INTROUVABLE				=> 'page_not_found'
	);


	// Mapping des id avec la nomenclature de la base 'table el_seo_texts'
	static public $chaines_db = array (
		self::PAGE_ACCUEIL						=> 'Home',
		self::PAGE_CONSTRUCTEURS				=> 'Liste Cstr',
		self::PAGE_LAMPES_UN_CONSTRUCTEUR		=> 'Lampes cstr',
		self::PAGE_VIDEOPROJECTEURS_UNE_LAMPE	=> 'Videos pour lampe',
		self::PAGE_QUI_SOMMES_NOUS				=> 'sp_privacy',
		self::PAGE_LAMPES_ORIGINALES			=> 'sp_lampes_originales',
		self::PAGE_LAMPES_COMPATIBLES			=> 'sp_lampes_compatibles',
		self::PAGE_RECHERCHE					=> 'sp_advanced_search',
		self::PAGE_NOUVELLES_PROMOTIONS			=> 'sp_nouvelles_et_promotions',
		self::PAGE_PANIER						=> 'sp_shopping_cart',
		self::PAGE_GARANTIE						=> 'sp_shippinginfo',
		self::PAGE_ENVIRONNEMENT				=> 'sp_environnement',
		self::PAGE_VIDEOS						=> 'sp_videos',
		self::PAGE_SOYEZ_CREATIFS				=> 'sp_soyez_creatifs',
		self::PAGE_LIENS						=> 'sp_liens',
		self::PAGE_DEVIS						=> 'sp_devis',
		self::PAGE_CONFIDENTIALITE_SECURITE		=> 'sp_confidentialite_securite',
		self::PAGE_TEMOIGNAGE_CLIENTS			=> 'sp_temoignage_client',
		self::PAGE_CONTACT						=> 'sp_xxxxx_xxx',
		self::PAGE_PAIEMENT_PORT				=> 'sp_paiement_port',
		self::PAGE_LAMPES_OI					=> 'sp_lampes_oi'		
		
//		self::PAGE_SAV 							=> '',
//		self::PAGE_RMA 							=> '',
//		self::PAGE_LOGIN						=> '',
//		self::PAGE_PAGE_INTROUVABLE				=> '',
	);

	static public function idSelonChaine($bodyIdSelonZenCart, $idParDefaut = NULL) {
		$resultat = $idParDefaut;
		foreach (self::$chaineSelonId as $id => $chaine) {
			if ($chaine == $bodyIdSelonZenCart) {
				$resultat = $id;
				break;
			}
		}
		if (!isset($resultat)) {
			trigger_error(sprintf('La chaine (%s) ne correspond à aucune page répertoriée.', $bodyIdSelonZenCart), E_USER_ERROR);
		}
		return $resultat;
	}
	
}

?>