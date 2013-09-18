<?php
require_once('xajax_core/xajax.inc.php');

function ajoutTxt($nb)
{		
		$reponse = new xajaxResponse();
		$numDiv = $nb+1;
		$select = '				
			<table border="0" style="border:0"><tr>
					<td style="text-align:left;width:102px;" rowspan="3">
						Le Texte
					</td>
				</tr>
				<tr>
					<td style="background:#efefef">	
						Sous-Titre&nbsp;	<input size="100" name="text_autre_ss_titre'.$numDiv.'"></input>
					</td>
					<td rowspan="2" style="background:white;width:20px;" id="plus'.$numDiv.'">
						<a href="" onclick="xajax_ajoutTxt('.$numDiv.'); return false;">
						<img src="images/plus_cms.jpg" />
						</a>
					</td>
				</tr>
				<tr>
					<td style="background:#efefef">
						Paragraphe <textarea style="width:718px;height:100px" name="text_autre_para'.$numDiv.'"></textarea>				
					</td>
				</tr>
			</table>';
		$reponse->assign('div'.$numDiv.'', 'innerHTML', $select);
		$reponse->assign('plus'.$nb.'', 'innerHTML', '');
        return $reponse;
}
function derouler() {
$reponse1 = new xajaxResponse();
$reponse1->assign('contentCMSFAQ', 'style', '');
$reponse1->assign('linkCMSFAQ', 'style', 'display:none');
return $reponse1;
}
function del() {
$reponse2 = new xajaxResponse();
$reponse2->clear('ref', 'value');
$reponse2->assign('ref', 'style', '');
return $reponse2;
}

$cms_faq = new xajax();			
$cms_faq->register(XAJAX_FUNCTION, 'ajoutTxt');
$cms_faq->register(XAJAX_FUNCTION, 'derouler');
$cms_faq->register(XAJAX_FUNCTION, 'del');
$cms_faq->processRequest();
$cms_faq->printJavascript(); 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="content_edition.css" />
		<title>CMS - Listes des pages et articles</title>
	</head>
	<body>
		<?php require_once("cms_mode.php"); ?>
		<form name="form_lists" method="POST" action=""><!--tous les champs de la page sont définis dans le même formulaire-->
			<!--Affichage du block pour sélecteurs de page, de classement, et de type d'article-->
			<fieldset>
				<legend>Critères de recherches ou d'ajout</legend>
					<ul class="menu">
						<li>Page : <select name="selpages">
							<?php 
								foreach($cms->optionspage as $key=>$option){
									$selectattrib=($key==$cms->page)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}					
							?>
							</select></li>
						<li>Type page : <select name="seltypespage">
							<?php 
								foreach($cms->optionstypepage as $key=>$option){
									$selectattrib=($key==$cms->typepage)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}					
							?>
							</select></li>
						<li><input type="submit" name="btnclassements" value="Classement"> <select name="selclassements">
							<?php 
								foreach($cms->optionsclassement as $key=>$option){
									$selectattrib=($key==$cms->classement)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}					
							?>
							</select></li>
						<li>Type Produit : <select name="seltypesprod">
							<?php 
								foreach($cms->optionstypeprod as $key=>$option){
									$selectattrib=($key==$cms->typeprod)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}					
							?>
							</select></li>
						<li>
							<input type="submit" name="filtrer" value="RECHERCHER">
						</li>
					</ul>
					<br/>
					<ul class="menu">
						<li>Type d'article : <select name="seltypes">
							<?php 
								foreach($cms->optionstype as $key=>$option){
									$selectattrib=($key==$cms->type)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">$option \n";
								}				
							?>			
							</select>
						</li>
						<li>Constructeur : <select name="selconstructeur">
							<?php 
								foreach($cms->optionsconstructeur as $option){
									$selectattrib=($cms->constructeur==$option)?' selected ':' ';
									echo "<option  $selectattrib value=\"$option\">$option \n";
								}				
							?>			
							</select>
						</li>						
							<!--boutons-drapeaux-->
						<?php 
							//Initialisation d'un tableau associatif key=langue, value=checked ou chaîne vide, pour l'attribut des boutons radio
							$selflagattribut["fr"]=($cms->langue=='fr')?"checked":"";
							$selflagattribut["en"]=($cms->langue=='en')?"checked":"";
							$selflagattribut["sp"]=($cms->langue=='sp')?"checked":"";
							$selflagattribut["it"]=($cms->langue=='it')?"checked":"";
							$selflagattribut["de"]=($cms->langue=='de')?"checked":"";

						?>
						<li class="flag">Langue : 
							<input type="radio" name="flag" value="fr" <?php echo $selflagattribut["fr"]; ?>><img id="flagfr" src="images/drapeau_fr.png" alt="Edition du texte French" title="Edition du texte French">
							<input type="radio" name="flag" value="en" <?php echo $selflagattribut["en"]; ?>><img id="flagen" src="images/drapeau_en.png" alt="Edition du texte English" title="Edition du texte English">
							<input type="radio" name="flag" value="sp" <?php echo $selflagattribut["sp"]; ?>><img id="flagsp" src="images/drapeau_sp.png" alt="Edition du texte Spanish" title="Edition du texte Spanish">
							<input type="radio" name="flag" value="it" <?php echo $selflagattribut["it"]; ?>><img id="flagit" src="images/drapeau_it.png" alt="Edition du texte Italian" title="Edition du texte Italian">
							<input type="radio" name="flag" value="de" <?php echo $selflagattribut["de"]; ?>><img id="flagde" src="images/drapeau_de.png" alt="Edition du texte Deutschland" title="Edition du texte Deutschland">
						</li>
						<li>
							<input type="submit" name="ajoutarticle" value="+article"> Ou
							<input type="submit" name="ajoutpage" value="+page">
						</li>
					</ul>		
					<br />		
			</fieldset>
			<br/>
			<a href="check_future.php" target=_new>Vérifier Parutions Futures</a> <br/>
			
