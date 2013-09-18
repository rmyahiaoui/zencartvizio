<?php
/**
 * @package admin
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: french.php 19537 2011-09-20 17:14:44Z drbyte $
 */
if (!defined('IS_ADMIN_FLAG'))
{
  die('Accès Illégal');
}

// added defines for header alt and text
define('HEADER_ALT_TEXT', 'Admin propulsée par Zen Cart :: L\'Art du E-Commerce');
define('HEADER_LOGO_WIDTH', '200px');
define('HEADER_LOGO_HEIGHT', '70px');
define('HEADER_LOGO_IMAGE', 'logo.gif');

// look in your $PATH_LOCALE/locale directory for available locales..
setlocale(LC_TIME, 'fr_FR');
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'd/m/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('DATE_FORMAT_SPIFFYCAL', 'dd/MM/yyyy');  //Use only 'dd', 'MM' and 'yyyy' here in any order

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function zen_date_raw($date, $reverse = false) {
	if ($reverse) {
		return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
	} else {
		return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// removed for meta tags
// page title
//define('TITLE', 'Zen Cart');

// include template specific meta tags defines
  if (file_exists(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/meta_tags.php')) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . 'meta_tags.php');

// meta tags
define('ICON_METATAGS_ON', 'Balises Meta définies');
define('ICON_METATAGS_OFF', 'Balises Meta non définies');
define('TEXT_LEGEND_META_TAGS', 'Balises Meta définies:');
define('TEXT_INFO_META_TAGS_USAGE', '<strong>NOTE:</strong> Le Site/Tagline est utilisé pour la description de votre site dans le fichier meta_tags.php.');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="fr"');

// charset for web pages and emails
define('CHARSET', 'utf-8');

// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Accueil admin');
define('HEADER_TITLE_SUPPORT_SITE', 'Site de support');
define('HEADER_TITLE_ONLINE_CATALOG', 'Catalogue en ligne');
define('HEADER_TITLE_VERSION', 'Version');
define('HEADER_TITLE_ACCOUNT', 'Compte');
define('HEADER_TITLE_LOGOFF', 'Déconnexion');
//define('HEADER_TITLE_ADMINISTRATION', 'Administration');

// Define the name of your Gift Certificate as Gift Voucher, Gift Certificate, Zen Cart Dollars, etc. here for use through out the shop
define('TEXT_GV_NAME','Chèque cadeau');
define('TEXT_GV_NAMES','Chèques cadeaux');
define('TEXT_DISCOUNT_COUPON', 'Bon de réduction');

// used for redeem code, redemption code, or redemption id
define('TEXT_GV_REDEEM','Code de remboursement');

// text for gender
define('MALE', 'Monsieur');
define('FEMALE', 'Madame');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

// configuration box text
define('BOX_HEADING_CONFIGURATION', 'Configuration');
define('BOX_CONFIGURATION_MY_STORE', 'Ma Boutique');
define('BOX_CONFIGURATION_MINIMUM_VALUES', 'Valeurs Minimum');
define('BOX_CONFIGURATION_MAXIMUM_VALUES', 'Valeurs Maximum');
define('BOX_CONFIGURATION_IMAGES', 'Images');
define('BOX_CONFIGURATION_CUSTOMER_DETAILS', 'Détails Client');
define('BOX_CONFIGURATION_SHIPPING_PACKAGING', 'Livraison / Emballage');
define('BOX_CONFIGURATION_PRODUCT_LISTING', 'Listing page Produit');
define('BOX_CONFIGURATION_STOCK', 'Stock');
define('BOX_CONFIGURATION_LOGGING', 'Connexion');
define('BOX_CONFIGURATION_EMAIL_OPTIONS', 'Options E-Mail');
define('BOX_CONFIGURATION_ATTRIBUTE_OPTIONS', 'Règlages des Attributs');
define('BOX_CONFIGURATION_GZIP_COMPRESSION', 'Compression GZip');
define('BOX_CONFIGURATION_SESSIONS', 'Sessions');
define('BOX_CONFIGURATION_REGULATIONS', 'Règlementation');
define('BOX_CONFIGURATION_GV_COUPONS', 'Chèques Cadeaux / Bons');
define('BOX_CONFIGURATION_CREDIT_CARDS', 'Cartes de Crédit');
define('BOX_CONFIGURATION_PRODUCT_INFO', 'Info Produit');
define('BOX_CONFIGURATION_LAYOUT_SETTINGS', 'Règlages de la Disposition');
define('BOX_CONFIGURATION_WEBSITE_MAINTENANCE', 'Maintenance Site Web');
define('BOX_CONFIGURATION_NEW_LISTING', 'Listing page Nouveautés');
define('BOX_CONFIGURATION_FEATURED_LISTING', 'Listing page Produits Phares');
define('BOX_CONFIGURATION_ALL_LISTING', 'Tous les Listings');
define('BOX_CONFIGURATION_INDEX_LISTING', 'Listing page Index');
define('BOX_CONFIGURATION_DEFINE_PAGE_STATUS', 'Statut des Pages \'Define\'');
define('BOX_CONFIGURATION_EZPAGES_SETTINGS', 'Règlages des EZ-Pages');

// modules box text
define('BOX_HEADING_MODULES', 'Modules');
define('BOX_MODULES_PAYMENT', 'Paiements');
define('BOX_MODULES_SHIPPING', 'Livraison');
define('BOX_MODULES_ORDER_TOTAL', 'Total commande');
define('BOX_MODULES_PRODUCT_TYPES', 'Types de produits');

// categories box text
define('BOX_HEADING_CATALOG', 'Catalogue');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Catégories / Produits');
define('BOX_CATALOG_PRODUCT_TYPES', 'Types de Produits');
define('BOX_CATALOG_CATEGORIES_OPTIONS_NAME_MANAGER', 'Noms des Options');
define('BOX_CATALOG_CATEGORIES_OPTIONS_VALUES_MANAGER', 'Valeur des Options');
define('BOX_CATALOG_MANUFACTURERS', 'Fabricants');
define('BOX_CATALOG_REVIEWS', 'Avis');
define('BOX_CATALOG_SPECIALS', 'Promotions');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'Produits attendus');
define('BOX_CATALOG_SALEMAKER', 'Soldeur');
define('BOX_CATALOG_PRODUCTS_PRICE_MANAGER', 'Prix des Produits');
define('BOX_CATALOG_PRODUCT', 'Produit');
define('BOX_CATALOG_PRODUCTS_TO_CATEGORIES', 'Produits à Catégories');

// customers box text
define('BOX_HEADING_CUSTOMERS', 'Clients');
define('BOX_CUSTOMERS_CUSTOMERS', 'Clients');
define('BOX_CUSTOMERS_ORDERS', 'Commandes');
define('BOX_CUSTOMERS_GROUP_PRICING', 'Groupes de Prix');
define('BOX_CUSTOMERS_PAYPAL', 'PayPal IPN');
define('BOX_CUSTOMERS_INVOICE', 'Facture');
define('BOX_CUSTOMERS_PACKING_SLIP', 'Bordereau');

// taxes box text
define('BOX_HEADING_LOCATION_AND_TAXES', 'Lieux / Taxes');
define('BOX_TAXES_COUNTRIES', 'Pays');
define('BOX_TAXES_ZONES', 'Zones');
define('BOX_TAXES_GEO_ZONES', 'Zones de Taxes');
define('BOX_TAXES_TAX_CLASSES', 'Classes de Taxes');
define('BOX_TAXES_TAX_RATES', 'Taux de Taxes');

// reports box text
define('BOX_HEADING_REPORTS', 'Rapports');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'Produits consultés');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Produits achetés');
define('BOX_REPORTS_ORDERS_TOTAL', 'Total commandé par Client');
define('BOX_REPORTS_PRODUCTS_LOWSTOCK', 'Produits en Stock bas');
define('BOX_REPORTS_CUSTOMERS_REFERRALS', 'Parrainages Clients');

// tools text
define('BOX_HEADING_TOOLS', 'Outils');
define('BOX_TOOLS_TEMPLATE_SELECT', 'Sélection du Template');
define('BOX_TOOLS_BACKUP', 'Sauvegarde de la Base');
define('BOX_TOOLS_BANNER_MANAGER', 'Gestion des Bannières');
define('BOX_TOOLS_CACHE', 'Contrôle du Cache');
define('BOX_TOOLS_DEFINE_LANGUAGE', 'Définir les Langues');
define('BOX_TOOLS_FILE_MANAGER', 'Gestion des Fichiers');
define('BOX_TOOLS_MAIL', 'Envoyer un E-mail');
define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Bulletins et Annonces de Produits');
define('BOX_TOOLS_SERVER_INFO', 'Infos Serveur / Version');
define('BOX_TOOLS_WHOS_ONLINE', 'Qui est en ligne ?');
define('BOX_TOOLS_STORE_MANAGER', 'Gestion de la Boutique');
define('BOX_TOOLS_DEVELOPERS_TOOL_KIT', 'Outils du Développeur');
define('BOX_TOOLS_SQLPATCH','Installer des Patches SQL');
define('BOX_TOOLS_EZPAGES','EZ-Pages');

define('BOX_HEADING_EXTRAS', 'Extras');

// define pages editor files
define('BOX_TOOLS_DEFINE_PAGES_EDITOR','Éditeur des pages \'define\'');
define('BOX_TOOLS_DEFINE_MAIN_PAGE', 'Page principale');
define('BOX_TOOLS_DEFINE_CONTACT_US','Nous contacter');
define('BOX_TOOLS_DEFINE_PRIVACY','Confidentialité');
define('BOX_TOOLS_DEFINE_SHIPPINGINFO','Livraisons & Retours');
define('BOX_TOOLS_DEFINE_CONDITIONS','Conditions générales');
define('BOX_TOOLS_DEFINE_CHECKOUT_SUCCESS','Encaissement réussi');
define('BOX_TOOLS_DEFINE_PAGE_2','Page 2');
define('BOX_TOOLS_DEFINE_PAGE_3','Page 3');
define('BOX_TOOLS_DEFINE_PAGE_4','Page 4');

// localization box text
define('BOX_HEADING_LOCALIZATION', 'Localisation');
define('BOX_LOCALIZATION_CURRENCIES', 'Devises');
define('BOX_LOCALIZATION_LANGUAGES', 'Langues');
define('BOX_LOCALIZATION_ORDERS_STATUS', 'États de Commande');

// gift vouchers box text
define('BOX_HEADING_GV_ADMIN', TEXT_GV_NAMES . '/Bons');
define('BOX_GV_ADMIN_QUEUE', 'Queue des ' . TEXT_GV_NAMES);
define('BOX_GV_ADMIN_MAIL', 'Mail de ' . TEXT_GV_NAME);
define('BOX_GV_ADMIN_SENT', TEXT_GV_NAMES . ' envoyés');
define('BOX_COUPON_ADMIN','Bons de Réductions');
define('BOX_COUPON_RESTRICT','Restrictions des Bons');

// admin access box text
define('BOX_HEADING_ADMIN_ACCESS', 'Accès Administration');
define('BOX_ADMIN_ACCESS_USERS',  'Utilisateurs');
define('BOX_ADMIN_ACCESS_PROFILES', 'Profils Utilisateurs');
define('BOX_ADMIN_ACCESS_PAGE_REGISTRATION', 'Enregistrement de Page Admin');
define('BOX_ADMIN_ACCESS_LOGS', 'Journal d\'activité Admin');

define('IMAGE_RELEASE', 'Remboursez ' . TEXT_GV_NAME);

// javascript messages
define('JS_ERROR', 'Des erreurs sont apparues lors du traitement de votre formulaire !\n Merci de bien vouloir apporter les corrections suivantes :\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* Le nouvel attribut de produit requiert une valeur de prix\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* Le nouvel attribut de produit requiert un préfixe de prix\n');

define('JS_PRODUCTS_NAME', '* Le nouveau produit requiert un nom\n');
define('JS_PRODUCTS_DESCRIPTION', '* Le nouveau produit requiert une description\n');
define('JS_PRODUCTS_PRICE', '* Le nouveau produit requiert une valeur de prix\n');
define('JS_PRODUCTS_WEIGHT', '* Le nouveau produit requiert une valeur de poids\n');
define('JS_PRODUCTS_QUANTITY', '* Le nouveau produit requiert une valeur de quantité\n');
define('JS_PRODUCTS_MODEL', '* Le nouveau produit requiert une valeur de modèle\n');
define('JS_PRODUCTS_IMAGE', '* Le nouveau produit requiert une image\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* Vous devez établir un nouveau prix pour ce produit\n');

define('JS_GENDER', '* Vous devez choisir la valeur de \'Civilité\'.\n');
define('JS_FIRST_NAME', '* Le champ \'Prénom\' doit comporter un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères.\n');
define('JS_LAST_NAME', '* Le champ \'Nom\' doit comporter un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères.\n');
define('JS_DOB', '* Le champ \'Date de naissance\' doit être au format: xx/xx/xxxx (jour/mois/année).\n');
define('JS_EMAIL_ADDRESS', '* Le champ \'Adresse e-mail\' doit comporter un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères.\n');
define('JS_ADDRESS', '* Le champ \'Adresse\' doit comporter un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.\n');
define('JS_POST_CODE', '* Le champ \'Code postal\' doit comporter un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères.\n');
define('JS_CITY', '* Le champ \'Ville\' doit comporter un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caractères.\n');
define('JS_STATE', '** Le champ \'État\' doit être sélectionné.\n');
define('JS_STATE_SELECT', '-- Sélectionnez --');
define('JS_ZONE', '* Le champ \'Zone\' doit être choisi dans la liste des zones pour ce pays.');
define('JS_COUNTRY', '* Le champ \'Pays\' doit être renseigné.\n');
define('JS_TELEPHONE', '* Le champ \'N&deg; de téléphone\' doit comporter un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Commande numéro %s inexistante !');

define('CATEGORY_PERSONAL', 'Personnel');
define('CATEGORY_ADDRESS', 'Adresse');
define('CATEGORY_CONTACT', 'Contact');
define('CATEGORY_COMPANY', 'Société');
define('CATEGORY_OPTIONS', 'Options');

define('ENTRY_GENDER', 'Civilité:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">requis</span>');
define('ENTRY_FIRST_NAME', 'Prénom: ');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères</span>');
define('ENTRY_LAST_NAME', 'Nom:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères</span>');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance: ');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(ex. 24/10/1984)</span>');
define('ENTRY_EMAIL_ADDRESS', 'Adresse E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">Cette adresse e-mail ne semble pas valide !</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Cette adresse e-mail figure déjà dans nos registres !</span>');
define('ENTRY_COMPANY', 'Raison sociale: ');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_PRICING_GROUP', 'Groupe de prix de remise');
define('ENTRY_STREET_ADDRESS', 'Adresse postale:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères</span>');
define('ENTRY_SUBURB', 'Complément:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_POST_CODE', 'Code postal: ');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères</span>');
define('ENTRY_CITY', 'Ville:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_CITY_MIN_LENGTH . ' caractères</span>');
define('ENTRY_STATE', 'État:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">requis</span>');
define('ENTRY_COUNTRY', 'Pays:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_TELEPHONE_NUMBER', 'N&deg; de téléphone: ');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères</span>');
define('ENTRY_FAX_NUMBER', 'N&deg; de fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_NEWSLETTER', 'Bulletin:');
define('ENTRY_NEWSLETTER_YES', 'Souscrite');
define('ENTRY_NEWSLETTER_NO', 'Non souscrite');
define('ENTRY_NEWSLETTER_ERROR', '');

define('ERROR_PASSWORDS_NOT_MATCHING', 'Le mot de passe et sa confirmation doivent correspondre');
define('ENTRY_PASSWORD_CHANGE_ERROR', '<strong>Désolé, votre nouveau mot de passe a été rejeté.</strong><br />');
define('ERROR_PASSWORD_RULES', 'Les mots de passe doivent contenir à la fois des lettres et des chiffres, doivent être composés d\'au moins %s caractères, et doivent être différents des 4 derniers mots de passe utilisés. Les mots de passe expirent tous les 90 jours, après quoi il vous sera demandé de choisir un nouveau mot de passe.');
define('ERROR_TOKEN_EXPIRED_PLEASE_RESUBMIT', 'ERREUR: Désolé, une erreur s\'est produite lors du traitement de vos données. Merci de bien vouloir renvoyer les informations à nouveau.');

// images
//define('IMAGE_ANI_SEND_EMAIL', 'Sending E-Mail');
define('IMAGE_BACK', 'Retour');
define('IMAGE_BACKUP', 'Sauvegarder');
define('IMAGE_CANCEL', 'Annuler');
define('IMAGE_CONFIRM', 'Confirmer');
define('IMAGE_COPY', 'Copier');
define('IMAGE_COPY_TO', 'Copier vers');
define('IMAGE_DETAILS', 'Détails');
define('IMAGE_DELETE', 'Effacer');
define('IMAGE_EDIT', 'Modifier');
define('IMAGE_EMAIL', 'E-mail');
define('IMAGE_GO', 'Go');
define('IMAGE_FILE_MANAGER', 'Gestionnaire des fichiers');
define('IMAGE_ICON_STATUS_GREEN', 'Actif');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Activer');
define('IMAGE_ICON_STATUS_RED', 'Inactif');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'Désactiver');
define('IMAGE_ICON_STATUS_RED_EZPAGES', 'Erreur -- trop d\'URL/types de contenu de saisis');
define('IMAGE_ICON_STATUS_RED_ERROR', 'Erreur');
define('IMAGE_ICON_INFO', 'Info');
define('IMAGE_INSERT', 'Insérer');
define('IMAGE_LOCK', 'Verrouiller');
define('IMAGE_MODULE_INSTALL', 'Installer le module');
define('IMAGE_MODULE_REMOVE', 'Désinstaller le module');
define('IMAGE_MOVE', 'Déplacer');
define('IMAGE_NEW_BANNER', 'Nouvelle Bannière');
define('IMAGE_NEW_CATEGORY', 'Nouvelle Catégorie');
define('IMAGE_NEW_COUNTRY', 'Nouveau Pays');
define('IMAGE_NEW_CURRENCY', 'Nouvelle Devise');
define('IMAGE_NEW_FILE', 'Nouveau Fichier');
define('IMAGE_NEW_FOLDER', 'Nouveau Répertoire');
define('IMAGE_NEW_LANGUAGE', 'Nouvelle Langue');
define('IMAGE_NEW_NEWSLETTER', 'Nouveau Bulletin');
define('IMAGE_NEW_PRODUCT', 'Nouveau Produit');
define('IMAGE_NEW_SALE', 'Nouvelle Vente');
define('IMAGE_NEW_TAX_CLASS', 'Nouvelle Classe de Taxes');
define('IMAGE_NEW_TAX_RATE', 'Nouveau Taux de Taxes');
define('IMAGE_NEW_TAX_ZONE', 'Nouvelle Zone de Taxes');
define('IMAGE_NEW_ZONE', 'Nouvelle Zone');
define('IMAGE_OPTION_NAMES', 'Noms des options');
define('IMAGE_OPTION_VALUES', 'Valeurs des options');
define('IMAGE_ORDERS', 'Commandes');
define('IMAGE_ORDERS_INVOICE', 'Factures');
define('IMAGE_ORDERS_PACKINGSLIP', 'Bordereau');
define('IMAGE_PERMISSIONS', 'Modifier Permissions');
define('IMAGE_PREVIEW', 'Prévisualiser');
define('IMAGE_RESTORE', 'Restaurer');
define('IMAGE_RESET', 'Réinitialiser');
define('IMAGE_SAVE', 'Sauvegarder');
define('IMAGE_SEARCH', 'Chercher');
define('IMAGE_SELECT', 'Sélectionner');
define('IMAGE_SEND', 'Envoyer');
define('IMAGE_SEND_EMAIL', 'Envoyer E-mail');
define('IMAGE_SUBMIT', 'Soumettre');
define('IMAGE_UNLOCK', 'Déverrouiller');
define('IMAGE_UPDATE', 'Actualiser');
define('IMAGE_UPDATE_CURRENCIES', 'Actualiser le taux de change');
define('IMAGE_UPLOAD', 'Uploader');
define('IMAGE_TAX_RATES','Taux de Taxe');
define('IMAGE_DEFINE_ZONES','Définir les zones');
define('IMAGE_PRODUCTS_PRICE_MANAGER', 'Gestion des prix des produits');
define('IMAGE_UPDATE_PRICE_CHANGES', 'Mettre à jour les changements de prix');
define('IMAGE_ADD_BLANK_DISCOUNTS', 'Ajouter ' . DISCOUNT_QTY_ADD . ' remises par quantité à blanc');
define('IMAGE_CHECK_VERSION', 'Vérifier les mises à jour de Zen Cart');
define('IMAGE_PRODUCTS_TO_CATEGORIES', 'Gestionnaire des liens de Catégories Multiples');

define('IMAGE_ICON_STATUS_ON', 'Statut - Activé');
define('IMAGE_ICON_STATUS_OFF', 'Statut - Désactivé');
define('IMAGE_ICON_LINKED', 'Le produit est lié');

define('IMAGE_REMOVE_SPECIAL','Effacer info promotion');
define('IMAGE_REMOVE_FEATURED','Effacer info produit phare');
define('IMAGE_INSTALL_SPECIAL', 'Ajouter info promotion');
define('IMAGE_INSTALL_FEATURED', 'Ajouter info produit phare');

define('ICON_PRODUCTS_PRICE_MANAGER','Gestion des prix des produits');
define('ICON_COPY_TO', 'Copier vers');
define('ICON_CROSS', 'Faux');
define('ICON_CURRENT_FOLDER', 'Répertoire courant');
define('ICON_DELETE', 'Effacer');
define('ICON_EDIT', 'Modifier');
define('ICON_ERROR', 'Erreur');
define('ICON_FILE', 'Fichier');
define('ICON_FILE_DOWNLOAD', 'Downloader');
define('ICON_FOLDER', 'Répertoire');
//define('ICON_LOCKED', 'Verrouillé');
define('ICON_MOVE', 'Déplacer');
define('ICON_PERMISSIONS', 'Permissions');
define('ICON_PREVIOUS_LEVEL', 'Niveau précédent');
define('ICON_PREVIEW', 'Prévisualiser');
define('ICON_RESET', 'Réinitialiser');
define('ICON_STATISTICS', 'Statistiques');
define('ICON_SUCCESS', 'Succès');
define('ICON_TICK', 'Vrai');
//define('ICON_UNLOCKED', 'Déverrouillé');
define('ICON_WARNING', 'Attention');

// constants for use in zen_prev_next_display function
define('TEXT_RESULT_PAGE', 'Page %s sur %d');
define('TEXT_DISPLAY_NUMBER_OF_ADMINS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> admins)');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> bannières)');
define('TEXT_DISPLAY_NUMBER_OF_CATEGORIES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> catégories)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> pays)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> clients)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> devises)');
define('TEXT_DISPLAY_NUMBER_OF_FEATURED', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> produits phares)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> langues)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> fabricants)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> bulletins)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> commandes)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> états de commande)');
define('TEXT_DISPLAY_NUMBER_OF_PRICING_GROUPS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> groupes de prix)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> produits)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCT_TYPES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> types de produits)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> articles attendus)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> avis)');
define('TEXT_DISPLAY_NUMBER_OF_SALES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> soldes)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> promotions)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> classes de taxes)');
define('TEXT_DISPLAY_NUMBER_OF_TEMPLATES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> associations de template)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> zones de taxes)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> taux de taxes)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> zones)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');


