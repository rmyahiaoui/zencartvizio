<?php
/**
 * @package admin
 * @copyright Copyright 2003-2010 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: attributes_controller.php 15883 2010-04-11 16:41:26Z wilt $
 */

define('HEADING_TITLE', 'CATÉGORIES: ');

define('HEADING_TITLE_OPT', 'Options de Produits');
define('HEADING_TITLE_VAL', 'Valeurs des Options');
define('HEADING_TITLE_ATRIB', 'Contrôleur des Attributs');
define('HEADING_TITLE_ATRIB_SELECT','Veuillez sélectionner une catégorie pour afficher les attributs de produit de...');

define('TEXT_PRICES_AND_WEIGHTS', 'Prix et Poids');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR', 'Facteur Prix: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_OFFSET', 'Dédommagement: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_ONETIME', 'Une Fois:');

define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_ONETIME', 'Facteur Une Fois: ');
define('TABLE_HEADING_ATTRIBUTES_PRICE_FACTOR_OFFSET_ONETIME', 'Dédommagement: ');

define('TABLE_HEADING_ATTRIBUTES_QTY_PRICES', 'Remise par quantité d\'attributs:');
define('TABLE_HEADING_ATTRIBUTES_QTY_PRICES_ONETIME', 'Remise unique par quantité d\'attributs:');

define('TABLE_HEADING_ATTRIBUTES_PRICE_WORDS', 'Prix par mot:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_WORDS_FREE', '- Mots gratuits:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_LETTERS', 'Prix par lettre:');
define('TABLE_HEADING_ATTRIBUTES_PRICE_LETTERS_FREE', '- Lettres gratuites:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_PRODUCT', 'Nom du Produit');
define('TABLE_HEADING_OPT_NAME', 'Nom d\'Option');
define('TABLE_HEADING_OPT_VALUE', 'Valeur d\'Option');
define('TABLE_HEADING_OPT_PRICE', 'Prix');
define('TABLE_HEADING_OPT_PRICE_PREFIX', 'Préfixe');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_DOWNLOAD', 'Produits downloadables:');
define('TABLE_TEXT_FILENAME', 'Fichier:');
define('TABLE_TEXT_MAX_DAYS', 'Jours avant expiration: (0 = illimité)');
define('TABLE_TEXT_MAX_COUNT', 'Nombre maximum de downloads:');
define('TABLE_HEADING_OPT_DISCOUNTED','Remise');
define('TABLE_HEADING_PRICE_BASE_INCLUDED','Base');
define('TABLE_HEADING_PRICE_TOTAL','Total|Remise: Une fois:');
define('TEXT_WARNING_OF_DELETE', 'Cette option est liée à des produits et des valeurs - La supprimer présente des risques.');
define('TEXT_OK_TO_DELETE', 'Cette option n\'est liée à aucun produit ou valeur - Vous pouvez la supprimer sans risque.');
define('TEXT_OPTION_ID', 'Par ID d\'option ');
define('TEXT_OPTION_NAME', 'Par nom d\'option ');

