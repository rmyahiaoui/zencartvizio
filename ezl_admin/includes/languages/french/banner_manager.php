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
//  $Id: banner_manager.php 3131 2006-03-07 22:53:04Z ajeh $
//

define('HEADING_TITLE', 'Gestion des Bannières');

define('TABLE_HEADING_BANNERS', 'Bannières');
define('TABLE_HEADING_GROUPS', 'Groupes');
define('TABLE_HEADING_STATISTICS', 'Affichages / Clics');
define('TABLE_HEADING_STATUS', 'Statut');
define('TABLE_HEADING_BANNER_OPEN_NEW_WINDOWS','Nouvelle fenêtre');
define('TABLE_HEADING_BANNER_ON_SSL', 'Afficher en SSL');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_BANNER_SORT_ORDER', 'Classement');

define('TEXT_BANNERS_TITLE', 'Intitulé de la bannière:');
define('TEXT_BANNERS_URL', 'URL de la bannière:');
define('TEXT_BANNERS_GROUP', 'Groupe de bannières:');
define('TEXT_BANNERS_NEW_GROUP', ', ou entrez un nouveau groupe de bannières ci-dessous');
define('TEXT_BANNERS_IMAGE', 'Image:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', ou indiquez un fichier local (côté serveur) ci-dessous ');
define('TEXT_BANNERS_IMAGE_TARGET', 'Image cible [Enregistrer sous]:');
define('TEXT_BANNER_IMAGE_TARGET_INFO', '<strong>Répertoire cible proposé pour l\'image sur le serveur:</strong> ' . DIR_FS_CATALOG_IMAGES . 'banners/');
define('TEXT_BANNERS_HTML_TEXT_INFO', '<strong>NOTE: Les bannières HTML n\'enregistrent pas les clics dessus</strong>');
define('TEXT_BANNERS_HTML_TEXT', 'Texte HTML:');
define('TEXT_BANNERS_ALL_SORT_ORDER', 'Classement - banner_box_all');
define('TEXT_BANNERS_ALL_SORT_ORDER_INFO', '<strong>NOTE: La sidebox banners_box_all affichera les bannières selon leur ordre de classement</strong>');
define('TEXT_BANNERS_EXPIRES_ON', 'Expire le:');
define('TEXT_BANNERS_OR_AT', ', ou à');
define('TEXT_BANNERS_IMPRESSIONS', 'expositions/affichages.');
define('TEXT_BANNERS_SCHEDULED_AT', 'Planifiée le:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>Notes sur les bannières:</b><ul><li>Utilisez une image ou du texte HTML pour la bannière mais pas les deux en même temps.</li><li>Le texte HTML a priorité sur l\'image</li><li>Le texte HTML ne comptera pas les clics sur la bannière, mais comptera les affichages</li><li>Les bannières avec des URLs absolues ne sont pas conseillées sur des pages sécurisées</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>Notes sur les images:</b><ul><li>Le répertoire de destination lors de l\'upload doit avoir les bonnes permissions (en écriture) !</li><li>Ne remplissez pas le champ Image cible (\'Enregistrer sous\') si vous n\'uploadez pas d\'image sur le serveur web (c\'est à dire si vous utilisez une image déja présente sur le serveur).</li><li>L\'image cible (\'Enregistrer sous\') doit pointer sur un répertoire existant et avec un slash de fin (ex: banners/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>Notes sur la date d\'expiration:</b><ul><li>Seul un des deux champs devrait être renseigné</li><li>Si vous ne désirez pas faire figurer de date d\'expiration automatique de la bannière, laissez ces deux champs vides</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>Notes sur la planification:</b><ul><li>Si la date de planification est précisée, la bannière sera affichée à partir de cette date.</li><li>Toutes les bannières planifiées sont marquées inactives et le restent jusqu\'à leur date où elles deviennent actives.</li></ul>');
define('TEXT_BANNERS_STATUS', 'Statut de la bannière:');
define('TEXT_BANNERS_ACTIVE', 'Active');
define('TEXT_BANNERS_NOT_ACTIVE', 'Inactive');
define('TEXT_INFO_BANNER_STATUS', '<strong>NOTE:</strong> Le statut de la bannière sera actualisé selon la date de planification et les expositions');
define('TEXT_BANNERS_OPEN_NEW_WINDOWS', 'Bannière dans nouvelle fenêtre');
define('TEXT_INFO_BANNER_OPEN_NEW_WINDOWS', '<strong>NOTE:</strong> La bannière s\'ouvrira dans une nouvelle fenêtre');
define('TEXT_BANNERS_ON_SSL', 'Bannière en SSL');
define('TEXT_INFO_BANNER_ON_SSL', '<strong>NOTE:</strong> La bannière peut être affichée sur des pages sécurisées sans générer d\'erreurs');

define('TEXT_BANNERS_DATE_ADDED', 'Date de création:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Planifiée le: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'Expire le: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'Expire après: <b>%s</b> expositions');
define('TEXT_BANNERS_STATUS_CHANGE', 'Changement de statut: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>A');
define('TEXT_BANNERS_LAST_3_DAYS', '3 derniers jours');
define('TEXT_BANNERS_BANNER_VIEWS', 'Affichages de la bannière');
define('TEXT_BANNERS_BANNER_CLICKS', 'Clics sur bannière');

define('TEXT_INFO_DELETE_INTRO', 'Êtes-vous certain(e) de vouloir supprimer cette bannière ?');
define('TEXT_INFO_DELETE_IMAGE', 'Supprimer l\'image de la bannière');

define('SUCCESS_BANNER_INSERTED', 'SUCCÈS: La bannière a été inséré.');
define('SUCCESS_BANNER_UPDATED', 'SUCCÈS: La bannière a été actualisée.');
define('SUCCESS_BANNER_REMOVED', 'SUCCÈS: La bannière a été supprimée.');
define('SUCCESS_BANNER_STATUS_UPDATED', 'SUCCÈS: Le statut de la bannière a été actualisé.');

define('ERROR_BANNER_TITLE_REQUIRED', 'ERREUR: Intitulé de bannière requis.');
define('ERROR_BANNER_GROUP_REQUIRED', 'ERREUR: Groupe de bannière requis.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'ERREUR: Le répertoire cible %s est inexistant');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'ERREUR: Le répertoire cible n\'est pas inscriptible: %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'ERREUR: L\'image est inexistante.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'ERREUR: L\'image ne peut être supprimée.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'ERREUR: Statut de drapeau inconnu.');
define('ERROR_BANNER_IMAGE_REQUIRED', 'ERREUR: Image de bannière requise.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'ERREUR: Le répertoire des graphiques n\'existe pas. Veuillez créer un répertoire des graphiques du type: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'ERREUR: Le répertoire des graphiques n\'est pas inscriptible. Il est situé à: <strong>' . DIR_WS_ADMIN . 'images/graphs</strong>');

define('TEXT_LEGEND_BANNER_ON_SSL', 'Affichage SSL');
define('TEXT_LEGEND_BANNER_OPEN_NEW_WINDOWS', 'Nouvelle fenêtre');

// Tooltip Text for images in Banner Manager
define('IMAGE_ICON_BANNER_OPEN_NEW_WINDOWS_ON','Ouverture dans nouvelle fenêtre - Activé');
define('IMAGE_ICON_BANNER_OPEN_NEW_WINDOWS_OFF','Ouverture dans nouvelle fenêtre - Désactivé');
define('IMAGE_ICON_BANNER_ON_SSL_ON','Affichage sur pages sécurisées - Activé');
define('IMAGE_ICON_BANNER_ON_SSL_OFF','Affichage sur pages sécurisées - Désactivé');

define('SUCCESS_BANNER_OPEN_NEW_WINDOW_UPDATED', 'SUCCÈS: La capacité de la bannière à s\'ouvrir dans une nouvelle fenêtre a été mis à jour.');
define('SUCCESS_BANNER_ON_SSL_UPDATED', 'SUCCÈS: La capacité de la bannière à s\'afficher avec SSL a été mis à jour.');
?>