define('TEXT_DEFAULT', 'défaut');
define('TEXT_SET_DEFAULT', 'Définir par défaut');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* Requis</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', 'ERREUR: il n\'y a actuellement aucune devise par défaut définie. Veuillez en configurer une dans: Admin Outils->Localisation->Devises');

define('TEXT_CACHE_CATEGORIES', 'Bloc des Catégories');
define('TEXT_CACHE_MANUFACTURERS', 'Bloc des Fabricants');
define('TEXT_CACHE_ALSO_PURCHASED', 'Module Achats Connexes');

define('TEXT_NONE', '--aucun--');
define('TEXT_TOP', '[Racine]');

define('ERROR_DESTINATION_DOES_NOT_EXIST', 'ERREUR: destination inconnue %s');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'ERREUR: destination non inscriptible %s');
define('ERROR_FILE_NOT_SAVED', 'ERREUR: fichier uploadé non sauvegardé.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'ERREUR: Type de fichier uploadé interdit  %s');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'SUCCÈS: fichier uploadé sauvegardé %s');
define('WARNING_NO_FILE_UPLOADED', 'AVERTISSEMENT: Aucun fichier uploadé.');
define('WARNING_FILE_UPLOADS_DISABLED', 'AVERTISSEMENT: L\'upload de fichiers est désactivé dans le fichier de configuration php.ini.');
define('ERROR_ADMIN_SECURITY_WARNING', 'AVERTISSEMENT: Votre connexion Admin n\'est pas sécurisée... Soit vous avez conservé le réglage initial par défaut: Admin admin, soit vous n\'avez pas supprimé ou changé: demo demoonly<br />Le(s) login(s) doivent être changé(s) dès que possible pour la sécurité de votre boutique.');
define('WARNING_DATABASE_VERSION_OUT_OF_DATE','Votre base de données semble avoir besoin d\'une mise à jour. Voir Outils->Infos serveur pour consulter les niveaux de patches.');
define('WARN_DATABASE_VERSION_PROBLEM','Vrai'); //set to false to turn off warnings about database version mismatches
define('WARNING_ADMIN_DOWN_FOR_MAINTENANCE', '<strong>AVERTISSEMENT:</strong> Le site est actuellement arrêté pour maintenance...<br />NOTE: Vous ne pouvez pas tester la plupart des modules de paiement et livraison en mode maintenance');
define('WARNING_BACKUP_CFG_FILES_TO_DELETE', 'AVERTISSEMENT: Ces fichiers devraient être supprimés pour empêcher des failles de sécurité: ');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'AVERTISSEMENT DE SÉCURITÉ: Le répertoire d\'installation existe à: '. DIR_FS_CATALOG. 'zc_install. Veuillez enlever ce répertoire pour des raisons de sécurité.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'AVERTISSEMENT: Votre fichier de configuration: %sincludes/configure.php. C\'est un risque potentiel de sécurité - Veuillez mettre les bonnes permissions utilisateur sur ce fichier (lecture uniquement, CHMOD 644 ou 444). <a href="http://tutorials.zen-cart.com/index.php?article=90" target="_blank">Voir cette FAQ</a>');
define('WARNING_COULD_NOT_LOCATE_LANG_FILE', 'AVERTISSEMENT: Impossible de trouver le fichier de langue: ');
define('ERROR_MODULE_REMOVAL_PROHIBITED', 'ERREUR: Interdiction de supprimer le module: ');
define('WARNING_REVIEW_ROGUE_ACTIVITY', 'ALERTE: Veuillez examiner une probable activité XSS:');

