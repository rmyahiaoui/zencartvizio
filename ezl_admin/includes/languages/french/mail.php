<?php
/**
 * @package admin
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: mail.php 7197 2007-10-06 20:35:52Z drbyte $
 */


define('HEADING_TITLE', 'Envoyer un e-mail aux Clients');

define('TEXT_CUSTOMER', 'Client(s):');
define('TEXT_SUBJECT', 'Sujet:');
define('TEXT_FROM', 'De:');
define('TEXT_MESSAGE', 'Message <br />au format Text-Only:');
define('TEXT_MESSAGE_HTML','Message <br />au format Rich Text:');
define('TEXT_SELECT_CUSTOMER', 'Sélection client(s)');
define('TEXT_ALL_CUSTOMERS', 'Tous les clients');
define('TEXT_NEWSLETTER_CUSTOMERS', 'À tous les abonnés au bulletin');
define('TEXT_ATTACHMENTS_LIST','Pièces jointes: ');
define('TEXT_SELECT_ATTACHMENT','Pièces jointes<br />sur serveur: ');
define('TEXT_SELECT_ATTACHMENT_TO_UPLOAD','Pièces jointes<br />à uploader<br />&amp; joindre: ');
define('TEXT_ATTACHMENTS_DIR','Répertoire pour uploader: ');

define('NOTICE_EMAIL_SENT_TO', 'Note: E-mail envoyé à: %s');
define('NOTICE_EMAIL_FAILED_SEND', 'ATTENTION: Échec d\'envoi du mail à certains destinataires: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'ERREUR: Aucun client sélectionné.');
define('ERROR_NO_SUBJECT', 'ERREUR: Aucun sujet indiqué.');
define('ERROR_ATTACHMENTS', 'ERREUR: Vous ne pouvez pas sélectionner à la fois UPLOADER et AJOUTER des pièces jointes. Un seul choix est possible.');
?>