<?php
	//Initialisation d'un tableau associatif key=mode, value=checked ou chaîne vide, pour l'attribut des boutons radio
	$selmodeattribut["txt"]=($editeur->mode=="txt")?"checked":"";
	$selmodeattribut["img"]=($editeur->mode=="img")?"checked":"";
?>
<form name="form_mode" method="POST" action="content_edition.php">
	<label for="opttxt">Gestion des articles</label><input type="radio" id="opttxt" name="mode" value="txt" <?php echo $selmodeattribut["txt"]; ?>>
	<label for="optimg">Gestion des fichiers images</label><input type="radio" id ="optimg" name="mode" value="img" <?php echo $selmodeattribut["img"]; ?>>
	<input type="submit" name="choixmode" value="Changer">
</form>