define('_JANUARY', 'Janvier');
define('_FEBRUARY', 'Février');
define('_MARCH', 'Mars');
define('_APRIL', 'Avril');
define('_MAY', 'Mai');
define('_JUNE', 'Juin');
define('_JULY', 'Juillet');
define('_AUGUST', 'Août');
define('_SEPTEMBER', 'Septembre');
define('_OCTOBER', 'Octobre');
define('_NOVEMBER', 'Novembre');
define('_DECEMBER', 'Décembre');

define('TEXT_DISPLAY_NUMBER_OF_GIFT_VOUCHERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> Chèques Cadeaux)');
define('TEXT_DISPLAY_NUMBER_OF_COUPONS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> Bons de Réductions)');

define('TEXT_VALID_PRODUCTS_LIST', 'Listes des produits');
define('TEXT_VALID_PRODUCTS_ID', 'ID des produits');
define('TEXT_VALID_PRODUCTS_NAME', 'Noms des produits');
define('TEXT_VALID_PRODUCTS_MODEL', 'Modèle des produits');

define('TEXT_VALID_CATEGORIES_LIST', 'Liste des catégories');
define('TEXT_VALID_CATEGORIES_ID', 'ID de la catégorie');
define('TEXT_VALID_CATEGORIES_NAME', 'Nom de la catégorie');

