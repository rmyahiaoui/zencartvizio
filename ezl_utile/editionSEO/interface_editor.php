<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="interface_editor.css" />
		<title>CMS - Gestion des éléments d'interface</title>
	</head>
	<body>
		<form id="form_gest_elts" name="form_gest_elts" method="post" action="cms.php">
			<input type="hidden" name="critr_elted" value="<?php echo $cms->elted; ?>"/>
			<input type="hidden" name="critr_type" value="<?php echo $cms->type_elt; ?>"/>
			<input type="hidden" name="critr_rech" value="<?php echo $cms->crit_rech; ?>"/>
			<input type="submit" name="backelts" value="Retour liste">
	<?php 
	
	echo '<input type="hidden" name="mode" value="'.$cms->mode.'" />';echo "\n";
	
	echo '<fieldset>';echo "\n";
	echo '<legend>Edition</legend>';echo "\n";
	echo '<div class="clearboth">';echo "\n";
	if ($cms->elted<>''){//si un élément est sélectionné
		$enumlang=ezl_utile::renvoiValeursEnum('hpl_elts_localises','langue');
		foreach($enumlang as $langue){
			$sqlelts='SELECT * FROM hpl_elts_localises WHERE css_id="'.$cms->elted.'" AND langue="'.$langue.'"';
			$qryelts=mysql_query($sqlelts) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Si il existe une localisation pour l'élément, on récupère les valeurs
			// et on construit les names du form avec des tableaux pour gérer la sauvegarde
			if (mysql_num_rows($qryelts)>0){
				while($row=mysql_fetch_array($qryelts)){
					echo '<div class="left">';echo "\n";						
							echo '<input type="hidden" name="uid[]" value="'.$row["uid"].'" />';echo "\n";
							echo '<input type="hidden" name="langue['.$row["uid"].']" value="'.$row["langue"].'" />';echo "\n";
							echo '<ul>';echo "\n";
								echo '<li style="background-image:URL(../../hpl_images/flaglist_'.$row["langue"].'.png);background-position: 0px,3px;padding-left: 35px;">'.strtoupper($row["langue"]).'</li>';echo "\n";
								echo '<li><span>css_id</span><input type="text" name="css_id['.$row["uid"].']" size="50" value="'.$row["css_id"].'"/ ></li>';echo "\n";
								echo '<li><span>type</span><input type="text" name="type['.$row["uid"].']" size="50" value="'.$row["type"].'" /></li>';echo "\n";
								echo '<li><span>href</span><input type="text" name="href['.$row["uid"].']" size="50" value="'.$row["href"].'" /></li>';echo "\n";
								echo '<li><span>title</span><input type="text" name="title['.$row["uid"].']" size="50" value="'.$row["title"].'" /></li>';echo "\n";
								echo '<li><span>maintext</span><input type="text" name="maintext['.$row["uid"].']" size="50" value="'.$row["maintext"].'" /></li>';echo "\n";
								echo '<li><span>src</span><input type="text" name="src['.$row["uid"].']" size="50" value="'.$row["src"].'" /></li>';echo "\n";
								echo '<li><span>alt</span><input type="text" name="alt['.$row["uid"].']" size="50" value="'.$row["alt"].'" /></li>';echo "\n";
								echo '<li><span>style</span><textarea name="style['.$row["uid"].']" cols="40" rows="3" />'.$row["style"].'</textarea></li>';echo "\n";
							echo '</ul>';echo "\n";						
					echo '</div>';echo "\n";
				}
			}
			//Sinon l'élément n'a pas fait encore l'objet d'une localisation,
			//on construit un form vierge de données avec des names bien différenciés
			//car la sauvegarde devra engendrer un insert et non un update
			else{ 
				echo '<div class="left">';echo "\n";
						echo '<input type="hidden" name="missing" value="missing" />';echo "\n";
						echo '<input type="hidden" name="langue_missing" value="'.$langue.'" />';echo "\n";
						echo '<ul>';echo "\n";
							echo '<li style="background-image:URL(../../hpl_images/flaglist_'.$langue.'.png);background-position: 0px,3px;padding-left: 35px;">'.strtoupper($langue).'</li>';echo "\n";
							echo '<li><span>css_id</span><input type="text" name="css_id_missing" size="50" value=""/ ></li>';echo "\n";
							echo '<li><span>type</span><input type="text" name="type_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>href</span><input type="text" name="href_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>title</span><input type="text" name="title_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>maintext</span><input type="text" name="maintext_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>src</span><input type="text" name="src_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>alt</span><input type="text" name="alt_missing" size="50" value="" /></li>';echo "\n";
							echo '<li><span>style</span><input type="textarea" class="inputarea" name="style_missing" cols="80" rows="2" value="" /></li>';echo "\n";							
						echo '</ul>';echo "\n";					
				echo '</div>';echo "\n";				
			}
		}
	}
		echo '<div class="clearboth"><input type="submit" name="safeelt" value="SAUVEGARDER" />      <input type="submit" name="supprelt" value="SUPPRIMER" /></div>';echo "\n";
	echo '</div>';echo "\n";
	echo '</fieldset>';echo "\n";
	
	echo '</form>';echo "\n";
	?>
	</body>