<?php	
		if($cms->fairejeupages()>0){
			while($pagerow=mysql_fetch_array($cms->jeupages)){
				echo '<div class="lists">';
					echo '<table class="pages">';echo "\n";
						echo '<tr class="pagerow">';echo "\n";							
							echo '<td class="id"><input type="submit" name="btnpage" value="'.$pagerow[idordered].'" /></td>';echo "\n";
							echo '<td class="pagefld">(label)<br/><span class="bold">'.utf8_encode($pagerow[label]).'</span></td>';echo "\n";
							echo '<td class="pagefld">(type page)<br/><span class="bold">'.utf8_encode($pagerow[typepage]).'</span></td>';echo "\n";
							echo '<td class="pagefld">(constructeur)<br/><span class="bold">'.$pagerow[constructeur].'</span></td>';echo "\n";
							echo '<td class="pagefld">(type produit)<br/><span class="bold">'.$pagerow[typeprod].'</span></td>';echo "\n";
							echo '<td class="pagefld">(classement)<br/><span class="bold">'.utf8_encode($cms->optionsclassement[$pagerow[classement]]).'</span></td>';echo "\n";
							//echo '<td class="pagefld">(idordered)<br/><span class="bold">'.$pagerow[idordered].'</span></td>';echo "\n";
							echo '<td class="pagefld">(urlrewrited)<br/><span class="bold">'.stripslashes(utf8_encode($pagerow[urlrewrited])).'</span></td>';echo "\n";
							echo '<td class="pagefld">(urlreal)<br/><span class="bold">'.stripslashes(utf8_encode($pagerow[urlreal])).'</span></td>';echo "\n";
							echo '<td class="pagefld">(date parution)<br/><span class="bold">'.$pagerow[date_parution].'</span></td>';echo "\n";
							echo '<td class="bold"><input type="submit" name="supprpage" value="Suppr'.$pagerow[idordered].'" /></td>';echo "\n"; //cell vide sans taille fixe pour 'absorber' les variations dues à la taille en % de la table								
						echo '</tr>';echo "\n";
					echo '</table>';echo "\n";
					if($cms->fairejeuarticles($pagerow[idordered])>0){
					var_dump($cms->vardebug);
						//Affichage des articles et des textes
						while($articlerow=mysql_fetch_array($cms->jeuarticles)){
							echo '<table class="articles">';echo "\n";
								echo '<tr class="articlerow">';echo "\n";
									echo '<td class="id"><input type="submit" name="btnarticle" value="'.$articlerow[id].'" /></td>';echo "\n";
									//echo '<td class="articlefld">(page)<br/><span class="bold">'.utf8_encode($cms->optionspage[$articlerow[id_page]]).'</span></td>';echo "\n";
									echo '<td class="articlefld">(type article)<br/><span class="bold">'.utf8_encode($articlerow[type]).'</span></td>';echo "\n";
									echo '<td class="articlefld">(constructeur)<br/><span class="bold">'.$articlerow[constructeur].'</span></td>';echo "\n";
									//ligne suivante rajoutée en commentaire par SAM le 14/09/2011 car supprimée par ? pour raison inconnue
									//echo '<td class="champsarticle">produit hote</td><td>'.$articlerow[produit_hote].'</td>';echo "\n";
									echo '<td class="articlefld">(type produit)<br/><span class="bold">'.$articlerow[typeprod].'</span></td>';echo "\n";
									echo '<td class="articlefld">(publi)<br/><span class="bold">'.($articlerow[publi]==1?"Oui":"Non").'</span></td>';echo "\n";
									echo '<td class="articlefld">(ordre)<br/><span class="bold">'.$articlerow[ordre].'</span></td>';echo "\n";
									echo '<td class="articlefld">(url)<br/><span class="bold">'.stripslashes(utf8_encode($articlerow[url])).'</span></td>';echo "\n";
									echo '<td class="articlefld">(url_image)<br/><span class="bold">'.stripslashes(utf8_encode($articlerow[url_image])).'</span></td>';echo "\n";
									echo '<td class="articlefld">(date parution)<br/><span class="bold">'.$articlerow["date_parution"].'</span></td>';echo "\n";
									echo '<td class="bold"><input type="submit" name="supprarticle" value="Suppr'.$articlerow[id].'" /></td>';echo "\n"; //cell vide sans taille fixe pour 'absorber' les variations dues à la taille en % de la table
								echo '</tr>';echo "\n";
							echo '</table>';echo "\n";
							if($cms->fairejeutextes($articlerow[id])>0){
								echo '<table id="textes">';echo "\n";
								echo '<tr class="textrow"><td>N°</td><td>Format</td><td>Ord</td><td>Texte</td><td>Label</td><td>Maj</td></tr>';
								while($textrow=mysql_fetch_array($cms->jeutextes)){
									echo '<tr class="textes">';echo "\n";
										echo '<td>'.$textrow[id].'</td>';echo "\n";
										echo '<td>'.$textrow[format].'</td>';echo "\n";
										echo '<td>'.$textrow[ordre].'</td>';echo "\n";
										$textfield=$cms->langue."_text"; //le champ texte à afficher dépend de la langue 'active'
										echo '<td>'.stripslashes(utf8_encode($textrow[$textfield])).'</td>';echo " \n";
										echo '<td>'.utf8_encode($textrow[label]).'</td>';echo "\n";
										echo '<td>'.$textrow[dt_maj].'</td>';echo "\n";
									echo '</tr>';echo "\n";
								}
								echo '</table>';echo "\n";
							}
						}
						mysql_data_seek($cms->jeuarticles,0);
					}
				echo '</div>';echo "\n";
			}
		}