define('DEFINE_LANGUAGE','Définir la langue: ');

define('BOX_ENTRY_COUNTER_DATE','Le compteur des hits a débuté le:');
define('BOX_ENTRY_COUNTER','Compteur des hits:');

// not installed
  define('NOT_INSTALLED_TEXT','Non Installé');

// Product Options Values Sort Order - option_values.php
  define('BOX_CATALOG_PRODUCT_OPTIONS_VALUES','Classement des Valeurs des Options ');

  define('TEXT_UPDATE_SORT_ORDERS_OPTIONS','<strong>Mise à jour du classement des attributs à partir des valeurs d\'options par défaut</strong> ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_UPDATES','<strong>Mise à jour des classements des attributs de tous les produits</strong><br />pour correspondre aux classements des valeurs d\'options par défaut:<br />');

// Product Options Name Sort Order - option_values.php
  define('BOX_CATALOG_PRODUCT_OPTIONS_NAME','Classement des Noms des Options');
  
// Attributes only
  define('BOX_CATALOG_CATEGORIES_ATTRIBUTES_CONTROLLER','Contrôleur des Attributs');

// generic model
  define('TEXT_MODEL','Modèle: ');

// column controller
  define('BOX_TOOLS_LAYOUT_CONTROLLER','Contrôleur de la Disposition des Blocs');

