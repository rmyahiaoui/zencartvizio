<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="classements_edition.css" />
		<title>CMS - Editeur des classements</title>
	</head>
	<body>
		<h3>Edition des classements</h3>
		<form name="form_editor" method="POST" action="">
			<!--input hidden pour garder en cache les crtitères de recherche existant avant le passage en mode édition-->
			<input type="hidden" name="critr_page" value="<?php echo $cms->page; ?>"/>
			<input type="hidden" name="critr_typepage" value="<?php echo $cms->typepage; ?>"/>
			<input type="hidden" name="critr_classement" value="<?php echo $cms->classement; ?>"/>
			<input type="hidden" name="critr_typeprod" value="<?php echo $cms->typeprod; ?>"/>
			<input type="hidden" name="critr_type" value="<?php echo $cms->type; ?>"/>
			<input type="hidden" name="critr_flag" value="<?php echo $cms->langue; ?>"/>
			
			<input type="submit" name="back" value="Retour liste">
			
<?php		
			echo '<br/>';
			echo '<table class="clts">';echo "\n";
				echo '<tr>';echo "\n";
					echo '<td>Catégorie</td>';
					echo '<td>Sous-Catégorie</td>';
				echo '</tr>';echo "\n";
				while($row=mysql_fetch_array($cms->jeuclassements)){
					echo '<tr>';echo "\n";
						echo '<td><input type="text" name="cat'.$row[id].'" value="'.utf8_encode($row[categorie]).'" size="30" /></td>';
						echo '<td><input type="text" name="souscat'.$row[id].'" value="'.utf8_encode($row[souscategorie]).'" size="30" /></td>';
					echo '</tr>';echo "\n";
				}
				mysql_data_seek($cms->jeuclassements,0);
			echo '</table>';echo "\n";				
			echo '<br />';
			echo '<input name="updateclts" type="image" src="images/bouton_appliquer.gif" alt="Apliquer les changements et revenir aux listes" onclick=""/>';
?>			
		</form><!--fin du formulaire-->
	</body>
</html>