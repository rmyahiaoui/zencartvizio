<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: usps.php 4867 2006-10-31 09:59:01Z drbyte $
 */

define('MODULE_SHIPPING_USPS_TEXT_TITLE', 'USPS - United States Postal Service');
define('MODULE_SHIPPING_USPS_TEXT_DESCRIPTION', 'United States Postal Service<br /><br />Vous devrez avoir enregistré un compte Web Tools chez USPS sur <a href="http://www.usps.com/webtools/" target="_blank">leur site web</a> pour pouvoir utiliser ce module.<br /><br />USPS vous demande d\'<strong>utiliser les pounds comme mesure de poids</strong> pour vos produits.' . ((MODULE_SHIPPING_USPS_USERID == 'NONE' || MODULE_SHIPPING_USPS_USERID == '' || MODULE_SHIPPING_USPS_SERVER == 'test') ? '<br /><br /><strong>Création d\'un compte client pour les quotations de livraison en temps réel d\'USPS</strong><br />
1. <a href="http://www.usps.com/webtools/rate.htm" target="_blank">Informations sur USPS et les frais de port.</a><br />
2. <a href="https://secure.shippingapis.com/registration/" target="_blank">Créer un compte Web Tools USPS.</a><br />
3. Complétez vos informations détaillées client puis cliquez sur Envoyer.<br />
4. Vous recevrez un e-mail contenant votre ID d\'utilisateur Web Tools USPS.<br />
5. Entrez l\'ID d\'utilisateur Web Tools dans le module de livraison USPS de Zen Cart.<br />
6. Téléphonez à USPS 1-800-344-7779 et demandez leur de passer votre compte sur le serveur de production ou envoyez leur un e-mail à icustomercare@usps.com, en précisant votre ID d\'utilisateur Web Tools.<br />
7. Ils enverront un autre e-mail de confirmation. Placez le module de Zen Cart dans le mode production (au lieu du mode test) pour terminer la mise en route.': ''));
define('MODULE_SHIPPING_USPS_TEXT_OPT_PP', 'Colis postaux');
define('MODULE_SHIPPING_USPS_TEXT_OPT_PM', 'Envoi Prioritaire');
define('MODULE_SHIPPING_USPS_TEXT_OPT_EX', 'Envoi Express');
define('MODULE_SHIPPING_USPS_TEXT_ERROR', 'Il nous est impossible de trouver une quotation USPS correspondant à votre adresse et les méthodes de livraison que nous utilisons habituellement.<br />Si vous souhaitez utiliser USPS comme votre méthode de livraison, merci de bien vouloir nous contacter.<br />(Assurez-vous que votre code postal est bien saisi correctement.)');
define('MODULE_SHIPPING_USPS_TEXT_SERVER_ERROR', 'Une erreur s\'est produite en obtenant les quotations de livraison USPS.<br />Si vous souhaitez utiliser USPS comme votre méthode de livraison, veuillez contacter le propriétaire de la boutique.');
define('MODULE_SHIPPING_USPS_TEXT_DAY', 'jour');
define('MODULE_SHIPPING_USPS_TEXT_DAYS', 'jours');
define('MODULE_SHIPPING_USPS_TEXT_WEEKS', 'semaines');
define('MODULE_SHIPPING_USPS_TEXT_TEST_MODE_NOTICE', '<br /><span class="alert">Votre compte est en mode TEST. Ne vous attendez à voir des quotations normales tant que votre compte USPS ne sera pas sur le serveur de production (1-800-344-7779) et que vous n\'aurez pas mis le module en mode PRODUCTION dans l\'administration Zen Cart.</span>');

?>