// check GV release queue and alert store owner
  define('SHOW_GV_QUEUE',true);
  define('TEXT_SHOW_GV_QUEUE','%s en attente d\'approbation ');
  define('IMAGE_GIFT_QUEUE', TEXT_GV_NAME . ' Queue');
  define('IMAGE_ORDER','Commande');

  define('IMAGE_DISPLAY','Afficher');
  define('IMAGE_UPDATE_SORT','Actualiser le classement');
  define('IMAGE_EDIT_PRODUCT','Modifier un Produit');
  define('IMAGE_EDIT_ATTRIBUTES','Modifier des attributs');
  define('TEXT_NEW_PRODUCT', 'Produit dans la catégorie: &quot;%s&quot;');
  define('IMAGE_OPTIONS_VALUES','Noms et valeurs des Options');
  define('TEXT_PRODUCTS_PRICE_MANAGER','GESTION DU PRIX DES PRODUITS');
  define('TEXT_PRODUCT_EDIT','MODIFIER PRODUIT');
  define('TEXT_ATTRIBUTE_EDIT','MODIFIER ATTRIBUTS');
  define('TEXT_PRODUCT_DETAILS','VOIR DÉTAILS');

// sale maker
  define('DEDUCTION_TYPE_DROPDOWN_0', 'Montant à déduire');
  define('DEDUCTION_TYPE_DROPDOWN_1', 'Pourcentage');
  define('DEDUCTION_TYPE_DROPDOWN_2', 'Nouveau prix');

