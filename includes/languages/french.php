<?php
/**
 * @package languageDefines
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: french.php 19690 2011-10-04 16:41:45Z drbyte $
 */

// FOLLOWING WERE moved to meta_tags.php
//define('TITLE', 'Zen Cart!');
//define('SITE_TAGLINE', 'The Art of E-commerce');
//define('CUSTOM_KEYWORDS', 'ecommerce, open source, shop, online shopping');
// END: moved to meta_tags.php

//  define('FOOTER_TEXT_BODY', 'Copyright &copy; ' . date('Y') . ' <a href="' . zen_href_link(FILENAME_DEFAULT) . '" target="_blank">' . STORE_NAME . '</a>. Powered by <a href="http://www.zen-cart.com" target="_blank">Zen Cart</a>. Traduction française &copy; <a href="http://www.moduloom.t15.org" target="_blank">Moduloom</a>.');
  define('FOOTER_TEXT_BODY', 'Copyright &copy; ' . date('Y') . "
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <left>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=images/collissimo.png height=60>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src=images/paiement230.jpg height=60>
  </left>");

// look in your $PATH_LOCALE/locale directory for available locales..
  @setlocale(LC_TIME, 'fr_FR');
  define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
  define('DATE_FORMAT_LONG', '%A %d %B %Y'); // this is used for strftime()
  define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
  define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
  if (!function_exists('zen_date_raw')) {
    function zen_date_raw($date, $reverse = false) {
      if ($reverse) {
        return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
      } else {
        return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
      }
    }
  }

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
  define('LANGUAGE_CURRENCY', 'EUR');

// Global entries for the <html> tag
  define('HTML_PARAMS','dir="ltr" lang="fr"');

// charset for web pages and emails
  define('CHARSET', 'utf-8');

// footer text in includes/footer.php
  define('FOOTER_TEXT_REQUESTS_SINCE', 'requêtes depuis');

// Define the name of your Gift Certificate as Gift Voucher, Gift Certificate, Zen Cart Dollars, etc. here for use through out the shop
  define('TEXT_GV_NAME','chèque cadeau');
  define('TEXT_GV_NAMES','chèques cadeaux');

// used for redeem code, redemption code, or redemption id
  define('TEXT_GV_REDEEM','Code de remboursement');

// used for redeem code sidebox
  define('BOX_HEADING_GV_REDEEM', TEXT_GV_NAME);
  define('BOX_GV_REDEEM_INFO', 'Code de remboursement: ');

// text for gender
  define('MALE', 'Mr.');
  define('FEMALE', 'Mme.');
  define('MALE_ADDRESS', 'Mr.');
  define('FEMALE_ADDRESS', 'Mme.');

// text for date of birth example
  define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

//text for sidebox heading links
  define('BOX_HEADING_LINKS', '&nbsp;&nbsp;[+]');

// categories box text in sideboxes/categories.php
  define('BOX_HEADING_CATEGORIES', 'Catégories');

// manufacturers box text in sideboxes/manufacturers.php
  define('BOX_HEADING_MANUFACTURERS', 'Fabricants');

// whats_new box text in sideboxes/whats_new.php
  define('BOX_HEADING_WHATS_NEW', 'Nouveautés');
  define('CATEGORIES_BOX_HEADING_WHATS_NEW', 'Nouveautés ...');

  define('BOX_HEADING_FEATURED_PRODUCTS', 'En Vedette');
  define('CATEGORIES_BOX_HEADING_FEATURED_PRODUCTS', 'Produits phares ...');
  define('TEXT_NO_FEATURED_PRODUCTS', 'Plus de produits phares seront ajoutés bientôt. Merci de revenir ultérieurement.');

  define('TEXT_NO_ALL_PRODUCTS', 'Plus de produits seront ajoutés bientôt. Merci de revenir ultérieurement.');
  define('CATEGORIES_BOX_HEADING_PRODUCTS_ALL', 'Tous les produits ...');

// quick_find box text in sideboxes/quick_find.php
  define('BOX_HEADING_SEARCH', 'Recherche');
  define('BOX_SEARCH_ADVANCED_SEARCH', 'Recherche avancée');

// specials box text in sideboxes/specials.php
  define('BOX_HEADING_SPECIALS', 'Promotions');
  define('CATEGORIES_BOX_HEADING_SPECIALS','Promotions ...');

// reviews box text in sideboxes/reviews.php
  define('BOX_HEADING_REVIEWS', 'Avis');
  define('BOX_REVIEWS_WRITE_REVIEW', 'Écrire un avis sur ce produit.');
  define('BOX_REVIEWS_NO_REVIEWS', 'Il n\'y a actuellement aucun avis sur ce produit.');
  define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s sur 5 étoiles!');

// shopping_cart box text in sideboxes/shopping_cart.php
  define('BOX_HEADING_SHOPPING_CART', 'Mon Panier');
  define('BOX_SHOPPING_CART_EMPTY', 'Votre panier est vide.');
  define('BOX_SHOPPING_CART_DIVIDER', 'ea.-&nbsp;');

// order_history box text in sideboxes/order_history.php
  define('BOX_HEADING_CUSTOMER_ORDERS', 'Re-commande Rapide');

// best_sellers box text in sideboxes/best_sellers.php
  define('BOX_HEADING_BESTSELLERS', 'Meilleures Ventes');
  define('BOX_HEADING_BESTSELLERS_IN', 'Les meilleures ventes dans<br />&nbsp;&nbsp;');

// notifications box text in sideboxes/products_notifications.php
  define('BOX_HEADING_NOTIFICATIONS', 'Notifications');
  define('BOX_NOTIFICATIONS_NOTIFY', 'Informez moi des mises à jour de <strong>%s</strong>');
  define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', 'Ne plus m\'informer des mises à jour de <strong>%s</strong>');

