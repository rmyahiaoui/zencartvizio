<?php
/**
 * @package admin
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: currencies.php 18931 2011-06-13 15:22:34Z drbyte $
 */

define('HEADING_TITLE', 'Devises');

define('TABLE_HEADING_CURRENCY_NAME', 'Devise');
define('TABLE_HEADING_CURRENCY_CODES', 'Code');
define('TABLE_HEADING_CURRENCY_VALUE', 'Valeur');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_EDIT_INTRO', 'Veuillez effectuer les changements nécessaires');
define('TEXT_INFO_CURRENCY_TITLE', 'Intitulé:');
define('TEXT_INFO_CURRENCY_CODE', 'Code:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'Symbole à gauche:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'Symbole à droite:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Point décimal:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Séparateur des milliers:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Nombre de décimales:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', 'Dernière mise à jour:');
define('TEXT_INFO_CURRENCY_VALUE', 'Valeur:');
define('TEXT_INFO_CURRENCY_EXAMPLE', 'Exemple:');
define('TEXT_INFO_INSERT_INTRO', 'Veuillez renseigner la nouvelle devise et ses données relatives');
define('TEXT_INFO_DELETE_INTRO', 'Êtes-vous certain de vouloir supprimer cette devise ?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', 'Nouvelle devise');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', 'Éditer la devise');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', 'Supprimer la devise');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . '  [requiert une actualisation manuelle des taux de change]');
define('TEXT_INFO_CURRENCY_UPDATED', 'Le taux de change de %s (%s) a été actualisé avec succès via %s.');

define('ERROR_REMOVE_DEFAULT_CURRENCY', 'ERREUR: La devise par défaut ne peut être supprimée. Veuillez définir une autre devise par défaut et réessayer.');
define('ERROR_CURRENCY_INVALID', 'ERREUR: Le taux de change de %s (%s) ne peut être actualisé via %s. Le code de la devise est-il le bon ?');
define('WARNING_PRIMARY_SERVER_FAILED', 'ERREUR: Échec sur serveur primaire de (%s). Échec pour %s (%s) - tentative sur le serveur secondaire.');
define('ERROR_INVALID_CURRENCY_ENTRY', 'ERREUR: Les informations que vous avez entré étaient incomplètes, et n\'ont pas été sauvegardées. Vous devez indiquer un code devise et un nom.');
?>