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
//  $Id: coupon_admin.php 5758 2007-02-08 01:39:34Z ajeh $
//

define('TOP_BAR_TITLE', 'Statistiques');
define('HEADING_TITLE', 'Bons de Réductions');
define('HEADING_TITLE_STATUS', 'Statut: ');
define('TEXT_CUSTOMER', 'Client:');
define('TEXT_COUPON', 'Nom du bon:');
define('TEXT_COUPON_ALL', 'Tous les bons');
define('TEXT_COUPON_ACTIVE', 'Bons actifs');
define('TEXT_COUPON_INACTIVE', 'Bons inactifs');
define('TEXT_SUBJECT', 'Sujet:');
define('TEXT_UNLIMITED', 'Illimité');
define('TEXT_FROM', 'De:');
define('TEXT_FREE_SHIPPING', 'Livraison gratuite');
define('TEXT_MESSAGE', 'Message:');
define('TEXT_RICH_TEXT_MESSAGE','Message au format Rich-Text:');
define('TEXT_SELECT_CUSTOMER', 'Sélectionnez un client');
define('TEXT_ALL_CUSTOMERS', 'Tous les clients');
define('TEXT_NEWSLETTER_CUSTOMERS', 'À tous les abonnés au bulletin');
define('TEXT_CONFIRM_DELETE', 'Êtes-vous certain(e) de vouloir supprimer ce bon ?');
define('TEXT_SEE_RESTRICT', 'Actif');

define('TEXT_COUPON_ANNOUNCE','Nous sommes heureux de vous offrir un bon de réduction sur notre boutique');

define('TEXT_TO_REDEEM', 'Vous pouvez utiliser ce bon au moment de l\'encaissement. Il vous suffira de saisir le code indiqué dans le champ prévu à cet effet et de cliquer sur le bouton de remise.');
define('TEXT_IN_CASE', ' au cas où vous auriez quelque problème que ce soit. ');
define('TEXT_VOUCHER_IS', 'Le code du bon est ');
define('TEXT_REMEMBER', 'Ne perdez pas le code du bon, assurez-vous de le garder dans un endroit sûr pour pouvoir bénéficier de cette offre spéciale.');
define('TEXT_VISIT', 'À bientôt sur %s');
define('TEXT_ENTER_CODE', ' et entrez le code ');
define('TEXT_COUPON_HELP_DATE', '<p><p>Le bon est valide entre %s et %s</p></p>');
define('HTML_COUPON_HELP_DATE', '<p><p>Le bon est valide entre %s et %s</p></p>');

define('TABLE_HEADING_ACTION', 'Action');

define('CUSTOMER_ID', 'ID Client');
define('CUSTOMER_NAME', 'Nom client');
define('REDEEM_DATE', 'Date remboursé');
define('IP_ADDRESS', 'Adresse IP');

define('TEXT_REDEMPTIONS', 'Rachats');
define('TEXT_REDEMPTIONS_TOTAL', 'Au total');
define('TEXT_REDEMPTIONS_CUSTOMER', 'Pour ce client');
define('TEXT_NO_FREE_SHIPPING', 'Pas de livraison gratuite');