// manufacturer box text
  define('BOX_HEADING_MANUFACTURER_INFO', 'Infos Fabricant');
  define('BOX_MANUFACTURER_INFO_HOMEPAGE', 'Site de %s');
  define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', 'Autres Produits');

// languages box text in sideboxes/languages.php
  define('BOX_HEADING_LANGUAGES', 'Langues');

// currencies box text in sideboxes/currencies.php
  define('BOX_HEADING_CURRENCIES', 'Devises');

// information box text in sideboxes/information.php
  define('BOX_HEADING_INFORMATION', 'Informations');
  define('BOX_INFORMATION_PRIVACY', 'Confidentialité');
  define('BOX_INFORMATION_CONDITIONS', 'Conditions générales');
  define('BOX_INFORMATION_SHIPPING', 'Livraisons &amp; retours');
  define('BOX_INFORMATION_CONTACT', 'Nous contacter');
  define('BOX_BBINDEX', 'Forum');
  define('BOX_INFORMATION_UNSUBSCRIBE', 'Désabonnement au bulletin');

  define('BOX_INFORMATION_SITE_MAP', 'Plan du site');

// information box text in sideboxes/more_information.php - were TUTORIAL_
  define('BOX_HEADING_MORE_INFORMATION', 'En savoir plus');
  define('BOX_INFORMATION_PAGE_2', 'Page 2');
  define('BOX_INFORMATION_PAGE_3', 'Page 3');
  define('BOX_INFORMATION_PAGE_4', 'Page 4');

//New billing address text
  define('SET_AS_PRIMARY' , 'Établir en tant qu\'adresse principale');
  define('NEW_ADDRESS_TITLE', 'Adresse de facturation');

