<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: checkout_success.php 14198 2009-08-18 22:32:11Z drbyte $
 */

define('NAVBAR_TITLE_1', 'Encaissement');
define('NAVBAR_TITLE_2', 'Succès - Merci');

define('HEADING_TITLE', 'Merci pour votre achat et votre confiance !');

define('TEXT_SUCCESS', '');
define('TEXT_NOTIFY_PRODUCTS', 'Veuillez me notifier des mises à jour de ces produits');
define('TEXT_SEE_ORDERS', 'Vous pouvez consulter votre historique de commandes en vous rendant sur la page <a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">Mon Compte</a> et en cliquant sur "Voir toutes mes commandes".');
define('TEXT_CONTACT_STORE_OWNER', 'Pour toute question concernant votre commande, merci de contacter notre <a href="' . zen_href_link(FILENAME_CONTACT_US) . '">Service Clientèle</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Nous vous remercions de votre confiance.');

define('TABLE_HEADING_COMMENTS', '');

define('FOOTER_DOWNLOAD', 'Vous pouvez aussi télécharger vos achats ultérieurement sur \'%s\'');

define('TEXT_YOUR_ORDER_NUMBER', '<strong>Votre numéro de commande est :</strong> ');

define('TEXT_CHECKOUT_LOGOFF_GUEST', 'NOTE: Pour terminer votre commande, un compte temporaire a été créé. Vous pouvez fermer ce compte en cliquant sur "Se déconnecter". Cliquer sur "Se déconnecter" permet aussi de s\'assurer que les informations concernant votre achat ne sont pas visibles pour la personne suivante qui utilisera votre ordinateur. Si vous souhaitez continuer vos achats, n\'hésitez pas ! Vous pouvez vous déconnecter à tout moment en utilisant le lien en haut de la page.');
define('TEXT_CHECKOUT_LOGOFF_CUSTOMER', 'Merci de votre achat. Veuillez cliquer sur le lien "Se déconnecter" pour s\'assurer que les informations concernant votre achat ne sont pas visibles pour la personne suivante qui utilisera votre ordinateur.');
?>