define('ATTRIBUTE_WARNING_DUPLICATE','Attribut dupliqué - L\'attribut n\'a pas été ajouté'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_DUPLICATE_UPDATE','Un attribut dupliqué existe - Attribut non modifié'); // attributes duplicate warning
define('ATTRIBUTE_WARNING_INVALID_MATCH','L\'option d\'attribut et la valeur d\'option ne correspondent pas - L\'attribut n\'a pas été ajouté'); // miss matched option and options value
define('ATTRIBUTE_WARNING_INVALID_MATCH_UPDATE','L\'option d\'attribut et la valeur d\'option ne correspondent pas - Attribut non modifié'); // miss matched option and options value
define('ATTRIBUTE_POSSIBLE_OPTIONS_NAME_WARNING_DUPLICATE','Nom d\'option possiblement dupliqué ajoutée'); // Options Name Duplicate warning
define('ATTRIBUTE_POSSIBLE_OPTIONS_VALUE_WARNING_DUPLICATE','Valeur d\'option possiblement dupliquée ajoutéee'); // Options Value Duplicate warning

define('PRODUCTS_ATTRIBUTES_EDITING','ÉDITION'); // title
define('PRODUCTS_ATTRIBUTES_DELETE','EFFACEMENT'); // title
define('PRODUCTS_ATTRIBUTES_ADDING','AJOUT DE NOUVEAUX ATTRIBUTS'); // title
define('TEXT_DOWNLOADS_DISABLED','NOTE: Les downloads sont désactivés');

define('TABLE_TEXT_MAX_DAYS_SHORT', 'Jours:');
define('TABLE_TEXT_MAX_COUNT_SHORT', 'Max:');

define('TABLE_HEADING_OPTION_SORT_ORDER','Classement');
define('TABLE_HEADING_OPTION_VALUE_SORT_ORDER','Classement par défaut');
define('TEXT_SORT',' Classement: ');

define('TABLE_HEADING_OPT_WEIGHT_PREFIX','Préfixe');
define('TABLE_HEADING_OPT_WEIGHT','Poids');
define('TABLE_HEADING_OPT_SORT_ORDER','Classement');
define('TABLE_HEADING_OPT_DEFAULT','Défaut');

define('TABLE_HEADING_OPT_TYPE', 'Type d\'option'); //CLR 031203 add option type column
define('TABLE_HEADING_OPTION_VALUE_SIZE','Taille');
define('TABLE_HEADING_OPTION_VALUE_MAX','Max');
define('TABLE_HEADING_OPTION_VALUE_ROWS','Rangées');
define('TABLE_HEADING_OPTION_VALUE_COMMENTS','Commentaires');

define('TEXT_OPTION_VALUE_COMMENTS','Commentaires: ');
define('TEXT_OPTION_VALUE_SIZE','Afficher la taille: ');
define('TEXT_OPTION_VALUE_MAX','Longueur maximum: ');

define('TEXT_ATTRIBUTES_IMAGE','Image à transférer de l\'attribut:');//??
define('TEXT_ATTRIBUTES_IMAGE_DIR','Répertoire pour l\'image de l\'attribut:');

define('TEXT_ATTRIBUTES_FLAGS','Drapeaux<br />de l\'attribut:');
define('TEXT_ATTRIBUTES_DISPLAY_ONLY', 'Utilisé en<br />affichage seulement:');
define('TEXT_ATTRIBUTES_IS_FREE', 'L\'attribut est gratuit<br />lorsque le produit est gratuit:');
define('TEXT_ATTRIBUTES_DEFAULT', 'Attribut par défaut<br />marqué comme sélectionné:');
define('TEXT_ATTRIBUTE_IS_DISCOUNTED', 'Appliquer les mêmes remises<br />utilisées sur le produit:');
define('TEXT_ATTRIBUTE_PRICE_BASE_INCLUDED','Inclure dans le prix de base<br />lorsque le prix est fixé par attributs');
define('TEXT_ATTRIBUTES_REQUIRED','Attribut obligatoire<br />pour du texte:');

  define('LEGEND_BOX','Légende');
  define('LEGEND_KEYS','OFF/ON');
  define('LEGEND_ATTRIBUTES_DISPLAY_ONLY', 'Affichage uniquement');
  define('LEGEND_ATTRIBUTES_IS_FREE', 'Gratuit');
  define('LEGEND_ATTRIBUTES_DEFAULT', 'Par défaut');
  define('LEGEND_ATTRIBUTE_IS_DISCOUNTED', 'Avec remise');
  define('LEGEND_ATTRIBUTE_PRICE_BASE_INCLUDED','Prix de base');
  define('LEGEND_ATTRIBUTES_REQUIRED','Requis');
  define('LEGEND_ATTRIBUTES_IMAGES','Images');
  define('LEGEND_ATTRIBUTES_DOWNLOAD','Nom du fichier<br />valide/invalide');

  define('TEXT_ATTRIBUTES_UPDATE_SORT_ORDER','AU CLASSEMENT PAR DÉFAUT');
  define('TEXT_PRODUCTS_LISTING','Liste des produits pour: ');
  define('TEXT_NO_PRODUCTS_SELECTED','Aucun produit sélectionné');
  define('TEXT_NO_ATTRIBUTES_DEFINED','Aucun attribut défini pour le produit ID#');

  define('TEXT_PRODUCTS_ID','Produit ID#');
  define('TEXT_ATTRIBUTES_DELETE','SUPPRIMER TOUT');
  define('TEXT_ATTRIBUTES_COPY_PRODUCTS','Copier vers le produit');
  define('TEXT_ATTRIBUTES_COPY_CATEGORY','Copier vers la catégorie');

  define('TEXT_INFO_HEADING_ATTRIBUTE_FEATURES','Modifications d\'attribut pour le produit ID# ');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_DELETE','Supprimer <strong>TOUS</strong> les attributs de produit pour:<br />');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO','Copier les attributs vers un autre produit ou vers une catégorie entière depuis:<br />');

  define('TEXT_ATTRIBUTES_COPY_TO_PRODUCTS','PRODUIT');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_PRODUCT','Copier les attributs vers un autre <strong>produit</strong> depuis ID#');
  define('TEXT_INFO_ATTRIBUTES_FEATURE_COPY_TO','Sélectionnez le produit pour en copier tous les attributs vers:');

  define('TEXT_ATTRIBUTES_COPY_TO_CATEGORY','CATÉGORIE');
  define('TEXT_INFO_ATTRIBUTES_FEATURE_CATEGORIES_COPY_TO','Sélectionnez la catégorie pour en copier tous les attributs vers:');
  define('TEXT_INFO_ATTRIBUTES_FEATURES_COPY_TO_CATEGORY','Copier les attributs vers tous les produits de la <strong>catégorie</strong> depuis le produit ID#');