// javascript messages
  define('JS_ERROR', 'Des erreurs se sont produites pendant la validation de votre formulaire.\n\nMerci de rectifier les points suivants :\n\n');

  define('JS_REVIEW_TEXT', '* Veuillez ajouter quelques mots à vos commentaires. L\'avis doit comporter un minimum de ' . REVIEW_TEXT_MIN_LENGTH . ' caractères.');
  define('JS_REVIEW_RATING', '* Veuillez attribuer une note à cet article.');

  define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Veuillez choisir une méthode de paiement pour votre commande.');

  define('JS_ERROR_SUBMITTED', 'Ce formulaire a déjà été envoyée. Veuillez cliquer sur OK et attendre la fin du traitement en cours.');

  define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Veuillez choisir une méthode de paiement pour votre commande.');
  define('ERROR_CONDITIONS_NOT_ACCEPTED', 'Veuillez confirmer votre acceptation de nos conditions générales liées à cette commande en cochant la case ci-dessous.');
  define('ERROR_PRIVACY_STATEMENT_NOT_ACCEPTED', 'Veuillez confirmer votre acceptation de nos dispositions concernant la confidentialité en cochant la case ci-dessous.');

  define('CATEGORY_COMPANY', 'Détails entreprise');
  define('CATEGORY_PERSONAL', 'Vos informations personnelles');
  define('CATEGORY_ADDRESS', 'Votre adresse');
  define('CATEGORY_CONTACT', 'Vos coordonnées');
  define('CATEGORY_OPTIONS', 'Options');
  define('CATEGORY_PASSWORD', 'Votre mot de passe');
  define('CATEGORY_LOGIN', 'Identifiant');
  define('PULL_DOWN_DEFAULT', 'Veuillez choisir votre pays');
  define('PLEASE_SELECT', 'Veuillez choisir ...');
  define('TYPE_BELOW', 'Entrer un choix ci-dessous ...');

  define('ENTRY_COMPANY', 'Raison sociale: ');
  define('ENTRY_COMPANY_ERROR', 'Veuillez entrer le nom de votre société.');
  define('ENTRY_COMPANY_TEXT', '');
  define('ENTRY_GENDER', 'Civilité: ');
  define('ENTRY_GENDER_ERROR', 'Veuillez choisir une civilité.');
  define('ENTRY_GENDER_TEXT', '*');
  define('ENTRY_FIRST_NAME', 'Prénom: ');
  define('ENTRY_FIRST_NAME_ERROR', 'Votre prénom doit comporter un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères. Veuillez rectifier et réessayer.');
  define('ENTRY_FIRST_NAME_TEXT', '*');
  define('ENTRY_LAST_NAME', 'Nom: ');
  define('ENTRY_LAST_NAME_ERROR', 'Votre nom doit comporter un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères. Veuillez rectifier et réessayer.');
  define('ENTRY_LAST_NAME_TEXT', '*');
  define('ENTRY_DATE_OF_BIRTH', 'Date de naissance: ');
  define('ENTRY_DATE_OF_BIRTH_ERROR', 'Votre date de naissance doit être au format suivant: JJ/MM/AAAA (ex: 21/05/1970)');
  define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex: 21/05/1970)');
  define('ENTRY_EMAIL_ADDRESS', 'Adresse e-mail: ');
  define('ENTRY_EMAIL_ADDRESS_ERROR', 'Votre adresse e-mail doit contenir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères. Veuillez rectifier et réessayer.');
  define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Votre adresse e-mail ne semble pas valide. Veuillez corriger et réessayer.');
  define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Votre adresse e-mail est déjà présente dans notre base de données - Veuillez vous connecter avec cette adresse e-mail ou créer un compte différent avec une autre adresse.');
  define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
  define('ENTRY_NICK', 'Pseudo pour le forum: ');
  define('ENTRY_NICK_TEXT', '*'); // note to display beside nickname input field
  define('ENTRY_NICK_DUPLICATE_ERROR', 'Ce pseudo est déjà utilisé ! Veuillez en choisir un autre.');
  define('ENTRY_NICK_LENGTH_ERROR', 'Le pseudo doit contenir un minimum de ' . ENTRY_NICK_MIN_LENGTH . ' caractères. Veuillez rectifier.');
  define('ENTRY_STREET_ADDRESS', 'Adresse: ');
  define('ENTRY_STREET_ADDRESS_ERROR', 'Votre adresse doit contenir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.');
  define('ENTRY_STREET_ADDRESS_TEXT', '*');
  define('ENTRY_SUBURB', 'Adresse (complément): ');
  define('ENTRY_SUBURB_ERROR', '');
  define('ENTRY_SUBURB_TEXT', '');
  define('ENTRY_POST_CODE', 'Code postal: ');
  define('ENTRY_POST_CODE_ERROR', 'Votre code postal doit contenir un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères.');
  define('ENTRY_POST_CODE_TEXT', '*');
  define('ENTRY_CITY', 'Ville: ');
  define('ENTRY_CUSTOMERS_REFERRAL', 'Code de parrainage:');

  define('ENTRY_CITY_ERROR', 'Votre ville doit contenir un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caractères.');
  define('ENTRY_CITY_TEXT', '*');
  define('ENTRY_STATE', 'Région/Département: ');
  define('ENTRY_STATE_ERROR', 'Le champ région/département doit contenir un minimum de ' . ENTRY_STATE_MIN_LENGTH . ' caractères.');
  define('ENTRY_STATE_ERROR_SELECT', 'Merci de renseigner le champ région/département.');
  define('ENTRY_STATE_TEXT', '*');
  define('JS_STATE_SELECT', '-- Veuillez choisir --');
  define('ENTRY_COUNTRY', 'Pays: ');
  define('ENTRY_COUNTRY_ERROR', 'Vous devez sélectionner un pays dans la liste déroulante.');
  define('ENTRY_COUNTRY_TEXT', '*');
  define('ENTRY_TELEPHONE_NUMBER', 'Téléphone: ');
  define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Votre numéro de téléphone doit contenir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.');
  define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
  define('ENTRY_FAX_NUMBER', 'Fax: ');
  define('ENTRY_FAX_NUMBER_ERROR', '');
  define('ENTRY_FAX_NUMBER_TEXT', '');
  define('ENTRY_NEWSLETTER', 'S\'abonner à notre bulletin: ');
  define('ENTRY_NEWSLETTER_TEXT', '');
  define('ENTRY_NEWSLETTER_YES', 'Abonné(e)');
  define('ENTRY_NEWSLETTER_NO', 'Non abonné(e)');
  define('ENTRY_NEWSLETTER_ERROR', '');
  define('ENTRY_PASSWORD', 'Mot de passe: ');
  define('ENTRY_PASSWORD_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
  define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Le mot de passe et sa confirmation doivent être identiques.');
  define('ENTRY_PASSWORD_TEXT', '* (' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères au minimum)');
  define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmation du mot de passe: ');
  define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
  define('ENTRY_PASSWORD_CURRENT', 'Mot de passe en cours: ');
  define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
  define('ENTRY_PASSWORD_CURRENT_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
  define('ENTRY_PASSWORD_NEW', 'Nouveau mot de passe: ');
  define('ENTRY_PASSWORD_NEW_TEXT', '*');
  define('ENTRY_PASSWORD_NEW_ERROR', 'Votre nouveau mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
  define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Le mot de passe et sa confirmation doivent être identiques.');
  define('PASSWORD_HIDDEN', '-- CACHE --');

  define('FORM_REQUIRED_INFORMATION', '* Obligatoire');
  define('ENTRY_REQUIRED_SYMBOL', '*');

  // constants for use in zen_prev_next_display function
  define('TEXT_RESULT_PAGE', '');
  define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> articles)');
  define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> commandes)');
  define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> avis)');
  define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> nouveautés)');
  define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Affiche <b>%d</b> à <b>%d</b> (sur <b>%d</b> promotions)');
  define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_FEATURED_PRODUCTS', 'Affiche <strong>%d</strong> à <strong>%d</strong> (sur <strong>%d</strong> produits phares)');
  define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_ALL', 'Affiche <strong>%d</strong> à <strong>%d</strong> (sur <strong>%d</strong> produits)');

  define('PREVNEXT_TITLE_FIRST_PAGE', 'Première page');
  define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Page précédente');
  define('PREVNEXT_TITLE_NEXT_PAGE', 'Page suivante');
  define('PREVNEXT_TITLE_LAST_PAGE', 'Dernière page');
  define('PREVNEXT_TITLE_PAGE_NO', 'Page %d');
  define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', 'Ensemble précédent de %d pages');
  define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', 'Ensemble suivant de %d pages');
  define('PREVNEXT_BUTTON_FIRST', '&lt;&lt;PREMIER');
  define('PREVNEXT_BUTTON_PREV', '[&lt;&lt;&nbsp;Préc]');
  define('PREVNEXT_BUTTON_NEXT', '[Suiv&nbsp;&gt;&gt;]');
  define('PREVNEXT_BUTTON_LAST', 'DERNIER&gt;&gt;');

  define('TEXT_BASE_PRICE','À partir de: ');

  define('TEXT_CLICK_TO_ENLARGE', 'Agrandir l&#39;image'); // guillemet simple droit dans du javascript

  define('TEXT_SORT_PRODUCTS', 'Classer les produits ');
  define('TEXT_DESCENDINGLY', 'Ordre descendant');
  define('TEXT_ASCENDINGLY', 'Ordre ascendant');
  define('TEXT_BY', ' par ');

  define('TEXT_REVIEW_BY', 'par %s');
  define('TEXT_REVIEW_WORD_COUNT', '%s mots');
  define('TEXT_REVIEW_RATING', 'Score: %s [%s]');
  define('TEXT_REVIEW_DATE_ADDED', 'Date de création: %s');
  define('TEXT_NO_REVIEWS', 'Il n\'y a actuellement aucun avis.');

  define('TEXT_NO_NEW_PRODUCTS', 'De nouveaux produits seront bientôt ajoutés. Nous vous invitons donc à consulter cette page régulièrement.');

  define('TEXT_UNKNOWN_TAX_RATE', 'Taux de taxes inconnu');

  define('TEXT_REQUIRED', '<span class="errorText">Obligatoire</span>');

  define('WARNING_INSTALL_DIRECTORY_EXISTS', 'AVERTISSEMENT DE SÉCURITÉ: Le répertoire d\'installation: %s existe encore. Merci de supprimer ce répertoire pour des raisons de sécurité.');
  define('WARNING_CONFIG_FILE_WRITEABLE', 'AVERTISSEMENT: Il est possible d\'écrire dans le fichier de configuration: %s. C\'est un risque potentiel de sécurité - Indiquez les bonnes permissions sur ce fichier ! (CHMOD 644 ou 444, ou sur Windows, décochez l\'option "écriture", ou cochez la case lecture seule). Vous devrez peut-être utiliser votre panneau de contrôle/gestionnaire de fichiers ou FTP pour changer les permissions efficacement. Contactez votre hébergeur pour de l\'aide. <a href="http://tutorials.zen-cart.com/index.php?article=90" target="_blank">Voir cette FAQ</a>');
  define('ERROR_FILE_NOT_REMOVEABLE', 'ERREUR: Le fichier spécifié n\'a pas pu être supprimé. Cela est dû à la limitation de la configuration des permissions sur le serveur, vous pouvez essayer de le supprimer par FTP.');
  define('WARNING_SESSION_AUTO_START', 'AVERTISSEMENT: session.auto_start est activé - Veuillez désactiver cette fonctionnalité dans php.ini et redémarrer le serveur web.');
  define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'AVERTISSEMENT: Le répertoire des produits téléchargables n\'existe pas: ' . DIR_FS_DOWNLOAD . '. Le téléchargement des produits ne fonctionnera qu\'avec un répertoire valide.');
  define('WARNING_SQL_CACHE_DIRECTORY_NON_EXISTENT', 'AVERTISSEMENT: Le répertoire de cache SQL est inexistant: ' . DIR_FS_SQL_CACHE . '. Le cache SQL ne fonctionnera pas tant que ce répertoire n\'aura pas été créé.');
  define('WARNING_SQL_CACHE_DIRECTORY_NOT_WRITEABLE', 'AVERTISSEMENT: Il est impossible d\'écrire dans le répertoire de cache SQL: ' . DIR_FS_SQL_CACHE . '. Le cache SQL ne fonctionnera pas tant que les bonnes permissions utilisateur n\'auront pas été positionnées.');
  define('WARNING_DATABASE_VERSION_OUT_OF_DATE', 'Votre base de données semble avoir besoin d\'une mise à jour. Voir Admin->Tools->Server Information pour connaître le niveau de patch.');
  define('WARNING_COULD_NOT_LOCATE_LANG_FILE', 'AVERTISSEMENT: Impossible de localiser le fichier de langue: ');

  define('TEXT_CCVAL_ERROR_INVALID_DATE', 'La date d\'expiration saisie pour la carte de crédit est invalide. Veuillez corriger et recommencer.');
  define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Le numéro de carte de crédit saisi est invalide. Veuillez corriger et recommencer.');
  define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Le numéro de carte de crédit commençant par %s n\'a pas été saisi correctement, ou nous n\'acceptons pas ce type de carte. Veuillez réessayer ou utiliser une autre carte de crédit.');

  define('BOX_INFORMATION_DISCOUNT_COUPONS', 'Bons de réduction');
  define('BOX_INFORMATION_GV', 'FAQ ' . TEXT_GV_NAMES);
  define('VOUCHER_BALANCE', 'Solde ' . TEXT_GV_NAME);
  define('BOX_HEADING_GIFT_VOUCHER', 'Compte ' . TEXT_GV_NAME);
  define('GV_FAQ', 'FAQ ' . TEXT_GV_NAMES);
  define('ERROR_REDEEMED_AMOUNT', 'Félicitations, vous avez été remboursé(e)');
  define('ERROR_NO_REDEEM_CODE', 'Vous n\'avez pas entré un ' . TEXT_GV_REDEEM);
  define('ERROR_NO_INVALID_REDEEM_GV', TEXT_GV_REDEEM . ' ' . TEXT_GV_NAME . ' n\'est pas valide');
  define('TABLE_HEADING_CREDIT', 'Crédits disponibles');
  define('GV_HAS_VOUCHERA', 'Votre compte ' . TEXT_GV_NAME . ' dispose de fonds. Vous pouvez <br />
                         envoyer tout ou une partie de cette somme par <a class="pageResults" href="');

  define('GV_HAS_VOUCHERB', '"><strong>e-mail</strong></a> à la personne de votre choix');
  define('ENTRY_AMOUNT_CHECK_ERROR', 'Vous n\'avez pas assez de fonds disponibles pour pouvoir envoyer ce montant.');
  define('BOX_SEND_TO_FRIEND', 'Envoyer un ' . TEXT_GV_NAME);

  define('VOUCHER_REDEEMED',  TEXT_GV_NAME . ' remboursé');
  define('CART_COUPON', 'Bon: ');
  define('CART_COUPON_INFO', 'En savoir plus');
  define('TEXT_SEND_OR_SPEND','Vous avez un solde disponible sur votre compte ' . TEXT_GV_NAME . '. Vous pouvez le dépenser ou l\'envoyer à quelqu\'un. Pour l\'envoyer, cliquez sur le bouton ci-dessous.');
  define('TEXT_BALANCE_IS', 'Votre solde ' . TEXT_GV_NAME . ' est de: ');
  define('TEXT_AVAILABLE_BALANCE', 'Votre compte ' . TEXT_GV_NAME);

// payment method is GV/Discount
  define('PAYMENT_METHOD_GV', 'Chèque cadeau/Bon');
  define('PAYMENT_MODULE_GV', 'CC/BR'); //??

  define('TABLE_HEADING_CREDIT_PAYMENT', 'Crédits disponibles');

  define('TEXT_INVALID_REDEEM_COUPON', 'Code de réduction invalide');
  define('TEXT_INVALID_REDEEM_COUPON_MINIMUM', 'Vous devez dépenser au moins %s pour utiliser ce bon');
   define('TEXT_INVALID_STARTDATE_COUPON', 'Ce bon n\'est pas encore disponible');
  define('TEXT_INVALID_FINISHDATE_COUPON', 'Ce bon a expiré');
  define('EXT_INVALID_USES_COUPON', 'Ce bon peut uniquement être utilisé ');
  define('TIMES', ' fois.');
  define('TIME', ' fois.');
  define('TEXT_INVALID_USES_USER_COUPON', 'Vous avez utilisé ce code de réduction: %s le nombre maximum de fois autorisé par client.');
  define('REDEEMED_COUPON', 'un bon de réduction d\'une valeur de ');
  define('REDEEMED_MIN_ORDER', 'sur des commandes d\'un montant supérieur à ');
  define('REDEEMED_RESTRICTIONS', ' [Des restrictions de catégorie/produit s\'appliquent]');
  define('TEXT_ERROR', 'Une erreur est survenue');
  define('TEXT_INVALID_COUPON_PRODUCT', 'Ce code de réduction n\'est valable pour aucun des produits qui se trouvent actuellement dans votre panier.');
  define('TEXT_VALID_COUPON', 'Félicitations vous avez remboursé le bon de réduction');
  define('TEXT_REMOVE_REDEEM_COUPON_ZONE', 'Le code de réduction que vous avez entré est invalide pour l\'adresse que vous avez choisie.');

// more info in place of buy now
  define('MORE_INFO_TEXT','... plus d\'infos');

// IP Address
  define('TEXT_YOUR_IP_ADDRESS','Votre adresse IP est: ');

//Generic Address Heading
  define('HEADING_ADDRESS_INFORMATION','Information adresse');

// cart contents
  define('PRODUCTS_ORDER_QTY_TEXT_IN_CART','Quantité dans le panier: ');
  define('PRODUCTS_ORDER_QTY_TEXT','Quantité: ');

// success messages for added to cart when display cart is off
// set to blank for no messages
// for all pages except where multiple add to cart is used:
  define('SUCCESS_ADDED_TO_CART_PRODUCT', 'Produit ajouté au panier avec succès  ...');
// only for where multiple add to cart is used:
  define('SUCCESS_ADDED_TO_CART_PRODUCTS', 'Produit(s) choisi(s) ajouté(s) au panier avec succès ...');

  define('TEXT_PRODUCT_WEIGHT_UNIT','kgs');

// Shipping
  define('TEXT_SHIPPING_WEIGHT','kgs');
  define('TEXT_SHIPPING_BOXES', 'Boîtes');

// Discount Savings
  define('PRODUCT_PRICE_DISCOUNT_PREFIX','Économie: -');
  define('PRODUCT_PRICE_DISCOUNT_PERCENTAGE','%');
  define('PRODUCT_PRICE_DISCOUNT_AMOUNT','&nbsp;de remise');

// Sale Maker Sale Price
  define('PRODUCT_PRICE_SALE','Soldé:&nbsp;');

//universal symbols
  define('TEXT_NUMBER_SYMBOL', '# ');

// banner_box
  define('BOX_HEADING_BANNER_BOX','Partenaires');
  define('TEXT_BANNER_BOX','Rendez visite à nos partenaires ...');

// banner box 2
  define('BOX_HEADING_BANNER_BOX2','Avez-vous vu ...');
  define('TEXT_BANNER_BOX2','Examinez ceci dès aujourd\'hui !');

// banner_box - all
  define('BOX_HEADING_BANNER_BOX_ALL','Partenaires');
  define('TEXT_BANNER_BOX_ALL','Visitez nos partenaires ...');

// boxes defines
  define('PULL_DOWN_ALL','Veuillez choisir');
  define('PULL_DOWN_MANUFACTURERS','- Réinitialisation -');
// shipping estimator
  define('PULL_DOWN_SHIPPING_ESTIMATOR_SELECT', 'Veuillez choisir');

// general Sort By
  define('TEXT_INFO_SORT_BY','Trier par: ');

// close window image popups
  define('TEXT_CLOSE_WINDOW',' - Cliquez sur l\'image pour la fermer');
// close popups
  define('TEXT_CURRENT_CLOSE_WINDOW','[ Fermer la fenêtre [x] ]');

// iii 031104 added:  File upload error strings
  define('ERROR_FILETYPE_NOT_ALLOWED', 'ERREUR: Type de fichier interdit.');
  define('WARNING_NO_FILE_UPLOADED', 'AVERTISSEMENT: Aucun fichier uploadé.');
  define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'SUCCÈS: Fichier sauvegardé.');
  define('ERROR_FILE_NOT_SAVED', 'ERREUR: Fichier non sauvegardé.');
  define('ERROR_DESTINATION_NOT_WRITEABLE', 'ERREUR: Destination non inscriptible.');
  define('ERROR_DESTINATION_DOES_NOT_EXIST', 'ERREUR: Destination inexistante.');
  define('ERROR_FILE_TOO_BIG', 'AVERTISSEMENT: Le fichier était trop gros pour être uploadé !<br />La commande peut être passée mais veuillez contacter le site pour de l\'aide sur l\'upload.');
