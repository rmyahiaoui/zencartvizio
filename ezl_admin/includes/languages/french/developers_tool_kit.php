<?php
/**
 * @package admin
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: developers_tool_kit.php 18698 2011-05-04 14:50:06Z wilt $
 */
  define('HEADING_TITLE', 'Outils du Développeur');
  define('TABLE_CONFIGURATION_TABLE', 'Recherche de définitions de CONSTANTES');

  define('SUCCESS_PRODUCT_UPDATE_PRODUCTS_PRICE_SORTER', '<strong>SUCCÈS</strong> de la mise à jour des valeurs du champ trieur par prix des produits');

  define('ERROR_CONFIGURATION_KEY_NOT_FOUND', '<strong>ERREUR:</strong> Aucune clef de configuration correspondante n\'a été trouvée.');
  define('ERROR_CONFIGURATION_KEY_NOT_ENTERED', '<strong>ERREUR:</strong> Aucune saisie de clef de configuration ou de texte pour la recherche ... Recherche terminée');

  define('TEXT_INFO_PRODUCTS_PRICE_SORTER_UPDATE', '<strong>Actualiser le champ trieur par prix de TOUS les produits</strong><br />pour pouvoir classer selon le prix affiché.');

  define('TEXT_CONFIGURATION_CONSTANT', '<strong>Recherche de CONSTANTE ou de "define" dans les fichiers de langue</strong>');
  define('TEXT_CONFIGURATION_KEY', 'Clé ou nom :');
  define('TEXT_INFO_CONFIGURATION_UPDATE', '<strong>NOTE:</strong> Les CONSTANTES sont écrites en majuscules.<br />Lorsque rien n\'a été trouvé dans les tables de la base de données, la recherche dans les fichiers de langue, les fonctions, les classes, etc... est exécutée si l\'option est sélectionnée dans les listes déroulantes.');

  define('TABLE_TITLE_KEY', '<strong>Clef:</strong>');
  define('TABLE_TITLE_TITLE', '<strong>Intitulé:</strong>');
  define('TABLE_TITLE_DESCRIPTION', '<strong>Description:</strong>');
  define('TABLE_TITLE_GROUP', '<strong>Groupe:</strong>');
  define('TABLE_TITLE_VALUE', '<strong>Valeur:</strong>');

  define('TEXT_LOOKUP_NONE', 'Aucun');
  define('TEXT_INFO_SEARCHING', 'Recherche ');
  define('TEXT_INFO_FILES_FOR', ' fichiers ... pour: ');
  define('TEXT_INFO_MATCHES_FOUND', 'Lignes correspondantes trouvées: ');
  define('TEXT_INFO_FILENAME', 'FICHIER: ');

  define('TEXT_LANGUAGE_LOOKUPS', 'Recherche dans les fichiers de langue:');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_LANGUAGE', 'Tous les fichiers de langue pour ' . strtoupper($_SESSION['language']) . ' - Catalogue/Admin');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG', 'Tous les fichiers principaux de langue - Catalogue (' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . 'english.php /french.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_CATALOG_TEMPLATE', 'Tous les fichiers de la langue en cours - ' . DIR_WS_CATALOG . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN', 'Tous les fichiers principaux de langue - Admin (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . 'english.php /french.php etc.)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ADMIN_LANGUAGE', 'Tous les fichiers de la langue en cours - Admin (' . DIR_WS_ADMIN . DIR_WS_LANGUAGES . $_SESSION['language'] . '/*.php)');
  define('TEXT_LANGUAGE_LOOKUP_CURRENT_ALL', 'Tous les fichiers de la langue en cours - Catalogue/Admin');

  define('TEXT_FUNCTION_CONSTANT', '<strong>Recherche dans les fonctions ou les fichiers de fonctions</strong>');
  define('TEXT_FUNCTION_LOOKUPS', 'Recherche dans les fichiers de fonctions:');
  define('TEXT_FUNCTION_LOOKUP_CURRENT', 'Tous les fichiers de fonctions - Catalogue/Admin');
  define('TEXT_FUNCTION_LOOKUP_CURRENT_CATALOG', 'Tous les les fichiers de fonctions - Catalogue');
  define('TEXT_FUNCTION_LOOKUP_CURRENT_ADMIN', 'Tous les les fichiers de fonctions - Admin');

  define('TEXT_CLASS_CONSTANT', '<strong>Recherche dans les classes ou les fichiers de classes</strong>');
  define('TEXT_CLASS_LOOKUPS', 'Recherche dans les fichiers de classes:');
  define('TEXT_CLASS_LOOKUP_CURRENT', 'Tous les fichiers de classes - Catalogue/Admin');
  define('TEXT_CLASS_LOOKUP_CURRENT_CATALOG', 'Tous les fichiers de classes - Catalogue');
  define('TEXT_CLASS_LOOKUP_CURRENT_ADMIN', 'Tous les fichiers de classes - Admin');

  define('TEXT_TEMPLATE_CONSTANT', '<strong>Recherche dans les choses relatives aux templates</strong>');
  define('TEXT_TEMPLATE_LOOKUPS', 'Recherche dans les fichiers de templates:');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT', 'Tous les fichiers de templates - /templates /sideboxes /pages etc.');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_TEMPLATES', 'Tous les fichiers de templates - /templates');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_SIDEBOXES', 'Tous les fichiers de templates - /sideboxes');
  define('TEXT_TEMPLATE_LOOKUP_CURRENT_PAGES', 'Tous les fichiers de templates - /pages');

  define('TEXT_ALL_FILES_CONSTANT', '<strong>Recherche dans tout fichier</strong>');
  define('TEXT_ALL_FILES_LOOKUPS', 'Recherche dans tous les fichiers:');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT', 'Tous les fichiers - Catalogue/Admin');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT_CATALOG', 'Tous les fichiers - Catalogue');
  define('TEXT_ALL_FILES_LOOKUP_CURRENT_ADMIN', 'Tous les fichiers - Admin');

  define('TEXT_INFO_NO_EDIT_AVAILABLE','Pas d\'édition disponible');
  define('TEXT_INFO_CONFIGURATION_HIDDEN', ' ou, CACHÉ');
  
  define('TEXT_SEARCH_ALL_FILES', 'Recherche dans TOUS les fichiers de: ');
  define('TEXT_SEARCH_DATABASE_TABLES', 'Recherche dans les tables de configuration de la base de données de: ');

  define('TEXT_ALL_FILESTYPE_LOOKUPS', 'Type du fichier');
  define('TEXT_ALL_FILES_LOOKUP_PHP', '.php uniquement');
  define('TEXT_ALL_FILES_LOOKUP_PHPCSS', '.php et .css');
  define('TEXT_ALL_FILES_LOOKUP_CSS', '.css uniquement');
  define('TEXT_ALL_FILES_LOOKUP_HTMLTXT', '.html et .txt');
  define('TEXT_ALL_FILES_LOOKUP_JS', '.js uniquement');

  define('TEXT_CASE_SENSITIVE', 'Sensible à la casse ?');
?>