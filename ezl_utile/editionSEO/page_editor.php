<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="page_edition.css" />
		<title>CMS - Editeur de page</title>
	</head>
	<body>
		<h3><?php echo "Edition de la page n°$cms->pageed"; ?></h3>
		<form name="form_editor" method="POST" action="">
			<!--input hidden pour garder en cache les crtitères de recherche existant avant le passage en mode édition-->
			<input type="hidden" name="critr_page" value="<?php echo $cms->page; ?>"/>
			<input type="hidden" name="critr_typepage" value="<?php echo $cms->typepage; ?>"/>
			<input type="hidden" name="critr_classement" value="<?php echo $cms->classement; ?>"/>
			<input type="hidden" name="critr_typeprod" value="<?php echo $cms->typeprod; ?>"/>
			<input type="hidden" name="critr_type" value="<?php echo $cms->type; ?>"/>
			<input type="hidden" name="critr_flag" value="<?php echo $cms->langue; ?>"/>
			<input type="hidden" name="idpageed" value="<?php echo $cms->pageed; ?>" /><!--id de la page éditée-->
			
			<input type="submit" name="back" value="Retour liste">
			
			<!--Affichage du block pour l'édition de la page-->
<?php		
			echo '<div class="lists">';
			while($pagerow=mysql_fetch_array($cms->lignepage)){ //Boucle sur une seule ligne par définition de $cms->lignepage
				echo '<table class="pages">';echo "\n";
					echo '<tr class="pagerow"><td>idord.</td><td>label</td><td>type</td><td>classement</td><td>constructeur</td>';echo "\n";
					echo '<td>type produit</td><td>urlrewrited</td><td>urlreal</td><td>Date parution</td></tr>';echo "\n";
					echo '<tr class="pagerow">';echo "\n";
						//idordered
						echo '<td>'.$pagerow[idordered].'</td>';echo "\n";
						//label
						echo '<td><input type="text" name="label'.$pagerow[idordered].'" value="'.utf8_encode($pagerow[label]).'" size="30" /></td>';echo "\n";
						//sélecteur de type
						echo '<td><select name="seltype'.$pagerow[idordered].'">';echo "\n";
						foreach($cms->optionstypepage as $option){
							$selectattrib=($option==utf8_encode($pagerow[typepage]))?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}
						echo '</select></td>';echo "\n";
						//sélecteur de classement
						echo '<td><select name="selclassement'.$pagerow[idordered].'">';echo "\n";
						foreach($cms->optionsclassement as $key=>$option){
							$selectattrib=($key==$pagerow[classement])?' selected ':' ';
							echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
						}
						echo '</select></td>';echo "\n";						
						//sélecteur de constructeur
						echo '<td><select name="selconstructeur'.$pagerow[idordered].'">';echo "\n";
						foreach($cms->optionsconstructeur as $option){
							$selectattrib=(utf8_encode($pagerow[constructeur])==$option)?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}						
						echo '</select></td>';echo "\n";
						//echo '<td><input type="text" size=16 name="constructeur'.$pagerow[idordered].'" value="'.$pagerow[constructeur].'">';echo "\n";												
						//sélecteur de type produit
						echo '<td><select name="seltypeprod'.$pagerow[idordered].'">';echo "\n";
						foreach($cms->optionstypeprod as $option){
							$selectattrib=(utf8_encode($pagerow[typeprod])==$option)?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}
						echo '</select></td>';echo "\n";
						//urlrewrited
						echo '<td><input type="text" name="urlrewrited'.$pagerow[idordered].'" value="'.stripslashes(utf8_encode($pagerow[urlrewrited])).'" size="30" /></td>';echo "\n";
						//urlreal
						echo '<td><input type="text" name="urlreal'.$pagerow[idordered].'" value="'.stripslashes(utf8_encode($pagerow[urlreal])).'" size="30" /></td>';echo "\n";
						//date de parution
						echo '<td><input type="date" name="dtpub'.$pagerow[idordered].'" value="'.$pagerow[date_parution].'"</td>';echo "\n";
						echo '</tr>';echo "\n";
				echo '</table>';echo "\n";					
			}
			mysql_data_seek($cms->lignepage,0);
			
			echo '<br />';
			echo '<input name="updatepage" type="image" src="images/bouton_appliquer.gif" alt="Apliquer les changements et revenir aux listes" onclick=""/>';
			echo '</div>';//fin du block d'édition
?>			
		</form><!--fin du formulaire-->
	</body>
</html>