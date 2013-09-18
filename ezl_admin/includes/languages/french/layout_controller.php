<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: layout_controller.php 3197 2006-03-17 21:40:58Z drbyte $
//

define('HEADING_TITLE', 'Blocs de Colonnes');

define('TABLE_HEADING_LAYOUT_BOX_NAME', 'Nom du Bloc');
define('TABLE_HEADING_LAYOUT_BOX_STATUS', 'Statut dans<br />la COLONNE<br />GAUCHE/DROITE');
define('TABLE_HEADING_LAYOUT_BOX_STATUS_SINGLE', 'Statut dans<br />la COLONNE<br />UNIQUE');
define('TABLE_HEADING_LAYOUT_BOX_LOCATION', 'COLONNE<br />GAUCHE ou DROITE');
define('TABLE_HEADING_LAYOUT_BOX_SORT_ORDER', 'Classement<br />dans la COLONNE<br />GAUCHE/DROITE');
define('TABLE_HEADING_LAYOUT_BOX_SORT_ORDER_SINGLE', 'Classement<br />dans la COLONNE<br />UNIQUE');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_EDIT_INTRO', 'Veuillez effectuer les changements nécessaires');
define('TEXT_INFO_LAYOUT_BOX','Bloc sélectionné: ');
define('TEXT_INFO_LAYOUT_BOX_NAME', 'Nom du bloc:');
define('TEXT_INFO_LAYOUT_BOX_LOCATION','Localisation:<br />(La colonne unique ignore ce réglage)');
define('TEXT_INFO_LAYOUT_BOX_STATUS', 'Statut dans la colonne gauche/droite: ');
define('TEXT_INFO_LAYOUT_BOX_STATUS_SINGLE', 'Statut dans la colonne unique: ');
define('TEXT_INFO_LAYOUT_BOX_STATUS_INFO','ON = 1 OFF = 0');
define('TEXT_INFO_LAYOUT_BOX_SORT_ORDER', 'Classement dans la colonne gauche/droite:');
define('TEXT_INFO_LAYOUT_BOX_SORT_ORDER_SINGLE', 'Classement dans la colonne unique:');
define('TEXT_INFO_INSERT_INTRO', 'Veuillez saisir le nouveau bloc avec ses données relatives');
define('TEXT_INFO_DELETE_INTRO', 'Êtes-vous certain(e) de vouloir supprimer ce bloc ?');
define('TEXT_INFO_HEADING_NEW_BOX', 'Nouveau bloc');
define('TEXT_INFO_HEADING_EDIT_BOX', 'Éditer le bloc');
define('TEXT_INFO_HEADING_DELETE_BOX', 'Supprimer le bloc');
define('TEXT_INFO_DELETE_MISSING_LAYOUT_BOX','Supprimer le bloc manquant de la liste du template: ');
define('TEXT_INFO_DELETE_MISSING_LAYOUT_BOX_NOTE','NOTE: Cette opération ne supprime pas des fichiers et vous pouvez réinstaller le bloc à tout moment en l\'ajoutant au répertoire correspondant.<br /><br /><strong>Effacer le Nom des Blocs: </strong>');
define('TEXT_INFO_RESET_TEMPLATE_SORT_ORDER','Réinitialiser le classement de tous les blocs au classement PAR DÉFAUT des blocs du template: ');
define('TEXT_INFO_RESET_TEMPLATE_SORT_ORDER_NOTE','Cette opération ne supprime aucun bloc. Elle réinitialise seulement le classement actuel.');
define('TEXT_INFO_BOX_DETAILS','Détails du bloc: ');

////////////////

define('HEADING_TITLE_LAYOUT_TEMPLATE', 'Disposition du template du site');

define('TABLE_HEADING_LAYOUT_TITLE', 'Intitulé');
define('TABLE_HEADING_LAYOUT_VALUE', 'Valeur');
define('TABLE_HEADING_ACTION', 'Action');


define('TEXT_MODULE_DIRECTORY', 'Répertoire de disposition du site:');
define('TEXT_INFO_DATE_ADDED', 'Date de création:');
define('TEXT_INFO_LAST_MODIFIED', 'Dernière modification:');

// layout box text in includes/boxes/layout.php
define('BOX_HEADING_LAYOUT', 'Disposition');
define('BOX_LAYOUT_COLUMNS', 'Contrôleur des colonnes');

// file exists
define('TEXT_GOOD_BOX',' ');
define('TEXT_BAD_BOX','<font color="ff0000"><b>ABSENT</b></font><br />');


// Success message
define('SUCCESS_BOX_DELETED','Suppression réussie du template pour le bloc: ');
define('SUCCESS_BOX_RESET','Réinitialisation réussie des paramètres de tous les blocs à leur valeur par défaut pour le template: ');
define('SUCCESS_BOX_UPDATED','Mise à jour réussie des paramètres du bloc: ');

define('TEXT_ON',' ON ');
define('TEXT_OFF',' OFF ');
define('TEXT_LEFT',' GAUCHE ');
define('TEXT_RIGHT',' DROITE ');

?>