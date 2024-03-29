<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2006 The zen-cart developers                           |
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
//  $Id: sqlpatch.php 4138 2006-08-14 05:56:44Z drbyte $
//
  define('HEADING_TITLE','Exécuteur de requêtes SQL');
  define('HEADING_WARNING','ASSUREZ-VOUS DE FAIRE UNE SAUVEGARDE COMPLÈTE DE VOTRE BASE DE DONNÉES AVANT D\'EXÉCUTER DES SCRIPTS ICI.');
  define('HEADING_WARNING2','Si vous installez des contributions de tiers, notez que vous en prenez la responsabilité.<br />Zen Cart&reg; ne garantit en rien la sureté des scripts fournis par des tiers. Testez avant d\'utiliser sur votre base en production !');
  define('HEADING_WARNING_INSTALLSCRIPTS', 'NOTE: Les scripts Zen Cart&reg; de mise à jour de la base de données NE DEVRAIENT PAS être exécutés depuis cette page.<br />À la place, veuillez uploader le nouveau répertoire <strong>\'zc_install\'</strong> et exécuter la mise à jour depuis ce répertoire pour une meilleure fiabilité.');
  define('TEXT_QUERY_RESULTS','Résultats de la requête:');
  define('TEXT_ENTER_QUERY_STRING','Entrez la requête <br />à exécuter:&nbsp;&nbsp;<br /><br />Soyez sûr(e) de <br />terminer avec ;');
  define('TEXT_QUERY_FILENAME','Uploader le fichier-requête:');
  define('ERROR_NOTHING_TO_DO','ERREUR: Rien à exécuter - aucune requête ou fichier-requête spécifié.');
  define('TEXT_CLOSE_WINDOW', '[ Fermer la fenêtre ]');
  define('SQLPATCH_HELP_TEXT','L\'outil SQLPATCH vous permet d\'installer des patches système en collant directement ici du code SQL dans le champ '.
                              'zone de texte, ou en fournissant un fichier-requête (.SQL) à uploader.<br />' .
                              'Lors de la préparation des scripts à utiliser avec cet outil, N\'INCLUEZ PAS de préfixe de table, car cet outil ' .
                              'insèrera automatiquement le bon préfixe pour la base de donnée active, en se basant sur les paramètres du fichier ' .
                              'admin/includes/configure.php de la boutique (définition de DB_PREFIX).<br /><br />' .
                              'Les commandes entrées ou uploadées doivent débuter uniquement avec les instructions suivantes, et DOIVENT être en MAJUSCULES:'.
                              '<br /><ul><li>DROP TABLE IF EXISTS</li><li>CREATE TABLE</li><li>INSERT INTO</li><li>INSERT IGNORE INTO</li><li>ALTER TABLE</li>' .
                              '<li>UPDATE (juste une seule table)</li><li>UPDATE IGNORE (juste une seule table)</li><li>DELETE FROM</li><li>DROP INDEX</li><li>CREATE INDEX</li>' .
                              '<br /><li>SELECT </li></ul>' . 
'<h2>Méthodes Avancées</h2>Les méthodes suivantes peuvent être utilisées pour sortir des commandes plus complexes si nécessaire:<br />
Pour exécuter des blocs de code ensemble pour qu\'ils soient traités comme une seule commande par MySQL, vous avez besoin d\'utiliser la valeur &quot;<code>#NEXT_X_ROWS_AS_ONE_COMMAND:xxx</code>&quot;.  L\'analyseur traitera le nombre X de commandes comme une seule.<br />
Si vous exécutez ce même fichier avec phpMyAdmin ou un équivalent, le commentaire &quot;#NEXT...&quot; est ignoré, et le script s\'exécutera parfaitement.<br />
<br /><strong>NOTE:</strong> Les commandes SELECT.... FROM... and LEFT JOIN ont besoin que &quot;FROM&quot; ou &quot;LEFT JOIN&quot; soient sur la même ligne pour que l\'analyseur puisse ajouter le préfixe de table.<br /><br />
<em><strong>Exemples:</strong></em>
<ul><li><code>#NEXT_X_ROWS_AS_ONE_COMMAND:4<br />
SET @t1=0;<br />
SELECT (@t1:=configuration_value) as t1 <br />
FROM configuration <br />
WHERE configuration_key = \'KEY_NAME_HERE\';<br />
UPDATE product_type_layout SET configuration_value = @t1 WHERE configuration_key = \'KEY_NAME_TO_CHECK_HERE\';<br />
DELETE FROM configuration WHERE configuration_key = \'KEY_NAME_HERE\';<br />&nbsp;</li>

<li>#NEXT_X_ROWS_AS_ONE_COMMAND:1<br />
INSERT INTO tablename <br />
(col1, col2, col3, col4)<br />
SELECT col_a, col_b, col_3, col_4<br />
FROM table2;<br />&nbsp;</li>

<li>#NEXT_X_ROWS_AS_ONE_COMMAND:1<br />
INSERT INTO table1 <br />
(col1, col2, col3, col4 )<br />
SELECT p.othercol_a, p.othercol_b, po.othercol_c, pm.othercol_d<br />
FROM table2 p, table3 pm<br />
LEFT JOIN othercol_f po<br />
ON p.othercol_f = po.othercol_f<br />
WHERE p.othercol_f = pm.othercol_f;</li>
</ul></code>' );
  define('REASON_TABLE_ALREADY_EXISTS','Cannot create table %s because it already exists');
  define('REASON_TABLE_DOESNT_EXIST','Cannot drop table %s because it does not exist.');
  define('REASON_TABLE_NOT_FOUND','Cannot execute because table %s does not exist.');
  define('REASON_CONFIG_KEY_ALREADY_EXISTS','Cannot insert configuration_key "%s" because it already exists');
  define('REASON_COLUMN_ALREADY_EXISTS','Cannot ADD column %s because it already exists.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_DROP','Cannot DROP column %s because it does not exist.');
  define('REASON_COLUMN_DOESNT_EXIST_TO_CHANGE','Cannot CHANGE column %s because it does not exist.');
  define('REASON_PRODUCT_TYPE_LAYOUT_KEY_ALREADY_EXISTS','Cannot insert prod-type-layout configuration_key "%s" because it already exists');
  define('REASON_INDEX_DOESNT_EXIST_TO_DROP','Cannot drop index %s on table %s because it does not exist.');
  define('REASON_PRIMARY_KEY_DOESNT_EXIST_TO_DROP','Cannot drop primary key on table %s because it does not exist.');
  define('REASON_INDEX_ALREADY_EXISTS','Cannot add index %s to table %s because it already exists.');
  define('REASON_PRIMARY_KEY_ALREADY_EXISTS','Cannot add primary key to table %s because a primary key already exists.');
  define('REASON_NO_PRIVILEGES','User '.DB_SERVER_USERNAME.'@'.DB_SERVER.' does not have %s privileges to database '.DB_DATABASE.'.');

?>