define('NOTICE_EMAIL_SENT_TO', 'NOTE: E-mail adressé à %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'ERREUR: Aucun client sélectionné.');
define('ERROR_NO_SUBJECT', 'ERREUR: Aucun sujet saisi.');

define('COUPON_NAME', 'Nom du bon');
//  define('COUPON_VALUE', 'Valeur du bon');
define('COUPON_AMOUNT', 'Montant du bon');
define('COUPON_CODE', 'Code du bon');
define('COUPON_STARTDATE', 'Date de début');
define('COUPON_FINISHDATE', 'Date de fin');
define('COUPON_FREE_SHIP', 'Livraison gratuite');
define('COUPON_DESC', 'Description du bon <br />(visible par le client)');
define('COUPON_MIN_ORDER', 'Commande minimum pour utiliser le bon');
define('COUPON_USES_COUPON', 'Utilisation(s) par bon');
define('COUPON_USES_USER', 'Utilisation(s) par client');
define('COUPON_PRODUCTS', 'Liste des produits valides');
define('COUPON_CATEGORIES', 'Liste des catégories valides');
define('VOUCHER_NUMBER_USED', 'Utilisations');
define('DATE_CREATED', 'Date de création');
define('DATE_MODIFIED', 'Date de modification');
define('TEXT_HEADING_NEW_COUPON', 'Créer un nouveau bon');
define('TEXT_NEW_INTRO', 'Veuillez renseigner les informations suivantes pour le nouveau bon.<br />');
define('COUPON_ZONE_RESTRICTION', 'Zone de restriction du bon');
define('TEXT_COUPON_ZONE_RESTRICTION', 'La zone de restriction du bon est facultative.');

define('ERROR_NO_COUPON_AMOUNT', 'Aucun montant pour le bon de saisi');
define('ERROR_NO_COUPON_NAME', 'Aucun nom pour le bon de saisi');
define('ERROR_COUPON_EXISTS', 'Un bon avec le même code existe déjà');


define('COUPON_NAME_HELP', 'Un nom court pour ce bon');
define('COUPON_AMOUNT_HELP', 'La valeur de remise de ce bon, soit fixe, soit suivie du caractère \'%\' pour indiquer un pourcentage.');
define('COUPON_CODE_HELP', 'Vous pouvez indiquer ici votre propre code, ou laisser le champ vide pour que le code soit généré automatiquement.');
define('COUPON_STARTDATE_HELP', 'La date de début de validité du bon');
define('COUPON_FINISHDATE_HELP', 'La date à laquelle le bon expire');
define('COUPON_FREE_SHIP_HELP', 'Le bon donne droit à une LIVRAISON GRATUITE sur une commande. NOTE: Cela outrepasse le chiffre coupon_amount, mais respecte le montant minimum de commande');
define('COUPON_DESC_HELP', 'Une description du bon pour le client');
define('COUPON_MIN_ORDER_HELP', 'Montant minimum de commande pour que le bon soit valide');
define('COUPON_USES_COUPON_HELP', 'Nombre maximum d\'utilisations par bon, laisser vide si vous voulez illimité.');
define('COUPON_USES_USER_HELP', 'Nombre maximum d\'utilisations du bon par le client, laisser vide pour illimité.');
define('COUPON_PRODUCTS_HELP', 'Liste des produits (product_ids) séparés par une virgule avec lesquels ce bon peut être utilisé. Laissez vide si aucune restriction.');
define('COUPON_CATEGORIES_HELP', 'Liste des catégories séparées par une virgule avec lesquelles ce bon peut être utilisé. Laissez vide si aucune restriction.');
define('COUPON_BUTTON_PREVIEW', 'Prévisualiser');
define('COUPON_BUTTON_CONFIRM', 'Confirmer');
define('COUPON_BUTTON_BACK', 'Retour');

define('COUPON_ACTIVE', 'Statut');
define('COUPON_START_DATE', 'Débute');
define('COUPON_EXPIRE_DATE', 'Expire');

define('ERROR_DISCOUNT_COUPON_WELCOME', 'Ce bon de réduction NE PEUT PAS être désactivé. Il s\'agit du bon de réduction de bienvenue<br /><br />Changez le bon de bienvenue avant d\'essayer de le supprimer. Voir Admin->Configuration->GV bons');
define('SUCCESS_COUPON_DISABLED', 'SUCCÉS! Le bon de réduction a été positionné sur inactif ...');
define('TEXT_COUPON_NEW', 'Utiliser le NOUVEAU code de bon de réduction :');
define('ERROR_DISCOUNT_COUPON_DUPLICATE', 'AVERTISSEMENT! Un double du bon existe ... Copie annulé pour le code: ');
define('TEXT_CONFIRM_COPY', 'Êtes-vous sûr(e) de vouloir copier ce bon de réduction vers un autre bon de réduction ?');
define('SUCCESS_COUPON_DUPLICATE', 'SUCCÉS! Le bon de réduction a été reproduit ...<br /><br />Veuillez vérifier le nom et les dates du bon ...');
?>