?>			
		</form><!--fin du formulaire-->
		
<!-- Ajout Rapiiiiiiiiiiiiiiiiiide -->

		<fieldset>
			<legend>Formulaire rapide d'ajout de questions techniques</legend>
			<input id="linkCMSFAQ" type="button" value="Derouler" style="" onclick="xajax_derouler(); return false;" />
		<div id="contentCMSFAQ" style="display:none">
			<form name="form_lists" method="POST" action="" >
			<input type="hidden" name="creer_page" />
			<table style="border:0">
			<tr><td style="background:#efefef">
			Langue
			</td>
			<td style="text-align:left">
				<input type="radio" name="flag" value="fr" <?php echo $selflagattribut["fr"]; ?>><img id="flagfr" src="images/drapeau_fr.png" alt="Edition du texte French" title="Edition du texte French">
				<input type="radio" name="flag" value="en" <?php echo $selflagattribut["en"]; ?>><img id="flagen" src="images/drapeau_en.png" alt="Edition du texte English" title="Edition du texte English">
				<input type="radio" name="flag" value="sp" <?php echo $selflagattribut["sp"]; ?>><img id="flagsp" src="images/drapeau_sp.png" alt="Edition du texte Spanish" title="Edition du texte Spanish">
				<input type="radio" name="flag" value="it" <?php echo $selflagattribut["it"]; ?>><img id="flagit" src="images/drapeau_it.png" alt="Edition du texte Italian" title="Edition du texte Italian">
				<input type="radio" name="flag" value="de" <?php echo $selflagattribut["de"]; ?>><img id="flagde" src="images/drapeau_de.png" alt="Edition du texte Deutschland" title="Edition du texte Deutschland">
			</td></tr>
							<tr>
					<td style="background:#efefef">
						<span>Type de Page</span style="color:red">
					</td>
					<td style="text-align:left">
						<select name="typepage3">
							<?php 
							foreach($cms->optionstypepage as $key=>$option){
									$selectattrib=($key==$cms->typepage)?' selected ':' ';
									echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}	
							?>
						</select>
					</td>
					</tr>
					
					<tr>
					<td style="background:#efefef">
						Classement
					</td>
					<td style="text-align:left">
						<select name="selclassements2">
							<?php 
							foreach($cms->optionsclassement as $key=>$option){
								$selectattrib=($key==$cms->classement)?' selected ':' ';
								echo "<option  $selectattrib value=\"$key\">".utf8_encode($option)." \n";
								}
							?>
						</select>
					</td>
					</tr>
					<tr>
					<td style="background:#efefef"> <p>Constructeur :</p> <p>Ref.produit :</p></td>
					<td  style="text-align:left">	
					<p>
						<select name="selconstructeur2">
							<?php 
								foreach($cms->optionsconstructeur as $option){
									$selectattrib=($cms->constructeur==$option)?' selected ':' ';
									echo "<option  $selectattrib value=\"$option\">$option \n";
								}				
							?>			
						</select>
					</p>
					<p>
						<input type="text" size="20" style="color:#CCC" name="refprod" id="ref" onclick="xajax_del(); return false;" value="Ex : EMP-600"/>
					</p>
					</td>
				</tr>
				<tr><td style="background:#efefef" >
					URL de la page</td><td style="text-align:left" ><input size="100" name="selpages1"></input><br/>
				</td></tr>
				<tr><td style="background:#efefef">
					Meta_title</td><td style="text-align:left"><input size="100" name="text_title" ></input><br/>
				</td></tr>
				
				<tr><td style="background:#efefef">
				Meta_keywords</td><td style="text-align:left"><input size="100" name="text_keywords"></input><br/>
				</td></tr>
				
				<tr><td style="background:#efefef">
				Meta_desc</td><td style="text-align:left"><input size="100" name="text_desc" ></input><br/>
				</td></tr>
				
				<tr>
					<td style="text-align:left" rowspan="4" id="test">
						Le Texte
					</td>
				</tr>
			<div  id="one">
				<tr>
					<td style="background:#efefef">
						<strong>Titre</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input size="100" name="text_autre_titre"></input>
					</td>
				</tr>
				<tr>
					<td style="background:#efefef">	
						Sous-Titre&nbsp;	<input size="100" name="text_autre_ss_titre"></input>
					</td>
					<td rowspan="2" style="background:white;width:20px;border:1px solid #CCC" id="plus1">
					<a href="" onclick="xajax_ajoutTxt(1); return false;">
					<img src="images/plus_cms.jpg" />
					</a>
					</td>
				</tr>
				<tr>
					<td style="background:#efefef">
						Paragraphe <textarea style="width:718px;height:100px" name="text_autre_para"></textarea>				
					</td>
				</tr>
			</div>
			
