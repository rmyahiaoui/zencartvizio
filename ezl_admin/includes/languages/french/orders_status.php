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
//  $Id: orders_status.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', 'États de Commande');

define('TABLE_HEADING_ORDERS_STATUS', 'États de Commande');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_EDIT_INTRO', 'Veuillez effectuer les changements nécessaires');
define('TEXT_INFO_ORDERS_STATUS_NAME', 'État de commande:');
define('TEXT_INFO_INSERT_INTRO', 'Veuillez saisir le nouvel état de commande avec ses données relatives');
define('TEXT_INFO_DELETE_INTRO', 'Êtes-vous certain(e) de vouloir supprimer cet état de commande ?');
define('TEXT_INFO_HEADING_NEW_ORDERS_STATUS', 'Nouvel état de commande');
define('TEXT_INFO_HEADING_EDIT_ORDERS_STATUS', 'Édition de l\'état de commande');
define('TEXT_INFO_HEADING_DELETE_ORDERS_STATUS', 'Effacement de l\'état de commande');

define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', 'ERREUR: L\'état de commande par défaut ne peut être supprimé. Veuillez définir un autre état de commande par défaut et réessayer.');
define('ERROR_STATUS_USED_IN_ORDERS', 'ERREUR: Cet état de commande est actuellement utilisé par des commandes.');
define('ERROR_STATUS_USED_IN_HISTORY', 'ERREUR: Cet état de commande est actuellement utilisé dans l\'historique des états de commande.');
?>