// End iii added

  define('TEXT_BEFORE_DOWN_FOR_MAINTENANCE', 'NOTE: Le site sera arrêté pour maintenance le: ');
  define('TEXT_ADMIN_DOWN_FOR_MAINTENANCE', 'NOTE: Le site est actuellement arrêté pour maintenance, il est fermé au public');

  define('PRODUCTS_PRICE_IS_FREE_TEXT','C\'est Gratuit !');
  define('PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT','Prix sur demande');
  define('TEXT_CALL_FOR_PRICE','Prix sur demande');

  define('TEXT_INVALID_SELECTION',' Sélection non valide: ');
  define('TEXT_ERROR_OPTION_FOR',' sur l\'option pour: ');
  define('TEXT_INVALID_USER_INPUT', 'Saisie utilisateur obligatoire<br />');

// product_listing
  define('PRODUCTS_QUANTITY_MIN_TEXT_LISTING','Min: ');
  define('PRODUCTS_QUANTITY_UNIT_TEXT_LISTING','Unités: ');
  define('PRODUCTS_QUANTITY_IN_CART_LISTING','Dans le panier: ');
  define('PRODUCTS_QUANTITY_ADD_ADDITIONAL_LISTING','Ajouter complément: ');

  define('PRODUCTS_QUANTITY_MAX_TEXT_LISTING','Max:');

  define('TEXT_PRODUCTS_MIX_OFF','*Mixé OFF');
  define('TEXT_PRODUCTS_MIX_ON','*Mixé ON');

  define('TEXT_PRODUCTS_MIX_OFF_SHOPPING_CART','<br />*Vous ne pouvez pas mixer les options sur ce produit pour respecter les quantités minimum requises.*<br />');
  define('TEXT_PRODUCTS_MIX_ON_SHOPPING_CART','*Les valeurs d\'options mixées sont sur ON');

  define('ERROR_MAXIMUM_QTY','La quantité ajoutée à votre panier a été ajustée en raison d\'une restriction sur le nombre maximum de produits autorisés. Voir cet article:<br />');
  define('ERROR_CORRECTIONS_HEADING','Veuillez corriger l\'info suivante: <br />');
  define('ERROR_QUANTITY_ADJUSTED', 'La quantité ajoutée à votre panier a été ajustée. La quantité de l\'article que vous voulez n\'est pas divisible. La quantité de l\'article:<br />');
  define('ERROR_QUANTITY_CHANGED_FROM', ', a été modifié de: ');
  define('ERROR_QUANTITY_CHANGED_TO', ' en ');

