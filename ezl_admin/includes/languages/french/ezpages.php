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
//  $Id: ezpages.php 2827 2006-01-08 19:46:40Z ajeh $
//
define('HEADING_TITLE', 'EZ-Pages');
define('TABLE_HEADING_PAGES', 'Intitulé de page');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_VSORT_ORDER', 'Classement sidebox');
define('TABLE_HEADING_HSORT_ORDER', 'Classement de pied de page');
define('TEXT_PAGES_TITLE', 'Intitulé de page:');
define('TEXT_PAGES_HTML_TEXT', 'Contenu HTML:');
define('TABLE_HEADING_DATE_ADDED', 'Date de création');
define('TEXT_PAGES_STATUS_CHANGE', 'Changement de statut: %s');
define('TEXT_INFO_DELETE_INTRO', 'Êtes-vous sûr(e) de vouloir supprimer cette page ?');
define('SUCCESS_PAGE_INSERTED', 'SUCCÈS: La page a été insérée.');
define('SUCCESS_PAGE_UPDATED', 'SUCCÈS: La page a été mise à jour.');
define('SUCCESS_PAGE_REMOVED', 'SUCCÈS: La page a été supprimée.');
define('SUCCESS_PAGE_STATUS_UPDATED', 'SUCCÈS: Le statut de la page a été mis à jour.');
define('ERROR_PAGE_TITLE_REQUIRED', 'ERREUR: Intitulé de page requis.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'ERREUR: Drapeau statut inconnu.');
define('ERROR_MULTIPLE_HTML_URL', 'ERREUR: Vous avez défini plusieurs règlages alors qu\'un seul peut être défini par lien ...<br />Définissez uniquement au choix: Contenu HTML -ou- URL lien interne -ou- URL lien externe');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_STATUS_HEADER', 'En-tête');
define('TABLE_HEADING_STATUS_SIDEBOX', 'Sidebox');
define('TABLE_HEADING_STATUS_FOOTER', 'Pied');
define('TABLE_HEADING_STATUS_TOC', 'TOC');
define('TABLE_HEADING_CHAPTER', 'Chapitre');

define('TABLE_HEADING_PAGE_OPEN_NEW_WINDOW', 'Ouvrir dans<br />nouvelle fenêtre');
define('TABLE_HEADING_PAGE_IS_SSL', 'Page en SSL');

define('TEXT_DISPLAY_NUMBER_OF_PAGES', 'Affiche <b>%d</b> à <b>%d</b> (de <b>%d</b> pages)');
define('IMAGE_NEW_PAGE', 'Nouvelle page');
define('TEXT_INFO_PAGE_IMAGE', 'Image');
define('TEXT_INFO_CURRENT_IMAGE', 'Image courante:');
define('TEXT_INFO_PAGES_ID', 'ID: ');
define('TEXT_INFO_PAGES_ID_SELECT', '- Choisissez une page ...');

define('TEXT_HEADER_SORT_ORDER', 'Classement:');
define('TEXT_SIDEBOX_SORT_ORDER', 'Classement:');
define('TEXT_FOOTER_SORT_ORDER', 'Classement:');
define('TEXT_TOC_SORT_ORDER', 'Classement:');
define('TEXT_CHAPTER', 'Chapitre précédent/suivant:');
define('TABLE_HEADING_CHAPTER_PREV_NEXT', 'Chapitre:&nbsp;<br />');

define('TEXT_HEADER_SORT_ORDER_EXPLAIN', 'Le classement d\'en-tête indique dans quelle séquence les ez-pages apparaîtront en une unique rangée dans l\'en-tête de votre boutique.<br />Pour qu\'une ez-page apparaisse dans l\'entête, le classement doit être plus grand que zéro et le bouton d\'activation &quot;vert&quot;.<br />');
define('TEXT_SIDEBOX_ORDER_EXPLAIN', 'Le classement de sidebox indique dans quelle séquence les ez-pages apparaîtront en liste verticale dans la sidebox \'Liens importants\' de votre boutique.<br />Pour qu\'une ez-page apparaisse dans cette sidebox, le classement doit être plus grand que zéro et le bouton d\'activation &quot;vert&quot;.<br />');
define('TEXT_FOOTER_ORDER_EXPLAIN', 'Le classement de pied indique dans quelle séquence les ez-pages apparaîtront en une unique rangée dans le pied de page de votre boutique.<br />Pour qu\'une ez-page apparaisse dans le pied de page, le classement doit être plus grand que zéro et le bouton d\'activation &quot;vert&quot;.<br />');
define('TEXT_TOC_SORT_ORDER_EXPLAIN', 'Le classement de TOC (Table of Contents) indique dans quelle séquence les ez-pages apparaîtront en liste verticale dans la TOC du chapitre,<br />ou par les boutons Précédent/Suivant.<br />Pour qu\'une ez-page apparaisse dans la TOC, le classement doit être plus grand que zéro et le bouton d\'activation &quot;vert&quot;.<br />');
define('TEXT_CHAPTER_EXPLAIN', 'Les chapitres vous permettent de grouper ensemble des ez-pages en leur donnant un même numéro de chapitre.<br />Des liens de navigation (précédente/suivante) apparaîtront sur les ez-pages d\'un même groupe et une TOC générée automatiquement pourra être affichée.<br />Les liens dans la TOC consistent des ez-pages ayant ce même numéro de chapitre, et affichées selon leur classement TOC.<br />');

define('TEXT_ALT_URL', 'Lien interne:');
define('TEXT_ALT_URL_EXPLAIN', 'Si spécifié, le contenu de la page sera ignoré et cet URL INTERNE sera utilisé à la place pour faire le lien.<br />Exemple vers Reviews: index.php?main_page=reviews<br />Exemple vers Mon compte: index.php?main_page=account et marqué en SSL');

define('TEXT_ALT_URL_EXTERNAL', 'Lien externe:');
define('TEXT_ALT_URL_EXTERNAL_EXPLAIN', 'Si spécifié, le contenu de la page sera ignoré et cet URL EXTERNE sera utilisé à la place pour faire le lien.<br />Exemple de lien externe: http://www.zen-cart.com');

define('TEXT_SORT_CHAPTER_TOC_TITLE_INFO', 'Ordre d\'affichage ');
define('TEXT_SORT_CHAPTER_TOC_TITLE', 'Chapitre/TOC');
define('TEXT_SORT_HEADER_TITLE', 'En-tête');
define('TEXT_SORT_SIDEBOX_TITLE', 'Sidebox');
define('TEXT_SORT_FOOTER_TITLE', 'Pied de page');
define('TEXT_SORT_PAGE_TITLE', 'Intitulé de page');
define('TEXT_SORT_PAGE_ID_TITLE', 'Page ID, Intitulé');

define('TEXT_PAGE_TITLE', 'Intitulé:');
define('TEXT_WARNING_MULTIPLE_SETTINGS', '&lt;strong&gt;ATTENTION: Définition de liens multiples&lt;/strong&gt;');
?>
