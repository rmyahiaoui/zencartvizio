<?php
/**
 * Page Template
 *
 * This page is auto-displayed if the configure.php file cannot be read properly. It is intended simply to recommend clicking on the zc_install link to begin installation.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_zc_install_suggested_default.php 14188 2009-08-17 22:59:15Z drbyte $
 */
$relPath = (file_exists('includes/templates/template_default/images/logo.png')) ? '' : '../';
$instPath = (file_exists('zc_install/index.php')) ? 'zc_install/index.php' : (file_exists('../zc_install/index.php') ? '../zc_install/index.php' : '');
$docsPath = (file_exists('docs/index.html')) ? 'docs/index.html' : (file_exists('../docs/index.html') ? '../docs/index.html' : '');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
<head>
<title>System Setup Required</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="authors" content="The Zen Cart&reg; Team and others" />
<meta name="generator" content="shopping cart program by Zen Cart&reg;, http://www.zen-cart.com" />
<meta name="robots" content="noindex, nofollow" />
<style type="text/css">
<!--
.systemError {color: #FFFFFF}
-->
</style>


</head>

<body style="margin: 20px">
<div style="width: 730px; background-color: #ffffff; margin: auto; padding: 10px; border: 1px solid #cacaca;">
<div>
<img src="<?php echo $relPath; ?>includes/templates/template_default/images/logo.png" alt="Zen Cart&reg;" title=" Zen Cart&reg; " width="192" height="64" border="0" />
</div>
<h1>Bonjour. Merci d'utiliser Zen Cart&reg;.</h1>
<h2>Vous voyez cette page pour une ou plusieurs raisons:</h2>
<ol>
<li>C'est la <strong>premi&egrave;re fois que vous utilisez Zen Cart&reg;</strong> et vous n'avez pas encore termin&eacute; la proc&eacute;dure normale d'installation.<br />
Si c'est votre cas,
<?php if ($instPath) { ?>
<a href="<?php echo $instPath; ?>">Cliquez ici</a> pour commencer l'installation.
<?php } else { ?>
vous devrez uploader le r&eacute;pertoire &quot;zc_install&quot; en utilisant votre logiciel FTP, et ensuite lancer <a href="<?php echo $instPath; ?>">zc_install/index.php</a> depuis votre navigateur (ou rechargez cette page pour voir le lien vers l'installation).
<?php } ?>
<br /><br />
</li>
<li>Votre fichier <tt><strong>/includes/configure.php</strong></tt> et/ou <tt><strong>/admin/includes/configure.php</strong></tt> contient des <em>informations de chemins</em> invalides et/ou de mauvaises <em>informations de connexion &agrave; la base de donn&eacute;es</em>.<br />
Si vous avez r&eacute;cemment &eacute;dit&eacute; vos fichiers configure.php pour quelque raison, ou peut-&ecirc;tre d&eacute;plac&eacute; votre site vers un r&eacute;pertoire ou un serveur diff&eacute;rent, alors vous devez revoir et mettre &agrave; jour tous vos param&egrave;tres aux bonnes valeurs pour votre serveur.<br />
Lisez la <a href="http://tutorials.zen-cart.com" target="_blank">FAQ en ligne et les Tutoriels</a> sur le site web de Zen Cart&reg; pour avoir de l'aide.</li>
<?php if (isset($problemString) && $problemString != '') { ?>
<li class="errorDetails">D&eacute;tails suppl&eacute;mentaires: <?php echo $problemString; ?></li>
<?php } ?>
</ol>
<br />
<h2>Pour commencer l'installation ...</h2>
<ol>
<?php if ($docsPath) { ?>
<li>La <a href="<?php echo $docsPath; ?>">Documentation d'installation</a> peut &ecirc;tre consult&eacute;e en cliquant ici: <a href="<?php echo $docsPath; ?>">Documentation</a></li>
<?php } else { ?>
<li>La documentation d'installation se trouve normalement dans le dossier /docs de la distribution Zen Cart&reg;. Vous pouvez aussi trouver de la documentation en anglais dans les <a href="http://tutorials.zen-cart.com" target="_blank">FAQs en ligne</a> ou en fran&ccedil;ais sur <a href="http://www.zencart-france.com" target="_blank">Zen Cart France</a>.</li>
<?php } ?>
<?php if ($instPath) { ?>
<li>Lancez <a href="<?php echo $instPath; ?>">zc_install/index.php</a> depuis votre navigateur.</li>
<?php } else { ?>
<li>Vous devrez uploader le r&eacute;pertoire &quot;zc_install&quot; en utilisant votre logiciel FTP, et ensuite lancer <a href="<?php echo $instPath; ?>">zc_install/index.php</a> depuis votre navigateur (ou rechargez cette page pour voir le lien vers l'installation).</li>
<?php } ?>
<li>La <a href="http://tutorials.zen-cart.com" target="_blank">FAQ en ligne et les Tutoriels</a> sur le site web de Zen Cart&reg; seront d'une grande aide si vous rencontrez des difficult&eacute;s.</li>
</ol>

</div>
    <p style="text-align: center; font-size: small;">Copyright &copy; 2003-<?php echo date('Y'); ?> <a href="http://www.zen-cart.com" target="_blank">Zen Cart&reg;</a></p>
</body></html>