// Downloads Controller
  define('DOWNLOADS_CONTROLLER_ON_HOLD_MSG','NOTE: Les téléchargements ne sont pas disponibles tant que le paiement n\'a pas été validé');
  define('TEXT_FILESIZE_BYTES', ' octets');
  define('TEXT_FILESIZE_MEGS', ' Mo');

// shopping cart errors
  define('ERROR_PRODUCT','<br />L\'article: ');
  define('ERROR_PRODUCT_STATUS_SHOPPING_CART','<br />Nous sommes désolés mais ce produit a été retiré de notre stock à cet instant.<br />Cet article a été enlevé de votre panier.');
  define('ERROR_PRODUCT_ATTRIBUTES','<br />L\'article: ');
  define('ERROR_PRODUCT_STATUS_SHOPPING_CART_ATTRIBUTES','<br />Nous sommes désolés mais les options choisies pour ce produit ont changé et ont été retirées de notre stock à cet instant.<br />Cet article a été enlevé de votre panier.');
  define('ERROR_PRODUCT_QUANTITY_MIN',',  ... Erreur de quantité minimum - ');
  define('ERROR_PRODUCT_QUANTITY_UNITS',' ... Erreur de quantité des unités - ');
  define('ERROR_PRODUCT_OPTION_SELECTION','<br /> ... Valeurs d\'option sélectionnées invalides ');
  define('ERROR_PRODUCT_QUANTITY_ORDERED','<br /> Vous avez commandé un total de: ');
  define('ERROR_PRODUCT_QUANTITY_MAX',' ... Erreur de quantité maximum - ');
  define('ERROR_PRODUCT_QUANTITY_MIN_SHOPPING_CART',', a une restriction de quantité minimum. ');
  define('ERROR_PRODUCT_QUANTITY_UNITS_SHOPPING_CART',' ... Erreur de quantité des unités - ');
  define('ERROR_PRODUCT_QUANTITY_MAX_SHOPPING_CART',' ... Erreur de quantité maximum - ');

  define('WARNING_SHOPPING_CART_COMBINED', 'REMARQUE: Dans votre intérêt, votre panier courant a été combiné avec le panier de votre visite précédente. Pensez tout de même à vérifier votre panier avant de passer à la caisse.');