</table>
			<div id="div1"></div>
			<div id="div2"></div>
			<div id="div3"></div>
			<div id="div4"></div>
			<div id="div5"></div>
			<div id="div6"></div>
			<div id="div7"></div>
			<div id="div8"></div>
			<div id="div9"></div>
			<div id="div10"></div>
			
		<input type="hidden" name="selpages" value="<?php echo $_POST['selpages']; ?>" />	
			
		<input type="submit" value="Enregistrer"/>
	</form>	
	</div>
</fieldset>
			<?php
			// Page

					
						if(isset($_POST['text_autre_titre']) AND !empty($_POST['text_autre_titre'])) {
						
						$sqlSEL= 'SELECT max(idordered) from eb_pages';
						mysql_query("SET NAMES 'utf8'");
						$idorder = mysql_query($sqlSEL);
						$idorder = mysql_fetch_row($idorder);
						$idorderer = $idorder[0]+1;
						if (isset($_POST['refprod']) OR $_POST['refprod'] == "Ex : EMP-600") {
							$refprod  = "";
						} else {
							$refprod = $_POST['refprod'];
						}
							
							$sql= 'INSERT INTO eb_pages (label,typepage,idordered,constructeur,refprod,urlrewrited,urlreal,classement) VALUES ("'.mysql_real_escape_string($_POST['selpages1']).'","'.$_POST['typepage3'].'", '.$idorderer.', "'.$_POST['selconstructeur2'].'","'.mysql_real_escape_string($refprod).'","'.mysql_real_escape_string($_POST['selpages1']).'", "'.mysql_real_escape_string($_POST['selpages1']).'", "'.$_POST['selclassements2'].'")';
							mysql_query($sql) or die('Erreur SQL1 !<br />'.$sql.'<br />'.mysql_error());
							$last_id = mysql_insert_id();
						
			//Article
							//Meta_title
							$sql= 'INSERT INTO eb_articles (id_page,type,publi,ordre) VALUES ('.$idorderer.', "Meta_Title", 1, 4)';
							mysql_query($sql) or die('Erreur SQL2 !<br />'.$sql.'<br />'.mysql_error());
							$last_id_title = mysql_insert_id();
							$sql= 'INSERT INTO eb_texts (id_article,ordre, '.$_POST['flag'].'_text) VALUES ('.$last_id_title.',1, "'.mysql_real_escape_string($_POST['text_title']).'")';
							mysql_query($sql) or die('Erreur SQL3 !<br />'.$sql.'<br />'.mysql_error());
							//Meta_keyword
							$sql= 'INSERT INTO eb_articles (id_page,type,publi,ordre) VALUES ('.$idorderer.',"Meta_Keywords",1,3)';
							mysql_query($sql) or die('Erreur SQL4 !<br />'.$sql.'<br />'.mysql_error());
							$last_id_keyword = mysql_insert_id();
							$sql= 'INSERT INTO eb_texts (id_article,ordre, '.$_POST['flag'].'_text) VALUES ('.$last_id_keyword.',1, "'.mysql_real_escape_string($_POST['text_keywords']).'")';
							mysql_query($sql) or die('Erreur SQL5 !<br />'.$sql.'<br />'.mysql_error());
							//Meta_Desc
							$sql= 'INSERT INTO eb_articles (id_page,type,publi,ordre) VALUES ('.$idorderer.',"Meta_Desc",1,2)';
							mysql_query($sql) or die('Erreur SQL6 !<br />'.$sql.'<br />'.mysql_error());
							$last_id_desc = mysql_insert_id();
							$sql= 'INSERT INTO eb_texts (id_article,ordre, '.$_POST['flag'].'_text) VALUES ('.$last_id_desc.',1, "'.mysql_real_escape_string($_POST['text_desc']).'")';
							mysql_query($sql) or die('Erreur SQL7 !<br />'.$sql.'<br />'.mysql_error());
							//Autre
							$sql= 'INSERT INTO eb_articles (id_page,type,publi,ordre) VALUES ('.$idorderer.',"Autre",1,1)';
							mysql_query($sql) or die('Erreur SQL8 !<br />'.$sql.'<br />'.mysql_error());
							$last_id_autre = mysql_insert_id();
							$postTitre = $_POST['text_autre_titre'];
							// $postSsTitre = '<h2>'.$_POST['text_autre_ss_titre'].'</h2>';
							
							$postPara = '<h2>'.$_POST['text_autre_ss_titre'].'</h2>';
							$postPara .= '<p>'.$_POST['text_autre_para'].'<p>';
							for($i = 1; $i <= 10; $i++) {
								// if (!empty($_POST['text_autre_ss_titre'.$i.''])) {
									// $postSsTitre .= '<h2>'.$_POST['text_autre_ss_titre'.$i.''].'</h2>';
								// }
								if (!empty($_POST['text_autre_ss_titre'.$i.''])) {
									$postPara .= '<h2>'.$_POST['text_autre_ss_titre'.$i.''].'</h2>';
								}
								if (!empty($_POST['text_autre_para'.$i.''])) {
									$postPara .= '<p>'.$_POST['text_autre_para'.$i.''].'</p><br/>';
								}
							}
							
							$sql1= 'INSERT INTO eb_texts (id_article,format,ordre, '.$_POST['flag'].'_text) VALUES ('.$last_id_autre.',"Titre", 1, "'.mysql_real_escape_string($postTitre).'")';
							$sql3= 'INSERT INTO eb_texts (id_article,format,ordre,'.$_POST['flag'].'_text) VALUES ('.$last_id_autre.',"Paragraphe", 3, "'.mysql_real_escape_string($postPara).'")';
							mysql_query($sql1) or die('Erreur SQL9 !<br />'.$sql1.'<br />'.mysql_error());
							mysql_query($sql3) or die('Erreur SQL11 !<br />'.$sql3.'<br />'.mysql_error());
							echo '<h3>Page/article ajoutée</h3>';
							// $sql2= 'INSERT INTO eb_texts (id_article,format,ordre,'.$_POST['flag'].'_text) VALUES ('.$last_id_autre.',"Sous-titre", 2, "'.mysql_real_escape_string($postSsTitre).'")';
							// mysql_query($sql2) or die('Erreur SQL10 !<br />'.$sql2.'<br />'.mysql_error());
							
						}
			?>
	</body>
</html>