define('TEXT_COPY_ATTRIBUTES_CONDITIONS','<strong>Comment les attributs existants de produit doivent-ils être traités ?</strong>');
define('TEXT_COPY_ATTRIBUTES_DELETE','<strong>Supprimer</strong> d\'abord, puis copier les nouveaux attributs');
define('TEXT_COPY_ATTRIBUTES_UPDATE','<strong>Mettre à jour</strong> les attributs existants avec les nouveaux paramètres/prix, puis ajouter les nouveaux');
define('TEXT_COPY_ATTRIBUTES_IGNORE','<strong>Ignorer</strong> les attributs existants et ajouter uniquement les nouveaux attributs');

  define('SUCCESS_PRODUCT_UPDATE_SORT','Mise à jour réussie du classement des attributs pour ID# ');
  define('SUCCESS_PRODUCT_UPDATE_SORT_NONE','Aucun attribut à actualiser le classement pour ID# ');
  define('SUCCESS_ATTRIBUTES_DELETED','Attributs supprimés avec succès');
  define('SUCCESS_ATTRIBUTES_UPDATE','Attributs mis à jour avec succès');

  define('WARNING_PRODUCT_COPY_TO_CATEGORY_NONE','Aucune catégorie sélectionnée pour la copie');
  define('TEXT_PRODUCT_IN_CATEGORY_NAME',' - dans la catégorie: ');

  define('TEXT_DELETE_ALL_ATTRIBUTES','Êtes-vous certain(e) de vouloir supprimer tous les attributs pour ID# ');

  define('TEXT_ATTRIBUTE_COPY_SKIPPING','<strong>Sauter un nouvel attribut </strong>');
  define('TEXT_ATTRIBUTE_COPY_INSERTING','<strong>Insertion d\'un nouvel attribut depuis </strong>');
  define('TEXT_ATTRIBUTE_COPY_UPDATING','<strong>Actualisation depuis l\'attribut </strong>');

// preview
  define('TEXT_ATTRIBUTES_PREVIEW','PRÉVISUALISER LES ATTRIBUTS');
  define('TEXT_ATTRIBUTES_PREVIEW_DISPLAY','PRÉVISUALISER L\'AFFICHAGE DES ATTRIBUTS POUR ID#');
  define('TEXT_PRODUCT_OPTIONS', '<strong>Veuillez choisir:</strong>');

  define('TEXT_ATTRIBUTES_INSERT_INFO', '<strong>Définissez les paramètres d\'attribut puis cliquez sur Insérer pour appliquer</strong>');
  define('TEXT_PRICED_BY_ATTRIBUTES', 'Prix fixé par les attributs');
  define('TEXT_PRODUCTS_PRICE', 'Prix du produit: ');
  define('TEXT_SPECIAL_PRICE', 'Prix promotionnel: ');
  define('TEXT_SALE_PRICE', 'Prix soldé: ');
  define('TEXT_FREE', 'GRATUIT');
  define('TEXT_CALL_FOR_PRICE', 'Prix sur demande');
  define('TEXT_SAVE_CHANGES','METTRE À JOUR ET ENREGISTRER LES MODIFICATIONS:');

  define('TEXT_INFO_ID', 'ID#');
  define('TEXT_INFO_ALLOW_ADD_TO_CART_NO', 'Pas d\'ajout au panier');

  define('TEXT_DELETE_ATTRIBUTES_OPTION_NAME_VALUES', 'Confirmez la suppression de TOUTES les valeurs d\'option de produit pour le nom d\'option ...');
  define('TEXT_INFO_PRODUCT_NAME', '<strong>Nom de produit: </strong>');
  define('TEXT_INFO_PRODUCTS_OPTION_NAME', '<strong>Nom d\'option: </strong>');
  define('TEXT_INFO_PRODUCTS_OPTION_ID', '<strong>ID#</strong>');
  define('SUCCESS_ATTRIBUTES_DELETED_OPTION_NAME_VALUES', 'Suppression réussie de toutes les valeurs d\'option pour le nom d\'option : ');
?>