// error on checkout when $_SESSION['customers_id' does not exist in customers table
  define('ERROR_CUSTOMERS_ID_INVALID', 'Les informations client ne peuvent pas être validées !<br />Veuillez vous connecter ou recréer votre compte ...');

  define('TABLE_HEADING_FEATURED_PRODUCTS','Produits Phares');

  define('TABLE_HEADING_NEW_PRODUCTS', 'Nouveautés pour %s');
  define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Produits attendus...');
  define('TABLE_HEADING_DATE_EXPECTED', 'Date prévue');
  define('TABLE_HEADING_SPECIALS_INDEX', 'Promotions du mois de %s');

  define('CAPTION_UPCOMING_PRODUCTS','Ces produits seront en stock prochainement');
  define('SUMMARY_TABLE_UPCOMING_PRODUCTS','ce tableau contient une liste des produits qui devraient être en stock prochainement, ainsi que les dates prévisionnelles de leurs arrivées');

// meta tags special defines
  define('META_TAG_PRODUCTS_PRICE_IS_FREE_TEXT','C\'est Gratuit !');

// customer login
  define('TEXT_SHOWCASE_ONLY','Nous Contacter');
// set for login for prices
  define('TEXT_LOGIN_FOR_PRICE_PRICE','Prix non disponible');
  define('TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE','Connectez-vous pour connaître le prix');
