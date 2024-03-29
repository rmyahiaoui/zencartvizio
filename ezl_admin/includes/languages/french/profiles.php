<?php
/**
 * @package admin
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: profiles.php 19321 2011-08-02 19:18:55Z kuroi $
 */

define('HEADING_TITLE_ALL_PROFILES', 'Profils Utilisateurs');
define('HEADING_TITLE_INDIVIDUAL_PROFILE', 'Profil de %s ');
define('HEADING_TITLE_NEW_PROFILE', 'Nouveau profil pour');

define('ERROR_NO_PROFILE_DEFINED', 'L\'option que vous avez demandé ne peut être prise en compte sans spécifier un profil');
define('ERROR_NO_PROFILE_NAME', 'Veuillez saisir un nom pour le nouveau profil');
define('ERROR_INVALID_PROFILE_NAME', 'Veuillez saisir un nom valide pour le nouveau profil');
define('ERROR_DUPLICATE_PROFILE_NAME', 'Un profil de même nom existe déjà. Veuillez choisir un nom différent ou modifier le profil existant');
define('ERROR_NO_PAGES_IN_PROFILE', 'Un profil ne peut être vide, veuillez choisir des pages');
define('ERROR_UNABLE_TO_CREATE_PROFILE', 'Impossible de créer le profil');

define('SUCCESS_PROFILE_INSERTED', 'Profil ajouté.');
define('SUCCESS_PROFILE_UPDATED', 'Profil modifié.');
define('SUCCESS_PROFILE_NAME_UPDATED', 'Nom du profil modifié');
define('SUCCESS_PROFILE_DELETED', 'Profil supprimé.');

define('TEXT_ID', 'ID');
define('TEXT_NAME', 'Nom');
define('TEXT_USERS', 'Nombre Utilisateurs');
define('TEXT_NO_PROFILES_FOUND', 'Aucun profil n\'a encore été défini');

define('IMAGE_ADD_PROFILE', 'Ajouter Profil');
define('IMAGE_RENAME', 'Renommer');
?>