// Min and Units
  define('PRODUCTS_QUANTITY_MIN_TEXT_LISTING','Min: ');
  define('PRODUCTS_QUANTITY_UNIT_TEXT_LISTING','Unités: ');
  define('PRODUCTS_QUANTITY_IN_CART_LISTING','Dans le panier: ');
  define('PRODUCTS_QUANTITY_ADD_ADDITIONAL_LISTING','Ajouter: ');

  define('TEXT_PRODUCTS_MIX_OFF','*Aucune Option Mix');
  define('TEXT_PRODUCTS_MIX_ON','*Options Mix');

// search filters
  define('TEXT_INFO_SEARCH_DETAIL_FILTER','Filtre de Recherche: ');
  define('HEADING_TITLE_SEARCH_DETAIL','Recherche: ');
  define('HEADING_TITLE_SEARCH_DETAIL_REPORTS', 'Recherche de produit(s) - délimités par des virgules');
  define('HEADING_TITLE_SEARCH_DETAIL_REPORTS_NAME_MODEL', 'Recherche par nom/modèle de produit');

  define('PREV_NEXT_PRODUCT', 'Produits: ');
  define('TEXT_CATEGORIES_STATUS_INFO_OFF', '<span class="alert">*La catégorie est désactivée</span>');
  define('TEXT_PRODUCTS_STATUS_INFO_OFF', '<span class="alert">*Le produit est désactivé</span>');

// admin demo
  define('ADMIN_DEMO_ACTIVE','Démo Admin actuellement activée. Certains réglages seront désactivés');
  define('ADMIN_DEMO_ACTIVE_EXCLUSION','Démo Admin actuellement activée. Certains réglages seront désactivés - <strong>NOTE: outrepassement Admin activée</strong>');
  define('ERROR_ADMIN_DEMO','Démo Admin activée... La fonction que vous demandez est désactivée');

// Version Check notices
  define('TEXT_VERSION_CHECK_NEW_VER','Nouvelle Version disponible v');
  define('TEXT_VERSION_CHECK_NEW_PATCH','Nouveau PATCH disponible: v');
  define('TEXT_VERSION_CHECK_PATCH','patch');
  define('TEXT_VERSION_CHECK_DOWNLOAD','Downloadez ici');
  define('TEXT_VERSION_CHECK_CURRENT','Votre version de Zen Cart&reg; semble être à jour.');

// downloads manager
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_DOWNLOADS_MANAGER', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> downloads)');
define('BOX_CATALOG_CATEGORIES_ATTRIBUTES_DOWNLOADS_MANAGER', 'Gestion des Downloads');

define('BOX_CATALOG_FEATURED','Produits Phares');

define('ERROR_NOTHING_SELECTED', 'Rien n\'était sélectionné... donc aucun changement n\'a été réalisé');
define('TEXT_STATUS_WARNING','<strong>NOTE:</strong> Le statut est activé/désactivé automatiquement lorsque des dates sont définies');

define('TEXT_LEGEND_LINKED', 'Produit lié');
define('TEXT_MASTER_CATEGORIES_ID','Catégorie maître du produit: ');
define('TEXT_LEGEND', 'LÉGENDE: ');
define('TEXT_LEGEND_STATUS_OFF', 'Statut OFF ');
define('TEXT_LEGEND_STATUS_ON', 'Statut ON ');

define('TEXT_INFO_MASTER_CATEGORIES_ID', '<strong>NOTE: La catégorie maître du produit est utilisée pour fixer des prix lorsque<br />la catégorie du produit affecte le prix des produits liés, exemple: Soldes</strong>');
define('TEXT_YES', 'Oui');
define('TEXT_NO', 'Non');

// shipping error messages
define('ERROR_SHIPPING_CONFIGURATION', '<strong>Erreurs dans la configuration de la livraison !</strong>');
define('ERROR_SHIPPING_ORIGIN_ZIP', '<strong>AVERTISSEMENT:</strong> Le code postal de la boutique n\'est pas défini. Voir Configuration | Livraison/Emballage pour le paramètrer.');
define('ERROR_ORDER_WEIGHT_ZERO_STATUS', '<strong>AVERTISSEMENT:</strong> Un poids 0 est défini pour les Livraisons Gratuites, et le module des livraisons gratuites est désactivé.');
define('ERROR_USPS_STATUS', '<strong>AVERTISSEMENT:</strong> Le module de livraison USPS ne peut identifier cet utilisateur et/ou le mot de passe, ou il est en mode TEST au lieu de PRODUCTION et ne fonctionnera pas.<br />Si vous ne pouvez rapatrier les quotations USPS, veuillez contacter USPS pour activer votre compte Web Tools sur leur serveur de production. 1-800-344-7779 or icustomercare@usps.com');

define('ERROR_SHIPPING_MODULES_NOT_DEFINED', 'NOTE: Vous n\'avez aucun module d\'expédition activé. Veuillez aller dans  Modules->Livraisons pour les configurer.');
define('ERROR_PAYMENT_MODULES_NOT_DEFINED', 'NOTE: Vous n\'avez aucun module de paiement activé. Veuillez aller dans Modules->Paiement pour les configurer.');

// text pricing
define('TEXT_CHARGES_WORD','Montant calculé: ');
define('TEXT_PER_WORD','<br />Prix par mot: ');
define('TEXT_WORDS_FREE',' Mot(s) gratuit(s) ');
define('TEXT_CHARGES_LETTERS','Montant calculé: ');
define('TEXT_PER_LETTER','<br />Prix par Lettre: ');
define('TEXT_LETTERS_FREE',' Lettre(s) gratuite(s) ');
define('TEXT_ONETIME_CHARGES','*paiement unique = ');
define('TEXT_ONETIME_CHARGES_EMAIL',"\t" . '*paiement unique = ');
define('TEXT_ATTRIBUTES_QTY_PRICES_HELP', 'Remises avec Options de Quantités');
define('TABLE_ATTRIBUTES_QTY_PRICE_QTY','QTE');
define('TABLE_ATTRIBUTES_QTY_PRICE_PRICE','PRIX');
define('TEXT_ATTRIBUTES_QTY_PRICES_ONETIME_HELP', 'Remises sur quantités d\'options avec paiement unique');
define('TEXT_CATEGORIES_PRODUCTS', 'Sélectionnez une catégorie de produits. Ou naviguez parmi les produits...');
define('TEXT_PRODUCT_TO_VIEW', 'Sélectionnez un produit à consulter puis appuyez sur afficher...');