// set for show room only
  define('TEXT_LOGIN_FOR_PRICE_PRICE_SHOWROOM', ''); // blank for prices or enter your own text
  define('TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM','Vitrine seulement');

// authorization pending
  define('TEXT_AUTHORIZATION_PENDING_PRICE', 'Prix non disponible');
  define('TEXT_AUTHORIZATION_PENDING_BUTTON_REPLACE', 'APPROBATION EN ATTENTE');
  define('TEXT_LOGIN_TO_SHOP_BUTTON_REPLACE','Se connecter à la boutique');

// text pricing
  define('TEXT_CHARGES_WORD','Frais calculés: ');
  define('TEXT_PER_WORD','<br />Prix par mot: ');
  define('TEXT_WORDS_FREE',' Mot(s) gratuit(s) ');
  define('TEXT_CHARGES_LETTERS','Frais calculés: ');
  define('TEXT_PER_LETTER','<br />Prix par lettre: ');
  define('TEXT_LETTERS_FREE',' Lettre(s) gratuite(s) ');
  define('TEXT_ONETIME_CHARGES','*frais uniques = ');
  define('TEXT_ONETIME_CHARGES_EMAIL',"\t" . '*frais uniques = ');
  define('TEXT_ATTRIBUTES_QTY_PRICES_HELP', 'Option de remises par quantités');
  define('TABLE_ATTRIBUTES_QTY_PRICE_QTY','QTÉ');
  define('TABLE_ATTRIBUTES_QTY_PRICE_PRICE','PRIX');
  define('TEXT_ATTRIBUTES_QTY_PRICES_ONETIME_HELP', 'Option de remises par quantités avec frais uniques');

// textarea attribute input fields
  define('TEXT_MAXIMUM_CHARACTERS_ALLOWED',' caractères maximum  autorisés');
  define('TEXT_REMAINING','restant(s)');

// Shipping Estimator
  define('CART_SHIPPING_OPTIONS', 'Estimation des frais de livraison: ');
  define('CART_SHIPPING_OPTIONS_LOGIN', 'Veuillez <a href="' . zen_href_link(FILENAME_LOGIN, '', 'SSL') . '"><u>vous connecter</u></a>, pour afficher vos frais de livraison personnalisés.');
  define('CART_SHIPPING_METHOD_TEXT','Méthodes de livraison disponibles: ');
  define('CART_SHIPPING_METHOD_RATES','Taux: ');
  define('CART_SHIPPING_METHOD_TO','Livré à: ');
  define('CART_SHIPPING_METHOD_TO_NOLOGIN', 'Livré à: <a href="' . zen_href_link(FILENAME_LOGIN, '', 'SSL') . '"><u>Connexion</u></a>');
  define('CART_SHIPPING_METHOD_FREE_TEXT','Livraison gratuite');
  define('CART_SHIPPING_METHOD_ALL_DOWNLOADS','- Downloads');
  define('CART_SHIPPING_METHOD_RECALCULATE','Recalculer');
  define('CART_SHIPPING_METHOD_ZIP_REQUIRED','correcte');
  define('CART_SHIPPING_METHOD_ADDRESS','Adresse: ');
  define('CART_OT','Coût total estimé: ');
  define('CART_OT_SHOW','correcte'); // set to false if you don't want order totals
  define('CART_ITEMS','Articles dans le panier: ');
  define('CART_SELECT','Sélectionnez');
  define('ERROR_CART_UPDATE', '<strong>Veuillez actualiser votre commande.</strong> ');
  define('IMAGE_BUTTON_UPDATE_CART', 'Actualiser');
  define('EMPTY_CART_TEXT_NO_QUOTE', 'Oups ! Votre session a expiré ... Veuillez mettre à jour votre panier pour les frais de port ...');
  define('CART_SHIPPING_QUOTE_CRITERIA', 'Les frais de port sont basés sur l\'adresse de livraison choisie:');

// multiple product add to cart
  define('TEXT_PRODUCT_LISTING_MULTIPLE_ADD_TO_CART', 'Ajouter: ');
  define('TEXT_PRODUCT_ALL_LISTING_MULTIPLE_ADD_TO_CART', 'Ajouter: ');
  define('TEXT_PRODUCT_FEATURED_LISTING_MULTIPLE_ADD_TO_CART', 'Ajouter: ');
  define('TEXT_PRODUCT_NEW_LISTING_MULTIPLE_ADD_TO_CART', 'Ajouter: ');
  //moved SUBMIT_BUTTON_ADD_PRODUCTS_TO_CART to button_names.php as BUTTON_ADD_PRODUCTS_TO_CART_ALT

// discount qty table
  define('TEXT_HEADER_DISCOUNT_PRICES_PERCENTAGE', 'Prix avec remise par qté');
  define('TEXT_HEADER_DISCOUNT_PRICES_ACTUAL_PRICE', 'Nouveau prix de remise par qté');
  define('TEXT_HEADER_DISCOUNT_PRICES_AMOUNT_OFF', 'Prix avec remise par qté');
  define('TEXT_FOOTER_DISCOUNT_QUANTITIES', '* Les remises peuvent varier en fonction des options ci-dessus');
  define('TEXT_HEADER_DISCOUNTS_OFF', 'Remises par qté non disponibles ...');

