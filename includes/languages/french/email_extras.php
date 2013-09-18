<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: email_extras.php 7161 2007-10-02 10:58:34Z drbyte $
 */

// office use only
define('OFFICE_FROM','<strong>De :</strong>');
define('OFFICE_EMAIL','<strong>E-mail :</strong>');

define('OFFICE_SENT_TO','<strong>Envoyé à :</strong>');
define('OFFICE_EMAIL_TO','<strong>E-mail :</strong>');

define('OFFICE_USE','<strong>Usage professionnel uniquement:</strong>');
define('OFFICE_LOGIN_NAME','<strong>Nom de connexion:</strong>');
define('OFFICE_LOGIN_EMAIL','<strong>E-mail de connexion </strong>');
define('OFFICE_LOGIN_PHONE','<strong>Téléphone:</strong>');
define('OFFICE_LOGIN_FAX','<strong>Fax:</strong>');
define('OFFICE_IP_ADDRESS','<strong>Adresse IP:</strong>');
define('OFFICE_HOST_ADDRESS','<strong>Adresse de l\'hôte:</strong>');
define('OFFICE_DATE_TIME','<strong>Date et heure:</strong>');
if (!defined('OFFICE_IP_TO_HOST_ADDRESS')) define('OFFICE_IP_TO_HOST_ADDRESS', 'OFF');

// email disclaimer
define('EMAIL_DISCLAIMER', 'Cette adresse e-mail nous a été donnée par vous ou par un de nos clients. Si vous pensez avoir reçu cet e-mail par erreur, veuillez envoyer un e-mail à: %s');
define('EMAIL_SPAM_DISCLAIMER','Cet e-mail vous est adressé en accord avec la loi US CAN-SPAM du 01/01/2004. Les demandes de suppression peuvent être envoyées à cette adresse et seront honorées et respectées.');
define('EMAIL_FOOTER_COPYRIGHT','Copyright (c) ' . date('Y') . ' <a href="http://www.zen-cart.com" target="_blank">Zen Cart</a>. Propulsé par <a href="http://www.zen-cart.com" target="_blank">Zen Cart</a>');
define('TEXT_UNSUBSCRIBE', "\n\nPour vous désabonner de nos futurs bulletins et e-mails promotionnels, cliquez simplement sur le lien suivant: \n");

// email advisory for all emails customer generate - tell-a-friend and GV send
define('EMAIL_ADVISORY', '-----' . "\n" . '<strong>IMPORTANT:</strong> Pour votre protection et pour empêcher tout usage malveillant, tous les mails envoyés depuis ce site web sont journalisés, leur contenu enregistré et disponible pour le gérant. Si vous estimez avoir reçu cet e-mail par erreur, veuillez contacter par mail ' . STORE_OWNER_EMAIL_ADDRESS . "\n\n");

// email advisory included warning for all emails customer generate - tell-a-friend and GV send
define('EMAIL_ADVISORY_INCLUDED_WARNING', '<strong>Ce message figure dans tous les e-mails envoyés depuis ce site :</strong>');


// Admin additional email subjects
define('SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_SUBJECT','[CRÉER UN COMPTE]');
define('SEND_EXTRA_TELL_A_FRIEND_EMAILS_TO_SUBJECT','[INFORMER UN(E) AMI(E)]');
define('SEND_EXTRA_GV_CUSTOMER_EMAILS_TO_SUBJECT','[CHÈQUE CADEAU CLIENT ENVOYÉ]');
define('SEND_EXTRA_NEW_ORDERS_EMAILS_TO_SUBJECT','[NOUVELLE COMMANDE]');
define('SEND_EXTRA_CC_EMAILS_TO_SUBJECT','[info EXTRA CC DE COMMANDE] #');

// Low Stock E-mails
define('EMAIL_TEXT_SUBJECT_LOWSTOCK','ATTENTION: Stock bas');
define('SEND_EXTRA_LOW_STOCK_EMAIL_TITLE','Rapport de stock bas: ');

// for when gethost is off
define('OFFICE_IP_TO_HOST_ADDRESS', 'Désactivé');  
?>