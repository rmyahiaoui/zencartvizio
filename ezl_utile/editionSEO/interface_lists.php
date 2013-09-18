<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="interface_editor.css" />
		<title>CMS - Gestion des éléments d'interface</title>
	</head>
	<body>
	<?php 
	require_once("cms_mode.php");//affiche le formulaire permettant de changer le mode du cms (editorial,images,interface)
	
	echo '<form id="form_gest_elts" name="form_gest_elts" method="post" action="cms.php">';echo "\n";
	echo '<input type="hidden" name="mode" value="'.$cms->mode.'" />';echo "\n";
	echo '<fieldset>';echo "\n";
	echo '<legend>Sélection / Ajout</legend>';echo "\n";
	echo '<div class="clearboth">';echo "\n";
			echo '<ul>';echo "\n";
				echo '<li class="left">Elément : <select name="selelement" onchange="document.getElementById(\'form_gest_elts\').submit();">';echo "\n";
					foreach($cms->css_id_elts as $css_id_elt){
						$selectattrib=($css_id_elt==$cms->css_id_elt)?' selected ':' ';
						echo "<option  $selectattrib value=\"$css_id_elt\">".$css_id_elt." \n";
					}					
				echo '</select></li>';echo "\n";
				echo '<li class="left">de type: <select name="seltype">';echo "\n";
					foreach($cms->type_elts as $type_elt){
						$selectattrib=($type_elt==$cms->type_elt)?' selected ':' ';
						echo "<option  $selectattrib value=\"$type_elt\">".$type_elt." \n";
					}						
				echo '</select></li>';echo "\n";
				echo '<li class="left">Recherche : <input type="text" name="selcritere" size="30" title="Taper le(s) terme(s) à rechercher dans href, title, maintext" value="'.$cms->crit_rech.'"> 
				<input type="submit" name="dispelts" value="afficher">';echo "\n";
			echo '</ul>';echo "\n";
			echo '<br class="clearboth"/>';
			echo '<br/>';
			echo '<label for="newcssid" style="margin-left:45px;">Nouvel élément : </label><input type="text" name="newcssid" size="20" title="Taper le ccs_id" value="">  
			<input type="submit" name="addelt" value="ajouter">  <input type="submit" name="copyelt" value="copier">';echo "\n";
	echo '</div>';echo "\n";
	echo '</fieldset>';echo "\n";
	
	echo '<fieldset>';echo "\n";
	echo '<legend>Liste</legend>';echo "\n";
	echo '<div class="clearboth">';echo "\n";
	if ($cms->fairejeuelements()>0){
		echo '<table id="elements">';echo "\n";
		
			echo '<tr>';echo "\n";
				echo '<td style="font-weight:bold;">css_id</td>';echo "\n";
				echo '<td style="background-color: #A5FF7F;font-weight:bold;">href</td>';echo "\n";
				echo '<td style="background-color: #FF6500;font-weight:bold;">title</td>';echo "\n";
				echo '<td style="background-color: #FFE242;font-weight:bold;">maintext</td>';echo "\n";
			echo '</tr>';echo "\n";
			
		while($row=mysql_fetch_array($cms->jeuelements)){				
				
				echo '<tr>';echo "\n";
					echo '<td style="background-image:URL(images/flaglist_'.$row["langue"].'.png);padding-left:33px;"><input id="btnelt" type="submit" name="btnelt" value="'.$row[css_id].'" /></td>';echo "\n";
					echo '<td style="background-color: #A5FF7F;">'.$row[href].'</td>';echo "\n";
					echo '<td style="background-color: #FF6500;">'.$row[title].'</td>';echo "\n";
					echo '<td style="background-color: #FFE242;">'.$row[maintext].'</td>';echo "\n";
				echo '</tr>';echo "\n";
						
		}
		echo '</table>';echo "\n";
	}
	echo '</div>';echo "\n";
	echo '</fieldset>';echo "\n";
	echo '</form>';echo "\n";
	?>
	</body>