// sort order titles for dropdowns
  define('PULL_DOWN_ALL_RESET','- RESET - ');
  define('TEXT_INFO_SORT_BY_PRODUCTS_NAME', 'Nom du produit');
  define('TEXT_INFO_SORT_BY_PRODUCTS_NAME_DESC', 'Nom du produit - desc');
  define('TEXT_INFO_SORT_BY_PRODUCTS_PRICE', 'Prix - bas vers haut');
  define('TEXT_INFO_SORT_BY_PRODUCTS_PRICE_DESC', 'Prix - haut vers bas');
  define('TEXT_INFO_SORT_BY_PRODUCTS_MODEL', 'Modèle');
  define('TEXT_INFO_SORT_BY_PRODUCTS_DATE_DESC', 'Date de création - nouveau vers ancien');
  define('TEXT_INFO_SORT_BY_PRODUCTS_DATE', 'Date de création - ancien vers nouveau');
  define('TEXT_INFO_SORT_BY_PRODUCTS_SORT_ORDER', 'Affichage par défaut');

// downloads module defines
  define('TABLE_HEADING_DOWNLOAD_DATE', 'Expiration du lien');
  define('TABLE_HEADING_DOWNLOAD_COUNT', 'Jours restants');
  define('HEADING_DOWNLOAD', 'Pour télécharger vos fichiers, cliquez sur le bouton de téléchargement et choisissez "Enregistrer sur le disque" dans le menu popup.');
  define('TABLE_HEADING_DOWNLOAD_FILENAME','Nom du fichier');
  define('TABLE_HEADING_PRODUCT_NAME','Nom de l\'article');
  define('TABLE_HEADING_BYTE_SIZE','Taille du fichier');
  define('TEXT_DOWNLOADS_UNLIMITED', 'Illimité');
  define('TEXT_DOWNLOADS_UNLIMITED_COUNT', '--- *** ---');

// misc
  define('COLON_SPACER', ':&nbsp;&nbsp;');

// table headings for cart display and upcoming products
  define('TABLE_HEADING_QUANTITY', 'Qté');
  define('TABLE_HEADING_PRODUCTS', 'Nom Article');
  define('TABLE_HEADING_TOTAL', 'Total');

// create account - login shared
  define('TABLE_HEADING_PRIVACY_CONDITIONS', 'Confidentialité');
  define('TEXT_PRIVACY_CONDITIONS_DESCRIPTION', 'Veuillez reconnaître l\'acceptation de nos conditions de confidentialité en cochant la case suivante. La notice de confidentialité peut être consultée <a href="' . zen_href_link(FILENAME_PRIVACY, '', 'SSL') . '"><span class="pseudolink">ici</span></a>.');
  define('TEXT_PRIVACY_CONDITIONS_CONFIRM', 'J\'ai lu et suis d\'accord avec vos conditions de confidentialité.');
  define('TABLE_HEADING_ADDRESS_DETAILS', 'Vos coordonnées');
  define('TABLE_HEADING_PHONE_FAX_DETAILS', 'Détails additionnels de contact');
  define('TABLE_HEADING_DATE_OF_BIRTH', 'Vérification de votre âge');
  define('TABLE_HEADING_LOGIN_DETAILS', 'Détails de connexion');
  define('TABLE_HEADING_REFERRAL_DETAILS', 'Nous avez-vous été envoyé ?');

  define('ENTRY_EMAIL_PREFERENCE','Détails bulletin et e-mail: ');
  define('ENTRY_EMAIL_HTML_DISPLAY','HTML');
  define('ENTRY_EMAIL_TEXT_DISPLAY','TEXTE-Seulement');
  define('EMAIL_SEND_FAILED','ERREUR: Échec de l\'envoi d\'e-mail à: "%s" <%s> avec le sujet: "%s".');

  define('DB_ERROR_NOT_CONNECTED', 'ERREUR: Impossible de se connecter à la base de données');

// EZ-PAGES Alerts
  define('TEXT_EZPAGES_STATUS_HEADER_ADMIN', 'AVERTISSEMENT: EN-TÊTE d\'EZ-PAGES - Actif pour l\'IP de l\'Admin seulement');
  define('TEXT_EZPAGES_STATUS_FOOTER_ADMIN', 'AVERTISSEMENT: PIED-DE-PAGE d\'EZ-PAGES - Actif  pour l\'IP de l\'Admin seulement');
  define('TEXT_EZPAGES_STATUS_SIDEBOX_ADMIN', 'AVERTISSEMENT: SIDEBOX d\'EZ-PAGES  - Actif  pour l\'IP de l\'Admin seulement');

// extra product listing sorter
  define('TEXT_PRODUCTS_LISTING_ALPHA_SORTER', '');
  define('TEXT_PRODUCTS_LISTING_ALPHA_SORTER_NAMES', 'Afficher les produits de la marque ... ');
  define('TEXT_PRODUCTS_LISTING_ALPHA_SORTER_NAMES_RESET', '-- Reset  --');

///////////////////////////////////////////////////////////
// include email extras
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_EMAIL_EXTRAS)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_EMAIL_EXTRAS);

// include template specific header defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_HEADER)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_HEADER);

// include template specific button name defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_BUTTON_NAMES)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_BUTTON_NAMES);

// include template specific icon name defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_ICON_NAMES)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_ICON_NAMES);

// include template specific other image name defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_OTHER_IMAGES_NAMES)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_OTHER_IMAGES_NAMES);

// credit cards
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_CREDIT_CARDS)) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select. FILENAME_CREDIT_CARDS);

// include template specific whos_online sidebox defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/' . FILENAME_WHOS_ONLINE . '.php')) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . FILENAME_WHOS_ONLINE . '.php');

// include template specific meta tags defines
  if (file_exists(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir . '/meta_tags.php')) {
    $template_dir_select = $template_dir . '/';
  } else {
    $template_dir_select = '';
  }
  require_once(DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . $template_dir_select . 'meta_tags.php');

// END OF EXTERNAL LANGUAGE LINKS
?>
