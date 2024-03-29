<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: advanced_search.php 3253 2006-03-25 17:26:14Z birdbrain $
 */

define('NAVBAR_TITLE_1', 'Recherche avancée');
define('NAVBAR_TITLE_2', 'Résultats de recherche');

define('HEADING_TITLE_1', 'Recherche avancée');
define('HEADING_TITLE_2', 'Produits correspondants aux critères de recherche');

define('HEADING_SEARCH_CRITERIA', 'Entrez vos termes de recherche');

define('TEXT_SEARCH_IN_DESCRIPTION', 'Chercher dans les descriptions de produits');
define('ENTRY_CATEGORIES', 'Limiter à la catégorie:');
define('ENTRY_INCLUDE_SUBCATEGORIES', 'Inclure les sous-catégories');
define('ENTRY_MANUFACTURERS', 'Limiter au fabricant:');
define('ENTRY_PRICE_RANGE', 'Recherche par tranche de prix');
define('ENTRY_PRICE_FROM', 'Depuis ce prix:');
define('ENTRY_PRICE_TO', 'Jusqu\'à ce prix:');
define('ENTRY_DATE_RANGE', 'Recherche par date de création');
define('ENTRY_DATE_FROM', 'Depuis cette date:');
define('ENTRY_DATE_TO', 'Jusqu\'à cette date:');

define('TEXT_SEARCH_HELP_LINK', '<u>Aide à la recherche</u> [?]');

define('TEXT_ALL_CATEGORIES', 'Toutes les catégories');
define('TEXT_ALL_MANUFACTURERS', 'Tous les fabricants');

define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', 'Modèle');
define('TABLE_HEADING_PRODUCTS', 'Nom du produit');
define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
define('TABLE_HEADING_QUANTITY', 'Quantité');
define('TABLE_HEADING_PRICE', 'Prix');
define('TABLE_HEADING_WEIGHT', 'Poids');
define('TABLE_HEADING_BUY_NOW', 'Acheter maintenant');

define('TEXT_NO_PRODUCTS', 'Aucun produit ne correspond aux critères de recherche.');
define('KEYWORD_FORMAT_STRING', 'Mots clés');

define('ERROR_AT_LEAST_ONE_INPUT', 'Veuillez remplir au moins un des champs du formulaire de recherche.');
define('ERROR_INVALID_FROM_DATE', '"Depuis cette date" invalide.');
define('ERROR_INVALID_TO_DATE', '"Jusqu\'à cette date" invalide.');
define('ERROR_TO_DATE_LESS_THAN_FROM_DATE', '"Jusqu\'à cette date" doit être supérieure à "Depuis cette date".');
define('ERROR_PRICE_FROM_MUST_BE_NUM', '"Depuis ce prix" doit être un nombre.');
define('ERROR_PRICE_TO_MUST_BE_NUM', '"Jusqu\'à ce prix" doit être un nombre !');
define('ERROR_PRICE_TO_LESS_THAN_PRICE_FROM', '"Jusqu\'à ce prix" doit être plus grand ou égal à "Depuis ce prix".');
define('ERROR_INVALID_KEYWORDS', 'Mots-clefs invalides.');
?>