define('TEXT_INFO_SET_MASTER_CATEGORIES_ID', 'ID de catégorie maître invalide');
define('TEXT_INFO_ID', ' ID# ');
define('TEXT_INFO_SET_MASTER_CATEGORIES_ID_WARNING', '<strong>AVERTISSEMENT:</strong> Ce produit est lié à des catégories multiples mais aucune catégorie maître n\'est définie !');

define('PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT', 'Produit nécessitant un appel pour le prix');
define('PRODUCTS_PRICE_IS_FREE_TEXT','Le produit est gratuit');

define('TEXT_PRODUCT_WEIGHT_UNIT','kgs');

// min, max, units
define('PRODUCTS_QUANTITY_MAX_TEXT_LISTING', 'Max:');

// Discount Savings
define('PRODUCT_PRICE_DISCOUNT_PREFIX','Économie: -');
define('PRODUCT_PRICE_DISCOUNT_PERCENTAGE','%');
define('PRODUCT_PRICE_DISCOUNT_AMOUNT','&nbsp;de remise');
// Sale Maker Sale Price
define('PRODUCT_PRICE_SALE','Soldé:&nbsp;');

// Rich Text / HTML resources
define('TEXT_HTML_EDITOR_NOT_DEFINED','Si aucun éditeur HTML n\'est défini ou que la fonction JavaScript est désactivée, vous pouvez saisir ici du code HTML manuellement.');
define('TEXT_WARNING_HTML_DISABLED','<span class = "main">NOTE: Vous utilisez le format TEXTE seul pour vos e-mails. Si vous souhaitez envoyer vos e-mails en mode HTML, vous devez activer la fonction "Utiliser MIME HTML" dans les Options des E-mails</span>');
define('TEXT_WARNING_CANT_DISPLAY_HTML','<span class = "main">NOTE: Vous utilisez le format TEXTE seul pour vos e-mails. Si vous souhaitez envoyer vos e-mails en mode HTML, vous devez activer la fonction "utiliser MIME HTML" dans les Options des E-mails</span>');
define('TEXT_EMAIL_CLIENT_CANT_DISPLAY_HTML',"Vous voyez ce texte car nous vous avons adressé un mail au format HTML que votre client mail ne peut afficher au format requis.");
define('ENTRY_EMAIL_PREFERENCE','Préférence de format E-mail: ');
define('ENTRY_EMAIL_FORMAT_COMMENTS','Choisir "aucun" ou "désinscrire" désactive TOUS les mails, y compris les détails de commande');
define('ENTRY_EMAIL_HTML_DISPLAY','HTML');
define('ENTRY_EMAIL_TEXT_DISPLAY','Texte-Seul');
define('ENTRY_EMAIL_NONE_DISPLAY','Jamais');
define('ENTRY_EMAIL_OPTOUT_DISPLAY','Désabonnement des Bulletins');
define('ENTRY_NOTHING_TO_SEND','Vous n\'avez saisi aucun texte pour votre message');
define('EMAIL_SEND_FAILED','ERREUR: Échec de l\'envoi E-mail à: "%s" <%s> avec le sujet: "%s".');

  define('EDITOR_NONE', 'Texte plat');
  define('TEXT_EDITOR_INFO', 'Éditeur de texte:');
  define('ERROR_EDITORS_FOLDER_NOT_FOUND', 'Vous avez sélectionné un éditeur HTML dans \'My Store\' mais le dossier  \'/editors/\'  ne peut pas être localisée. Veuillez désactiver votre choix ou installer les fichiers de votre éediteur dans le dossier \''.DIR_WS_CATALOG.'editors/\'');
  define('TEXT_CATEGORIES_PRODUCTS_SORT_ORDER_INFO', 'Ordre d\'affichage des catégories/produits: ');
  define('TEXT_SORT_PRODUCTS_SORT_ORDER_PRODUCTS_NAME', 'Classement par produit, nom de produit');
  define('TEXT_SORT_PRODUCTS_NAME', 'Nom produit');
  define('TEXT_SORT_PRODUCTS_MODEL', 'Modèle produit');
  define('TEXT_SORT_PRODUCTS_QUANTITY', 'Qté+ produit, nom de produit');
  define('TEXT_SORT_PRODUCTS_QUANTITY_DESC', 'Qté- produit, nom de produit');
  define('TEXT_SORT_PRODUCTS_PRICE', 'Prix+ produit, nom de produit');
  define('TEXT_SORT_PRODUCTS_PRICE_DESC', 'Prix- produit, nom de produit');
  define('TEXT_SORT_CATEGORIES_SORT_ORDER_PRODUCTS_NAME', 'Classement par catégorie, nom de catégorie');
  define('TEXT_SORT_CATEGORIES_NAME', 'Nom de catégorie');



  define('TABLE_HEADING_YES','Oui');
  define('TABLE_HEADING_NO','Non');
  define('TEXT_PRODUCTS_IMAGE_MANUAL', '<br /><strong>Ou, choisir un fichier image existant à partir du serveur, nom du fichier :</strong>');
  define('TEXT_IMAGES_OVERWRITE', '<br /><strong>Écraser la photo existante sur le serveur ?</strong>');
  define('TEXT_IMAGE_OVERWRITE_WARNING','AVERTISSEMENT: LE NOM DE FICHIER a été actualisé mais pas écrasé ');
  define('TEXT_IMAGES_DELETE', '<strong>Enlever l\'image ?</strong><br />NOTE: Enlève l\'image au produit, l\'image n\'est pas supprimée du serveur');
  define('TEXT_IMAGE_CURRENT', 'Nom de l\'image: ');

  define('ERROR_DEFINE_OPTION_NAMES', 'AVERTISSEMENT: Aucun nom d\'option défini');
  define('ERROR_DEFINE_OPTION_VALUES', 'AVERTISSEMENT: Aucune valeur d\'option définie');
  define('ERROR_DEFINE_PRODUCTS', 'AVERTISSEMENT: Aucun produit défini');
  define('ERROR_DEFINE_PRODUCTS_MASTER_CATEGORIES_ID', 'AVERTISSEMENT: Aucun ID de catégorie maître n\'a été défini pour ce produit');

  define('BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_ON','Ajouter en incluant les Sous-Catégories');
  define('BUTTON_ADD_PRODUCT_TYPES_SUBCATEGORIES_OFF','Ajouter en excluant les Sous-Catégories');

  define('BUTTON_PREVIOUS_ALT','Produit Précédent');
  define('BUTTON_NEXT_ALT','Produit Suivant');

  define('BUTTON_PRODUCTS_TO_CATEGORIES', 'Gestionnaire de Liens vers de multiples Catégories');
  define('BUTTON_PRODUCTS_TO_CATEGORIES_ALT', 'Copier un Produit vers de multiples Catégories');

  define('TEXT_INFO_OPTION_NAMES_VALUES_COPIER_STATUS', 'Toutes les manipulations globales: copier, ajouter et effacer, sont actuellement sur OFF');
  define('TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_ON', 'Affichage des manipulations globales - ON');
  define('TEXT_SHOW_OPTION_NAMES_VALUES_COPIER_OFF', 'Affichage des manipulations globales - OFF');

