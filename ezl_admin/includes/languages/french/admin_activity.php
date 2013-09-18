<?php
/**
 * @package admin
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: admin_activity.php 18695 2011-05-04 05:24:19Z drbyte $
 */

define('HEADING_TITLE', 'Gestion du Journal d\'Activité Admin');
define('HEADING_SUB1', 'Visualiser ou exporter le journal');
define('HEADING_SUB2', 'Purger l\'historique du journal');
define('TEXT_ACTIVITY_EXPORT_FORMAT', 'Format du fichier d\'export:');
define('TEXT_ACTIVITY_EXPORT_FILENAME', 'Nom du fichier d\'export:');
define('TEXT_ACTIVITY_EXPORT_SAVETOFILE','Enregistrer dans un fichier sur le serveur ? (sinon il sera downloadé directement depuis cette fenêtre)');
define('TEXT_ACTIVITY_EXPORT_DEST','Destination: ');
define('TEXT_PROCESSED', ' traité.');
define('SUCCESS_EXPORT_ADMIN_ACTIVITY_LOG', 'Exportation terminée. ');
define('FAILURE_EXPORT_ADMIN_ACTIVITY_LOG', 'ALERTE: Échec de l\'exportation. Impossible d\'écrire le fichier.');

define('TEXT_INSTRUCTIONS','<u>INSTRUCTIONS</u><br />Vous pouvez utiliser cette page pour exporter l\'activité de vos accès utilisateurs à l\'Administration de Zen Cart&reg; vers un fichier d\'archivage CSV.<br />Vous devez sauvegarder ces données pour les utiliser en recherche de fraude au cas où votre site serait compromis. C\'est une obligation pour la conformité à PCI.<br />
<ol><li>Choisissez de visualiser ou d\'exporter vers un fichier.<li>Entrez un nom de fichier.<li>Cliquez sur Go pour procéder.<li>Choisissez d\'enregistrer ou d\'ouvrir le fichier, selon ce que votre navigateur permet.</ol>');

define('TEXT_INFO_ADMIN_ACTIVITY_LOG', '<strong>Vider la table journal d\'activité Admin de la base de données<br />AVERTISSEMENT: ASSUREZ-VOUS D\'AVOIR SAUVEGARDÉ VOTRE BASE DE DONNÉES avant de lancer cette mise &agrave; jour !</strong><br />Le journal d\'activité Admin est une méthode de surveillance qui enregistre l\'activité dans l\'Administration.<br />En raison de sa nature, il peut devenir très gros, très lent et doit être nettoyé de temps en temps.<br />Des avertissements sont donnés à 50.000 enregistrements ou à 60 jours, selon ce qui survient en premier.<br /><span class="alert">NOTE: Pour être conforme à PCI, vous avez l\'obligation de conserver l\'historique du journal d\'activité Admin pendant 12 mois.<br />Il vaut mieux archiver vos journaux en choisissant EXPORTER VERS CSV et en cliquant sur Go, ci-dessus, *AVANT* de purger les données du journal.</span>');
define('TEXT_ADMIN_LOG_PLEASE_CONFIRM_ERASE', '<strong><span class="alert">AVERTISSEMENT !: Vous êtes sur le point de SUPPRIMER de votre base de données des enregistrements *importants* de vérifications à rebours.</span></strong><br />Vous devez D\'ABORD confirmer que vous avez une SAUVEGARDE sérieuse de votre base de données avant de procéder.<br />En agissant ainsi, vous acceptez la suppression de ces informations et endossez vos responsabilités légales concernant ces données.<br /><br />Je comprends mes responsabilités, et souhaite procéder à la suppression en cliquant Réinitialisation:<br />');
define('SUCCESS_CLEAN_ADMIN_ACTIVITY_LOG', 'Effacement <strong>terminé</strong> du journal d\'activité Admin');

?>