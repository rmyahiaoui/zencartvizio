<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tell_a_friend.php 3159 2006-03-11 01:35:04Z drbyte $
 */

define('NAVBAR_TITLE', 'Informer un(e) ami(e)');

define('HEADING_TITLE', 'Informer un(e) ami(e) concernant \'%s\'');

define('FORM_TITLE_CUSTOMER_DETAILS', 'Vous');
define('FORM_TITLE_FRIEND_DETAILS', 'Votre ami(e): ');
define('FORM_TITLE_FRIEND_MESSAGE', 'Votre message');

define('FORM_FIELD_CUSTOMER_NAME', 'Votre nom: ');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Votre adresse e-mail: ');
define('FORM_FIELD_FRIEND_NAME', 'Nom de votre ami(e): ');
define('FORM_FIELD_FRIEND_EMAIL', 'Adresse e-mail de votre ami(e): ');

define('EMAIL_SEPARATOR', '----------------------------------------------------------------------------------------');

define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Votre e-mail concernant <strong>%s</strong> a été envoyé avec succès à <strong>%s</strong>.');

define('EMAIL_TEXT_HEADER','Information importante !');

define('EMAIL_TEXT_SUBJECT', 'Votre ami(e) %s vous recommande ce produit sur le site %s');
define('EMAIL_TEXT_GREET', 'Bonjour %s!' . "\n\n");
define('EMAIL_TEXT_INTRO', 'Votre ami(e), %s, pense que vous seriez intéressé(e) au sujet de %s sur %s.');

define('EMAIL_TELL_A_FRIEND_MESSAGE','%s a envoyé une note disant: ');

define('EMAIL_TEXT_LINK', 'Pour visualiser le produit, cliquez sur le lien ci-dessous ou copiez/coller ce lien dans votre navigateur web:' . "\n\n" . '%s');
define('EMAIL_TEXT_SIGNATURE', 'Cordialement,' . "\n\n" . '%s');

define('ERROR_TO_NAME', 'ERREUR: Le nom de votre ami ne doit pas être vide.');
define('ERROR_TO_ADDRESS', 'ERREUR: L\'adresse e-mail de votre ami ne semble pas valide. Veuillez recommencer.');
define('ERROR_FROM_NAME', 'ERREUR: Votre nom ne doit pas être vide..');
define('ERROR_FROM_ADDRESS', 'ERREUR: Votre adresse e-mail ne semble pas valide. Veuillez recommencer.');
?>