// moved from categories and all product type language files
  define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'ERREUR: Impossible de lier des produits dans la même catégorie.');
  define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'ERREUR: Impossible d\'écrire dans le répertoire des images: ' . DIR_FS_CATALOG_IMAGES);
  define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'ERREUR: Le répertoire des images est inexistant: ' . DIR_FS_CATALOG_IMAGES);
  define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'ERREUR: Impossible de déplacer la catégorie en sous-catégorie ');
  define('ERROR_CANNOT_MOVE_PRODUCT_TO_CATEGORY_SELF', 'ERREUR: Impossible de déplacer le produit dans la même catégorie ou dans une catégorie où il existe déjà');
  define('ERROR_CATEGORY_HAS_PRODUCTS', 'ERREUR: La catégorie a des produits!<br /><br />Bien que cela peut être fait temporairement pour construire vos catégories ... les catégories ne peuvent contenir que des produits ou d\'autres catégories mais jamais les deux!');
  define('SUCCESS_CATEGORY_MOVED', 'SUCCÈS! La catégorie a été déplacée avec succès ...');
  define('ERROR_CANNOT_MOVE_CATEGORY_TO_CATEGORY_SELF', 'ERREUR: Impossible de déplacer la catégorie vers la même catégorie ! ID#');

// EZ-PAGES Alerts
  define('TEXT_EZPAGES_STATUS_HEADER_ADMIN', 'AVERTISSEMENT: EZ-PAGES HEADER - ON pour l\'IP Admin uniquement');
  define('TEXT_EZPAGES_STATUS_FOOTER_ADMIN', 'AVERTISSEMENT: EZ-PAGES FOOTER - ON pour l\'IP Admin uniquement');
  define('TEXT_EZPAGES_STATUS_SIDEBOX_ADMIN', 'AVERTISSEMENT: EZ-PAGES SIDEBOX - ON pour l\'IP Admin uniquement');

// moved from product types
// warnings on Virtual and Always Free Shipping
  define('TEXT_VIRTUAL_PREVIEW','AVERTISSEMENT: Ce produit est marqué - Livraison gratuite et sans adresse de livraison<br />Aucune adresse de livraison ne sera demandée lorsque tous les produits commandés sont des produits virtuels');
  define('TEXT_VIRTUAL_EDIT','AVERTISSEMENT: Ce produit est marqué - Livraison gratuite et sans adresse de livraison<br />Aucune adresse de livraison ne sera demandée lorsque tous les produits commandés sont des produits virtuels');
  define('TEXT_FREE_SHIPPING_PREVIEW','AVERTISSEMENT: ce produit est marqué - Livraison gratuite, adresse de livraison requise<br />Le module freeshipper est nécessaire lorsque tous les produits de la commande sont des produits livrables gratuitement');
  define('TEXT_FREE_SHIPPING_EDIT','AVERTISSEMENT: Oui fait passer le produit en - Livraison gratuite, adresse de livraison requise<br />Le module freeshipper est nécessaire lorsque tous les produits de la commande sont des produits livrables gratuitement');

// admin activity log warnings
  define('WARNING_ADMIN_ACTIVITY_LOG_DATE', 'AVERTISSEMENT: La table journal d\'activité Admin possède des enregistrements vieux de plus de 2 mois et devrait être archivée pour libérer de la place... ');
  define('WARNING_ADMIN_ACTIVITY_LOG_RECORDS', 'AVERTISSEMENT: La table journal d\'activité Admin possède plus de 50.000 enregistrements et devrait être archivée pour libérer de la place... ');
  define('RESET_ADMIN_ACTIVITY_LOG', 'Vous pouvez visualiser et archiver les détails d\'activité Admin via le menu Gestion Accès Admin, si vous avez les permissions adéquates.');

  define('CATEGORY_HAS_SUBCATEGORIES', 'NOTE: La catégorie a des sous-catégories<br />Impossible d\'ajouter des produits');
  
  define('WARNING_WELCOME_DISCOUNT_COUPON_EXPIRES_IN', 'ATTENTION! Le bon de réduction du mail de bienvenue expire dans %s jours');

define('WARNING_ADMIN_FOLDERNAME_VULNERABLE', 'AVERTISSEMENT: <a href="http://tutorials.zen-cart.com/index.php?article=33" target="_blank">Le nom de votre répertoire /admin/ devrait être renommé en quelque chose de moins commun</a>, pour empêcher des accès non autorisés.');
define('WARNING_EMAIL_SYSTEM_DISABLED', 'AVERTISSEMENT: Le sous-système e-mail est arrêté. Aucun e-mail ne sera envoyé tant qu\'il ne sera pas redémarré dans Admin-&gt;Configuration-&gt;E-mail Options.');
define('TEXT_CURRENT_VER_IS', 'Vous utilisez actuellement: ');
define('ERROR_NO_DATA_TO_SAVE', 'ERREUR: Les données que vous avez envoyées étaient vides. VOS MODIFICATIONS N\'ONT *PAS* ÉTÉ ENREGISTRÉES. Vous devez avoir un problème avec votre navigateur ou votre connexion internet.');
define('TEXT_HIDDEN', 'Caché');
define('TEXT_VISIBLE', 'Visible');
define('TEXT_HIDE', 'Cacher');
define('TEXT_EMAIL', 'E-mail');
define('TEXT_NOEMAIL', 'Pas d\'e-mail');

define('BOX_HEADING_PRODUCT_TYPES', 'Types de produit');

///////////////////////////////////////////////////////////
// include additional files:
  require(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . FILENAME_EMAIL_EXTRAS);
  include(zen_get_file_directory(DIR_FS_CATALOG_LANGUAGES . $_SESSION['language'] . '/', FILENAME_OTHER_IMAGES_NAMES, 'false'));

?>