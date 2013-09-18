<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="content_edition.css" />
		<!--<script type="text/javascript" src="content_edition.js"></script>-->
		<title>CMS Easylamps - Editeur</title>
	</head>
	<body>
		<h3><?php echo "Edition en $cms->langue de l'article $cms->article / Texte n° $cms->texte"; ?></h3>
		<form name="form_editor" enctype="multipart/form-data" method="POST" action=""><!--1 formulaire pour la page/enctype spécifié pour l'upload d'image-->
			<!--input hidden pour garder en cache les crtitères de recherche existant avant le passage en mode édition-->
			<input type="hidden" name="critr_page" value="<?php echo $cms->page; ?>"/>
			<input type="hidden" name="critr_typepage" value="<?php echo $cms->typepage; ?>"/>
			<input type="hidden" name="critr_classement" value="<?php echo $cms->classement; ?>"/>
			<input type="hidden" name="critr_typeprod" value="<?php echo $cms->typeprod; ?>"/>
			<input type="hidden" name="critr_type" value="<?php echo $cms->type; ?>"/>
			<input type="hidden" name="critr_flag" value="<?php echo $cms->langue; ?>"/>
			<input type="hidden" name="idart" value="<?php echo $cms->article; ?>" /> <!--id de l'article édité-->
			
			<input type="submit" name="back" value="Retour liste">
			<ul class="menu">
				<li>Ajouter un texte
						<input type="submit" name="ajouttexte" value="+ Texte" /></li>
				<li>Choisir une image <input type="file" name="fichier_choisi"></li>
				<li>L'envoyer vers <input type="text" name="imgDestination" size="20" value="../../hpl_images/">
				<li><input type="submit" name="upload" value="Envoyer"></li>
			</ul>
			
			<!--Affichage du block pour l'édition de l'article-->
<?php		
			echo '<div class="lists">';
			while($articlerow=mysql_fetch_array($cms->lignearticle)){ //Boucle sur une seule ligne par définition de $cms->lignearticle
				echo '<table class="articles">';echo "\n";
					echo '<tr class="articlerow"><td>N°</td><td>Page</td><td>Type article</td><td>Constructeur</td><td>Produit hôte</td>';echo "\n";
					echo '<td>Type produit</td><td>Publi</td><td>Ordre</td><td>URL</td><td>URL-IMAGE</td><td>Date parution</td></tr>';echo "\n";
					echo '<tr class="articlerow">';echo "\n";
						//id
						echo '<td>'.$articlerow[id].'</td>';echo "\n";
						//page
						//echo '<td>'.utf8_encode($cms->optionspage[$articlerow[id_page]]).'</td>';echo "\n";
						echo '<td><select name="selpage'.$articlerow[id].'">'; 
								foreach($cms->optionspage as $key=>$option){
									$selectattrib=($key==$articlerow[id_page])?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}					
						echo '</select></td>';echo "\n";
						//sélecteur de type
						echo '<td><select name="seltype'.$articlerow[id].'">';echo "\n";
						foreach($cms->optionstype as $option){
							$selectattrib=(utf8_encode($articlerow[type])==$option)?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}
						echo '</select></td>';echo "\n";
						//sélecteur de constructeur
						echo '<td><select name="selconstructeur'.$articlerow[id].'">';echo "\n";
						foreach($cms->optionsconstructeur as $option){
							$selectattrib=(utf8_encode($articlerow[constructeur])==$option)?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}						
						echo '</select></td>';echo "\n";
						echo '<td><input type="text" size=10 name="produit_hote'.$articlerow[id].'" value="'.$articlerow[produit_hote].'">';echo "\n";												
						//sélecteur de type produit
						echo '<td><select name="seltypeprod'.$articlerow[id].'">';echo "\n";
						foreach($cms->optionstypeprod as $option){
							$selectattrib=(utf8_encode($articlerow[typeprod])==$option)?' selected ':' ';
							echo "<option  $selectattrib value=\"$option\">$option \n";
						}
						echo '</select></td>';echo "\n";
						//case à cocher (CAC) Publi
						echo '<td>'.$cms->faireCACPubli($articlerow[id],$articlerow[publi]).'</td>';echo "\n";
						//input ordre
						echo '<td><input type="text" name="ordart'.$articlerow[id].'" value="'.$articlerow[ordre].'" size="2" /></td>';echo "\n";
						//input url
						echo '<td><input type="text" name="urlart'.$articlerow[id].'" value="'.stripslashes(utf8_encode($articlerow[url])).'" size="30" /></td>';echo "\n";
						//url_image (Read-only; choix par les boutons)
						echo '<td>'.stripslashes(utf8_encode($articlerow[url_image])).'</td>';echo "\n";
						//date de parution
						echo '<td><input type="date" name="dtpub'.$articlerow[id].'" value="'.$articlerow[date_parution].'"</td>';echo "\n";
						echo '</tr>';echo "\n";
				echo '</table>';echo "\n";		
				//Et pour chaque article, affichage des textes qui le composent
				if($cms->fairejeutextes($articlerow[id])){
					echo '<table id=textes>';echo "\n";
					echo '<tr class="textrow"><td>N°</td><td>Format</td><td>Ordre</td><td>Texte</td><td>Label</td><td>Maj</td></tr>';echo "\n";
					While($textrow=mysql_fetch_array($cms->jeutextes)){
						echo '<tr class="textes">';echo "\n";
							//id
							echo '<td><input type="submit" name="btntexte" value="'.$textrow[id].'" /></td>';echo "\n";
							//sélecteur de format
							echo '<td ><select name="selformat'.$textrow[id].'">';echo "\n";
							foreach($cms->optionsformat as $option){
								$selectattrib=(utf8_encode($textrow[format])==$option)?' selected ':' ';
								echo "<option  $selectattrib value=\"$option\">$option \n";									
							}								
							echo '</select></td>';echo "\n";
							//input ordre
							echo '<td><input size="2" type="text" name="ordtxt'.$textrow[id].'" value="'.$textrow[ordre].'" size="2" /></td>';echo "\n";
							//texte
							$textfield=$cms->langue."_text"; //le champ texte à afficher dépend de la langue 'active'
							echo '<td>'.stripslashes(utf8_encode($textrow[$textfield])).'</td>';echo " \n";
							//label
							echo '<td><input type="text" name="lbltxt'.$textrow[id].'" value="'.utf8_encode($textrow[label]).'" /></td>';echo "\n";
							//date de dernière mise à jour
							echo '<td>'.$textrow[dt_maj].'</td>';echo "\n";
							echo '<td><input type="submit" name="supprtexte" value="Suppr'.$textrow[id].'" /></td>';echo "\n";
						echo '</tr>';echo "\n";
					}
					mysql_data_seek($cms->jeutextes,0);
					echo '</table>';echo "\n";
				}				
			}
			mysql_data_seek($cms->lignearticle,0);
			
			//Affichage de la zone d'édition des textes
			echo '<textarea id="editeurHTML" name="editeurHTML">';
				echo $cms->texteloc;
			echo '</textarea>';
			//input hidden pour passer 'en cache' l'id du texte édité, nécessaires pour l'update le cas échéant
			echo '<input type="hidden" name="textid" value="'.$cms->texte.'"/>';echo "\n";
			echo '<br />';
			echo '<input name="update" type="image" src="images/bouton_appliquer.gif" alt="Apliquer les changements et revenir aux listes" onclick=""/>';
			echo '</div>';//fin du block d'édition
?>			
		</form><!--fin du formulaire-->
	</body>
</html>