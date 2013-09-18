<?php
	//Initialisation d'un tableau associatif key=mode, value=checked ou chaîne vide, pour l'attribut des boutons radio
	$selmodeattribut["txt"]=($cms->mode=="txt")?"checked":"";
	$selmodeattribut["img"]=($cms->mode=="img")?"checked":"";
	$selmodeattribut["inter"]=($cms->mode=="inter")?"checked":"";
?>
<form name="form_mode" method="POST" action="cms.php">
	<fieldset>
		<legend>Choix du mode de gestion</legend>
		<label for="opttxt">Pages/Articles</label><input type="radio" id="opttxt" name="mode" value="txt" <?php echo $selmodeattribut["txt"]; ?>>
		<label for="optimg">Fichiers images</label><input type="radio" id ="optimg" name="mode" value="img" <?php echo $selmodeattribut["img"]; ?>>
		<label for="optinter">Interface</label><input type="radio" id ="optinter" name="mode" value="inter" <?php echo $selmodeattribut["inter"]; ?>>
		<input type="submit" name="choixmode" value="Changer">
	</fieldset>
</form>