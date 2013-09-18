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
// $Id: moneyorder.php 1969 2005-09-13 06:57:21Z drbyte $
//

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', 'Cheque ou Virement Bancaire');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', '
<hr>
<u>Paiement par virement bancaire </u> : <br><br>
Veuillez faire un virement du montant de la commande ttc aux coordonnees bancaires ci-dessous :<br /><br />

Beneficaire :  Easylamps   <br />
Domiciliation : HSBC HERVET BOULOGNE <br />
CODE ETABLISSEMENT : 30056<br />
CODE GUICHET :  00785<br />
Numero DE COMPTE : 07854761087 CLE RIB : 18<br />
<br /><br />
Pour les virements internationaux :<br />
IBAN : FR7630056007850785476108718<br />
BIC : CCFRFRPP<br />
<br />
<u>Paiement par cheque :</u> <br><br>

Veuillez envoyer a l\'adresse ci-dessous un cheque du montant de la commande TTC libelle a l\'ordre d\'Easylamps.
<br><br>

Easylamps <br>
33 rue de la revolution<br>
93100 Montreuil <br>
France <br>
<br />
     <hr>' . 'Votre commande ne sera envoyee qu\'a;
 reception du reglement et de sa validation par notre banque.');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION );
?>
