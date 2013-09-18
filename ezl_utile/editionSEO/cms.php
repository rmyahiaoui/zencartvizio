<?php
require_once('../../ezl_page.php'); 
require_once('../../ezl_utile.php'); 
require_once('../../ezl_langue.php'); 
require_once('../../catalog/main.php');


//Classe de base du CMS
class cms{

	//Attributs pour l'editeur de contenu
	
	//code du mode sur 3 caractères (txt pour textes, img pour images,...) pour afficher la gestion des textes ou l'upload des images
	public $mode;
	
	//Tableaux des options pour les sélecteurs des critères de recherche
	public $optionspage=array();
	public $optionstypepage=array();
	public $optionsclassement=array();
	public $optionstype=array();	
	public $optionsconstructeur=array();
	public $optionstypeprod=array();
	public $optionsformat=array();
	
	//Suivi des indices des sélecteurs des critères de recherche
	public $page;
	public $typepage;
	public $classement;
	public $typeprod;
	public $type;
	public $constructeur;
	public $langue;
	public $article;
	public $pageed;
	public $elted;
	
	//Jeux, ligne et texte résultant des critères
	public $jeupages;
	public $jeuarticles;
	public $jeutextes;
	public $jeuclassements;
	public $jeuelements;
	public $lignepage;
	public $lignearticle;
	public $texte; //id du texte passé en mode édition	
	public $texteloc; // chaîne du texte localisé (chaîne fr, chaîne en,...)
	
	//Attributs pour l'editeur de l'interface
	public $type_elts=array();//Tableau des options pour le sélecteur de type d'élément
	public $css_id_elts=array();//Tableau des css_id des éléments
	public $type_elt;//type de l'élément sélectionné
	public $css_id_elt; //css_id de l'élément sélectionné
	public $crit_rech; //chaîne recherchée dans [href],[title],[maintext]
	
	//Variable de débogage à initialiser avec la variable à tracer
	//et à afficher par : var_dump($instance->vardebug) où instance = this||nom d'instanciation
	public $vardebug;
	
	Public function __construct(){
		
		//Initialisation suivant le mode
		$this->mode = isset($_POST['mode'])?$_POST['mode']:"txt";
		switch($this->mode){
			case "txt":
				$this->initContentEditor();
				break;
			case "img":
				return; //pas d'initialisation nécessaire
				break;
			case "inter":
				$this->initInterfaceEditor();
				break;			
			default:
				return;
		}

	}//Fin de __construct()
	
	Private function initContentEditor(){
		
		//Initialisation du contexte
		if(isset($_POST['back'])||isset($_POST['update_x'])||isset($_POST['updatepage_x'])||isset($_POST['btntexte'])){
			$this->page=$_POST['critr_page'];
			$this->typepage=$_POST['critr_typepage'];
			$this->classement=$_POST['critr_classement'];
			$this->typeprod=$_POST['critr_typeprod'];
			$this->type=$_POST['critr_type'];
			$this->langue=$_POST['critr_flag'];
		}
		else{
			$this->page = isset($_POST['selpages'])?$_POST['selpages']:0; 
			$this->typepage = isset($_POST['seltypespage'])?$_POST['seltypespage']:0;
			$this->classement = isset($_POST['selclassements'])?$_POST['selclassements']:0;
			$this->typeprod = isset($_POST['seltypesprod'])?$_POST['seltypesprod']:0;
			$this->type = isset($_POST['seltypes'])?$_POST['seltypes']:0;
			$this->constructeur = isset($_POST['selconstructeur'])?$_POST['selconstructeur']:'';
			$this->langue = isset($_POST['flag'])?$_POST['flag']:'fr'; //français par défaut		
			$this->article = isset($_POST['btnarticle'])?$_POST['btnarticle']:0;//Sans article sélectionné, article=0
			$this->pageed = isset($_POST['btnpage'])?$_POST['btnpage']:0;//Sans article sélectionné, article=0
		}
		
		//Options du sélecteur de page
		$this->remplirselecteurpage();
		
		//Options du sélecteur de type page
		$enumtypes=ezl_utile::renvoiValeursEnum('eb_pages','typepage');
		foreach($enumtypes as $type){
			$this->optionstypepage[]=$type;
		}		
		
		//Options du sélecteur de classement
		$this->remplirselecteurclassement();
		
		//Options du sélecteur de constructeur
		$this->optionsconstructeur[]='';
		$sql="SELECT DISTINCT libelle_constructeur FROM el_v_constructeurs";
		$jeu=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		while($row = mysql_fetch_array($jeu)){ //parcours de la liste des constructeurs définis
			$this->optionsconstructeur[]=$row[libelle_constructeur]; //pour ajout au tableau du sélecteur
		}
		
		//Options du sélecteur de typeproduit
		$this->optionstypeprod[]='';
		$sql="SELECT DISTINCT manufacturers_name FROM manufacturers";
		$jeu=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		while($row = mysql_fetch_array($jeu)){ //parcours de la liste des constructeurs définis
			$this->optionstypeprod[]=$row[manufacturers_name]; //pour ajout au tableau du sélecteur
		}

		//Options du sélecteur de type article
		//la 1ère option du sélecteur est une chaîne vide (<=>'aucune')		
		$this->optionstype[]=' ';//Indice implicite à 0 => option par défaut (cf-//Sélection(s))
		$enumtypes=ezl_utile::renvoiValeursEnum('eb_articles','type');
		foreach($enumtypes as $type){
			$this->optionstype[]=utf8_encode($type);
		}		
		
		//Options du sélecteur de format (de texte)
		$enumtypes=ezl_utile::renvoiValeursEnum('eb_texts','format');
		foreach($enumtypes as $type){
			$this->optionsformat[]=utf8_encode($type);
		}		
		
		//Si une page est éditée, ligne de page 
		if($this->pageed>0){
			$this->fairelignepage($this->pageed);
		}
		
		//Si un article est édité, ligne de l'article sélectionné 
		if($this->article>0){
			$this->fairelignearticle($this->article);
		}
		
		//Traitement des demandes (ajout, suppression, édition,...)
		$this->checkOtherPOSTValues();	
	}
	
	Private function initInterfaceEditor(){
		
		if(isset($_POST['backelts'])||isset($_POST['safeelt'])||isset($_POST['supprelt'])){
			$this->css_id_elt=$_POST['critr_elted'];
			$this->type_elt=$_POST['critr_type'];
			$this->crit_rech=$_POST['critr_rech'];
		}
		else{
			isset($_POST['selelement'])?$this->css_id_elt=$_POST['selelement']:$this->css_id_elt='';
			isset($_POST['seltype'])?$this->type_elt=$_POST['seltype']:$this->type_elt='';
			isset($_POST['selcritere'])?$this->crit_rech=$_POST['selcritere']:$this->crit_rech='';
			isset($_POST['btnelt'])?$this->elted=$_POST['btnelt']:$this->elted="";//Sans élément sélectionné, element=chaîne vide
		}
		
		//Ajout d'élément
		if(isset($_POST['addelt'])){
			empty($_POST['newcssid'])?$this->css_id_elt="newcssid":$this->css_id_elt=$_POST['newcssid'];
			//recherche d'un css_id identique préexistant
			$sql='SELECT css_id FROM hpl_elts_localises WHERE css_id="'.$this->css_id_elt.'"';
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//si css_id non préexistant
			if (mysql_num_rows($qry)==0){
				$enumlang=ezl_utile::renvoiValeursEnum('hpl_elts_localises','langue');
				foreach($enumlang as $langue){ //ajout d'autant de localisations d'élément qu'il y a de langue				
					$sql='INSERT INTO hpl_elts_localises (css_id,type,langue) VALUES ("'.$this->css_id_elt.'","'.$this->type_elt.'","'.$langue.'")';
					mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
				}	
			}
			else{ //si css_id préexistant
				echo 'VOTRE DEMANDE N\'A PU ETRE PRISE EN COMTE CAR IL EXISTE DEJA UN ELEMENT AYANT LE MEME CSS_ID';				
			}
			
		}
		
		//Copie d'élément
		if(isset($_POST['copyelt'])){
			if(!empty($_POST['selelement'])){			
				empty($_POST['newcssid'])?$this->css_id_elt="newcssid":$this->css_id_elt=$_POST['newcssid'];
				//recherche d'un css_id identique préexistant
				$sql='SELECT css_id FROM hpl_elts_localises WHERE css_id="'.$this->css_id_elt.'"';
				$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
				//si pas de css_id préexistant
				if (mysql_num_rows($qry)==0){
					$sqlElts='SELECT * FROM hpl_elts_localises WHERE css_id="'.$_POST['selelement'].'"';
					$qryElts=mysql_query($sqlElts) or die('Erreur SQL !<br />'.$sqlElts.'<br />'.mysql_error());
					while($row = mysql_fetch_array($qryElts)){
						$sqlElt='INSERT INTO hpl_elts_localises (langue,css_id,type,href,title,maintext,src,alt,style) VALUES 
						("'.$row['langue'].'","'.$this->css_id_elt.'","'.$row['type'].'","'.$row['href'].'","'.$row['title'].'",
						"'.$row['maintext'].'","'.$row['src'].'","'.$row['alt'].'","'.$row['style'].'")';
						$qryElt=mysql_query($sqlElt) or die('Erreur SQL !<br />'.$sqlElt.'<br />'.mysql_error());
					}
				}
				else{ //si css_id préexistant
					echo 'VOTRE DEMANDE N\'A PU ETRE PRISE EN COMTE CAR IL EXISTE DEJA UN ELEMENT AYANT LE MEME CSS_ID';				
				}
			}
			else{
				echo 'VOUS N\'AVEZ PAS SELECTIONNE L\'ELEMENT A COPIER';
			}
		}
		
		//Suppression de l'élément actif
		if(isset($_POST['supprelt'])){
			$sql='DELETE FROM hpl_elts_localises WHERE css_id="'.$this->css_id_elt.'"';
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$this->css_id_elt=$this->css_id_elts[0];
		}
		
		//Sauvegarde des localisations de l'élément actif
		if(isset($_POST['safeelt'])){
			foreach($_POST as $field=>$value){
				if($field=='uid'){
					foreach($value as $key=>$data){
						$sql='UPDATE hpl_elts_localises SET langue="'.$_POST['langue'][$data].'",
						css_id="'.$_POST['css_id'][$data].'",
						type="'.$_POST['type'][$data].'",
						href="'.$_POST['href'][$data].'",
						title="'.$_POST['title'][$data].'",
						maintext="'.$_POST['maintext'][$data].'",
						src="'.$_POST['src'][$data].'",
						alt="'.$_POST['alt'][$data].'",
						style="'.$_POST['style'][$data].'" WHERE uid='.$data;
						mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					}
				}
			}
			if(isset($_POST['missing'])){
				//Ajout localisation pour l'élément
				$sql='INSERT INTO hpl_elts_localises (langue,css_id,type,href,title,maintext,src,alt,style) 
				VALUES ("'.$_POST['langue_missing'].'","'.$_POST['css_id_missing'].'","'
				.$_POST['type_missing'].'","'.$_POST['href_missing'].'","'
				.$_POST['title_missing'].'","'.$_POST['maintext_missing'].'","'
				.$_POST['src_missing'].'","'.$_POST['alt_missing'].'","'
				.$_POST['style_missing'].'")';
				mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			}
		}
				
		//Options du sélecteur d'élément
		$this->css_id_elts[]=''; //1er élément de liste vide
		$sql="SELECT css_id FROM hpl_elts_localises GROUP BY css_id";
		$query=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		while($row = mysql_fetch_array($query)){
			$this->css_id_elts[]=$row['css_id'];//ajout au tableau du sélecteur
		}
		
		//Options du sélecteur de type
		$this->type_elts[]=''; //1er élément de liste vide
		$enumtypes=ezl_utile::renvoiValeursEnum('hpl_elts_localises','type');
		foreach($enumtypes as $type){
			$this->type_elts[]=$type;
		}

	}
	
	Private function initPageEditor(){
		
		//Ajout d'élément
		if(isset($_POST['addelt'])){
			empty($_POST['newpage'])?$pagelabel="newpage":$pagelabel=$_POST['newpage'];
			//recherche d'un css_id identique préexistant
			$sql='SELECT label FROM eb_pages WHERE label="'.$pagelabel.'"';
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//si pas de label préexistant
			if (mysql_num_rows($qry)==0){
				$sql='INSERT INTO eb_pages (label,type) VALUES ("'.$pagelabel.'","'.$this->optionstypepage[$this->typepage].'")';
				mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			}
			else{ //si label préexistant
				echo 'VOTRE DEMANDE N\'A PU ETRE PRISE EN COMPTE CAR IL EXISTE DEJA UNE PAGE AYANT LE MEME LABEL';				
			}
			
		}
		
		//Copie d'élément
		if(isset($_POST['copyelt'])){
			if(!empty($this->page)){			
				empty($_POST['newpage'])?$pagelabel="newpage":$pagelabel=$_POST['newpage'];
				//recherche d'un label identique préexistant
				$sql='SELECT label FROM eb_pages WHERE label="'.$pagelabel.'"';
				$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
				//si pas de label préexistant
				if (mysql_num_rows($qry)==0){
						$sqlElt='INSERT INTO eb_pages (label,typepage,urlrewrited,urlreal,idordered,classement,constructeur,typeprod,refprod,date_parution) 
						VALUES ("'.$pagelabel.'","'.$row['typepage'].'","'.$row['urlrewrited'].'","'.$row['urlreal'].'",
						"'.$row['idordered'].'","'.$row['classement'].'","'.$row['constructeur'].'","'.$row['typeprod'].'",
						"'.$row['refprod'].'","'.$row['date_parution'].'")';
						$qryElt=mysql_query($sqlElt) or die('Erreur SQL !<br />'.$sqlElt.'<br />'.mysql_error());
				}
				else{ //si css_id préexistant
					echo 'VOTRE DEMANDE N\'A PU ETRE PRISE EN COMPTE CAR IL EXISTE DEJA UNE PAGE AYANT LE MEME LABEL';				
				}
			}
			else{
				echo 'VOUS N\'AVEZ PAS SELECTIONNE LA PAGE A COPIER';
			}
		}
		
		//Suppression de l'élément actif
		if(isset($_POST['supprelt'])){
			$sql='DELETE FROM eb_pages WHERE idordered='.$this->page;
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$this->page=0;
		}
		
		//Sauvegarde de la page sélectionnée
		if(isset($_POST['safeelt'])){
			$sql='UPDATE eb_pages SET label="'.$_POST['label'].'",
			typepage="'.$_POST['typepage'].'",
			urlrewrited="'.$_POST['urlrewrited'].'",
			urlreal="'.$_POST['urlreal'].'",
			idordered='.$_POST['idordered'].',
			classement="'.$_POST['classement'].'",
			constructeur="'.$_POST['constructeur'].'",
			typeprod="'.$_POST['typeprod'].'",
			refprod="'.$_POST['refprod'].'",
			date_parution="'.$_POST['date_parution'].'" WHERE id='.$_POST['id'];
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		}

	}
	
	Public function fairejeupages(){
		$pagecond=empty($this->page)?"idordered LIKE '%'":"idordered='$this->page'";
		
		$typepageopt=utf8_decode($this->optionstypepage[$this->typepage]);
		$typepagecond=empty($this->typepage)?"typepage LIKE '%'":"typepage='$typepageopt'";
		
		$classementcond=empty($this->classement)?"classement LIKE '%'":"classement='$this->classement'";
		
		$typeprodopt=utf8_decode($this->optionstypeprod[$this->typeprod]);
		$typeprodcond=empty($this->typeprod)?"typeprod LIKE '%'":"typeprod='$typeprodopt'";
		
		$constropt=utf8_decode($this->constructeur);
		$constrcond=empty($this->constructeur)?"constructeur LIKE '%'":"constructeur='$constropt'";
		
		if ( empty($this->constructeur) && empty($this->typeprod) && empty($this->page) && empty($this->typepage) )
		{
			$sqlpages="SELECT * FROM eb_pages WHERE 0=1";
		}
		else
		{
			$sqlpages="SELECT * FROM eb_pages WHERE $pagecond AND $typepagecond AND $classementcond AND $typeprodcond ORDER BY id DESC";
		}		
		$this->jeupages=mysql_query($sqlpages) or die('Erreur SQL !<br />'.$sqlpages.'<br />'.mysql_error());
		return mysql_num_rows($this->jeupages);
	}
	
	Public function fairelignepage($idpage){
		$sql="SELECT * FROM eb_pages WHERE idordered='$idpage'";
		$this->lignepage=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	}
	
	Public function fairejeuarticles($idorderedpage){
		$typeopt=utf8_decode($this->optionstype[$this->type]);
		$typecond=empty($this->type)?"type LIKE '%'":"type='$typeopt'";
		
		$constropt=utf8_decode($this->constructeur);
		$constrcond=empty($this->constructeur)?"constructeur LIKE '%'":"constructeur='$constropt'";		
		
		$sql="SELECT * FROM eb_articles WHERE id_page='$idorderedpage' AND $typecond AND $constrcond ORDER BY id DESC,ordre";
		$this->jeuarticles=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		return mysql_num_rows($this->jeuarticles);
	}
	
	Public function fairelignearticle($idart){
		$sql="SELECT * FROM eb_articles WHERE id='$idart'";
		$this->lignearticle=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	}
	
	Public function fairejeutextes($idart){
		$sql="SELECT * FROM eb_texts WHERE id_article='$idart' ORDER BY ordre";
		$this->jeutextes=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		return mysql_num_rows($this->jeutextes);
	}
	
	Public function remplirselecteurpage(){
		$this->optionspage=array();
		$this->optionspage[]=' ';//la 1ère option du sélecteur est une chaîne vide (<=>'aucune'). Indice implicite à 0 => option par défaut (cf-//Sélection(s)
		$sql="SELECT * FROM eb_pages ORDER BY idordered";
		$jeu=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());//liste des pages définies pour le site
		while($row = mysql_fetch_array($jeu)){ //Parcours des pages du site
			$this->optionspage[$row['idordered']]=$row['label'];//pour ajout au tableau du sélecteur
		}
	}
	
	Public function remplirselecteurclassement(){
		$this->optionsclassement=array();
		$this->optionsclassement[]='';
		$sql="SELECT * FROM hpl_classements";
		$this->jeuclassements=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());//liste des classements
		while($row = mysql_fetch_array($this->jeuclassements)){
			$this->optionsclassement[$row['id']]=$row['categorie'].'/'.$row['souscategorie'];//pour ajout au tableau du sélecteur
		}
		mysql_data_seek($this->jeuclassements,0);
	}
	
	Private function renvoiPositionLibre($typeelement){		
		if ($typeelement=='article'){
			$sql="SELECT COUNT(*) FROM eb_articles WHERE id_page='$this->page'";
		}elseif($typeelement=='texte'){
			$sql="SELECT COUNT(*) FROM eb_texts WHERE id_article='$this->article'";		
		}elseif($typeelement=='page'){
			$sql="SELECT idordered FROM eb_pages ORDER BY idordered DESC";		
		}
		$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$row = mysql_fetch_row($qry);
		return $row[0]+1;			
	}
	
	Public function fairejeuelements(){
		$eltcond=empty($this->css_id_elt)?"css_id LIKE '%'":"css_id='$this->css_id_elt'";
		$typecond=empty($this->type_elt)?"type LIKE '%'":"type='$this->type_elt'";;
		
		if(empty($this->crit_rech)){
			$sqlelts="SELECT * FROM hpl_elts_localises WHERE $eltcond AND $typecond ORDER BY type,css_id";
		}
		else{
			$HTMcond="(href LIKE '%$this->crit_rech%' OR title LIKE '%$this->crit_rech%' OR maintext LIKE '%$this->crit_rech%')";
			$sqlelts="SELECT * FROM hpl_elts_localises WHERE $eltcond AND $typecond AND $HTMcond ORDER BY type,css_id";
		}
		$this->jeuelements=mysql_query($sqlelts) or die('Erreur SQL !<br />'.$sqlelts.'<br />'.mysql_error());
		return mysql_num_rows($this->jeuelements);
	}
	
	Private function checkOtherPOSTValues(){
		
		//Ajout article
		if(isset($_POST["ajoutarticle"])){
			//$typearticle=utf8_decode('Actualité');
			if($this->page==0 OR $this->type==0){
				echo "<H2 class=\"warning\">Vous devez sélectionner une PAGE et un TYPE pour pouvoir ajouter un article</H1>";
			}else{
				$typearticle=utf8_decode($this->optionstype[$this->type]);
				$freepos=$this->renvoiPositionLibre('article');
				$sql="INSERT INTO eb_articles (id_page,type,publi,ordre) VALUES ($this->page,'$typearticle',1,$freepos)";
				mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			}
			//Sortir de checkOtherPOSTValues()
			return;				
		}
		
		//Ajout page
		if(isset($_POST["ajoutpage"])){
			$label='newpage';
			$typepage='';
			$url='http://url_par_default.php';
			$freeidordered=$this->renvoiPositionLibre('page');
			$sql="INSERT INTO eb_pages (label,typepage,urlrewrited,idordered) VALUES ('$label','$typepage','$url',$freeidordered)";
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());			
			//Rafraîchir selecteur de page et jeu des pages (inutile pour articles ou textes qui sont générés à l'affichage
			$this->remplirselecteurpage();
			$this->fairejeupages();
			//Sortir de checkOtherPOSTValues()
			return;				
		}
		
		//Suppression d'article
		if(isset($_POST["supprarticle"])){
			//Extraction de l'id de l'article à supprimer
			$idart=substr($_POST["supprarticle"],5);
			//Suppression des textes affiliés
			$sql="DELETE FROM eb_texts WHERE id_article='$idart'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Suppression de l'article
			$sql="DELETE FROM eb_articles WHERE id='$idart'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Sortir de checkOtherPOSTValues()
			return;			
		}
		
		//Suppression de page
		if(isset($_POST["supprpage"])){
			//Extraction de l'id de l'article à supprimer
			$idpage=substr($_POST["supprpage"],5);
			//Si des articles existent pour la page à supprimer, l'opération est annulée avec message d'alerte
			$sql="SELECT COUNT(*) FROM eb_articles WHERE id_page='$idpage'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$row = mysql_fetch_row($qry);
			if($row[0]>0){
				echo "<H2 class=\"warning\">Des articles existent pour cette page; vous devez d'abord les réaffecter ou les supprimer</H1>";
				return;
			}
			//Suppression
			$sql="DELETE FROM eb_pages WHERE idordered='$idpage'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Rafraîchir selecteur de page et jeu des pages (inutile pour articles ou textes qui sont générés à l'affichage
			$this->remplirselecteurpage();
			$this->fairejeupages();
			//Sortir de checkOtherPOSTValues()
			return;			
		}
		
	//Traitements des POST envoyés de l'éditeur d'article et texte
		
		//Ajout de texte
		if(isset($_POST["ajouttexte"])){
			//Pour rester sur la page d'édition de l'article après l'ajout d'un texte 
			$this->article=$_POST["idart"];
			$freepos=$this->renvoiPositionLibre('texte');
			//Insertion d'un texte
			$sql="INSERT INTO eb_texts (id_article,ordre,fr_text,en_text,sp_text,it_text,de_text) VALUES ($this->article,$freepos,'French Text','English Text','Spanish Text','Italian Text','Deutsch Text')";
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Rafraîchir les jeux
			$this->fairelignearticle($this->article);
			$this->fairejeutextes($this->article);	
			//Sortir de checkOtherPOSTValues()
			return;				
		}
		
		//Suppression de texte
		if(isset($_POST["supprtexte"])){
			//Pour rester sur la page d'édition de l'article après l'ajout d'un texte
			$this->article=$_POST["idart"]; 
			//Extraction de l'id de l'article à supprimer
			$idtxt=substr($_POST["supprtexte"],5);
			//Suppression du texte
			$sql="DELETE FROM eb_texts WHERE id='$idtxt'";
			mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			//Rafraîchir les jeux
			$this->fairelignearticle($this->article);
			$this->fairejeutextes($this->article);	
			//Sortir de checkOtherPOSTValues()
			return;			
		}
		
		//Si demande d'édition d'un texte
		if(isset($_POST["btntexte"])){
			$this->texte=$_POST["btntexte"];
			//Pour rester sur la page d'édition de l'article après traitement
			$this->article=$_POST["idart"];
			//Rafraîchir les jeux
			$this->fairelignearticle($this->article);
			$this->fairejeutextes($this->article);
			//parcours du jeutextes pour trouver celui édité (par l'id) et affecter son texte localisé à $this->texteloc
			while($rowtxt=mysql_fetch_array($this->jeutextes)){
				if ($rowtxt[id]==$this->texte){
					$textfield=$this->langue."_text"; //le champ texte à éditer dépend de la langue 'active'
					$this->texteloc=stripslashes(utf8_encode($rowtxt[$textfield]));
				}
			}
			mysql_data_seek($this->jeutextes,0);
			//Sortir de checkOtherPOSTValues()
			return;							
		}
		
		//Si demande de mise à jour d'un article à partir de l'éditeur
		if(isset($_POST["update_x"])){	
			
			//Mise à jour des infos de l'article
			$id=$_POST["idart"];
			$idpage=$_POST["selpage$id"];
			$type=utf8_decode($_POST["seltype$id"]);
			$constructeur=utf8_decode($_POST["selconstructeur$id"]);
			$typeprod=utf8_decode($_POST["seltypeprod$id"]);
			$produit_hote=utf8_decode($_POST["produit_hote$id"]);
			$publi=(isset($_POST["publi$id"]))?1:0;
			$ordre=$_POST["ordart$id"];
			$url=addslashes(utf8_decode($_POST["urlart$id"]));
			$dtpub=$_POST["dtpub$id"];
			$sql="UPDATE eb_articles SET id_page='$idpage',type='$type',produit_hote='$produit_hote',constructeur='$constructeur',typeprod='$typeprod',publi=$publi,ordre='$ordre',url='$url',date_parution='$dtpub' WHERE id='$id'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			
			//Mise à jour des infos des textes
			if($this->fairejeutextes($id)>0){
				while($row=mysql_fetch_array($this->jeutextes)){
					$id=$row["id"];
					$label=utf8_decode($_POST["lbltxt$id"]);
					$format=utf8_decode($_POST["selformat$id"]);
					$ordre=$_POST["ordtxt$id"];
					//Mise à jour du texte édité le cas échéant (les paramètres passés en cache non vides)
					if (($row[id]==$_POST[textid]) and !empty($_POST["editeurHTML"])){
						$textfield=$this->langue."_text"; //le champ texte à éditer dépend de la langue 'active'
						$textupdate=addslashes(utf8_decode($_POST["editeurHTML"]));
						$sql="UPDATE eb_texts SET label='$label',format='$format',ordre='$ordre',$textfield='$textupdate' WHERE id='$id'";
					}else{					
						$sql="UPDATE eb_texts SET label='$label',format='$format',ordre='$ordre' WHERE id='$id'";
					}
					//exécution de la mise à jour
					$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
				}
				mysql_data_seek($this->jeutextes,0);
			}
			//Récupération de l'id de l'article édité pour le réafficher en mode édition
			$this->article=$_POST[idart];
			//Rafraîchir les jeux
			$this->fairelignearticle($this->article);
			$this->fairejeutextes($this->article);
			//Sortir de checkOtherPOSTValues()
			return;	
		}

		//Si demande d'upload d'une image
		if(isset($_POST[upload])){
			//récupération de l'id de l'article auquel doit être l'image
			$this->article=$_POST[idart]; //$_POST[idart] est normalement toujours défini dans ce contexte (l'upload n'a pu être appelé que de l'éditeur)
			//Si il y a bien eu un fichier de choisi
			if(!empty($_FILES["fichier_choisi"]["name"]))
			{
				//nom du fichier choisi:
				$nomFichier    = $_FILES["fichier_choisi"]["name"] ;
				//nom temporaire sur le serveur:
				$nomTemporaire = $_FILES["fichier_choisi"]["tmp_name"] ;
				//type du fichier choisi:
				$typeFichier   = $_FILES["fichier_choisi"]["type"] ;
				//poids en octets du fichier choisit:
				$poidsFichier  = $_FILES["fichier_choisi"]["size"] ;
				//code de l'erreur si jamais il y en a une:
				$codeErreur    = $_FILES["fichier_choisi"]["error"] ;

				//chemin qui mène au dossier qui va contenir les fichiers upload:
				$chemindestination = (!empty($_POST[imgDestination]))?$_POST[imgDestination]:"../../eb_images/";
				
				//Si le fichier est correctement copié dans le dossier de destination
				if(move_uploaded_file($nomTemporaire, $chemindestination.$nomFichier)){ 
					//Mise à jour du champ [url_image] de l'article édité ($this->article)
					$id=$this->article;
					$urlimg=addslashes(utf8_decode($chemindestination.$nomFichier));
					$sql="UPDATE eb_articles SET url_image='$urlimg' WHERE id='$id'";
					$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
					//Rafraîchir les jeux
					$this->fairelignearticle($this->article);
					$this->fairejeutextes($this->article);
					//Sortir de checkOtherPOSTValues()
					return;	
				}
				else{
					echo("<br/>l'upload a échoué") ;
				}
			}//fin if sur fichier
		}
		
		//Si demande de mise à jour d'une page à partir de l'éditeur
		if(isset($_POST["updatepage_x"])){	
			$idord=$_POST["idpageed"];
			$lbl=utf8_decode($_POST["label$idord"]);
			$type=utf8_decode($_POST["seltype$idord"]);
			$clt=$_POST["selclassement$idord"];
			$constr=utf8_decode($_POST["selconstructeur$idord"]);
			$typeprod=utf8_decode($_POST["seltypeprod$idord"]);
			$urlrew=addslashes(utf8_decode($_POST["urlrewrited$idord"]));
			$urlrea=addslashes(utf8_decode($_POST["urlreal$idord"]));
			$dtpub=$_POST["dtpub$idord"];
			$sql="UPDATE eb_pages SET label='$lbl',typepage='$type',classement='$clt',constructeur='$constr',typeprod='$typeprod',urlrewrited='$urlrew',urlreal='$urlrea',date_parution='$dtpub' WHERE idordered='$idord'";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$this->pageed=$_POST["idpageed"];
			$this->fairelignepage($this->pageed);
		}
		
		//Si demande de mise à jour des classements
		if(isset($_POST["updateclts_x"])){
			while($row=mysql_fetch_array($this->jeuclassements)){
				$id=$row[id];
				$cat=utf8_decode($_POST["cat$id"]);
				$souscat=utf8_decode($_POST["souscat$id"]);
				$sql="UPDATE hpl_classements SET categorie='$cat',souscategorie='$souscat' WHERE id='$id'";
				$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			}
			$this->remplirselecteurclassement();
		}
		
	}//fin de checkOtherPOSTValues()
	
	//Génération du code PHP pour l'affichage de la Case A Cocher pour le champ 'Publishing'.	
	Public function faireCACPubli($articleid,$publi){
	
		//Arguments=id du text et valeur du champ publishing
		$checkattrib=($publi==1)?'checked':'';
		$codepubli='<input type="checkbox" name="publi'.$articleid.'" '.$checkattrib.'>';
		return $codepubli;
	}//Fin de faireCACPublishing()
		
	Public function ajouterclassement(){
		$sql="SELECT categorie FROM hpl_classements WHERE categorie='New Cat'";
		$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		if(mysql_num_rows($qry)==0){
			$sql="INSERT INTO hpl_classements (categorie,souscategorie) VALUES ('New Cat','New SubCat')";
			$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		}
		$this->remplirselecteurclassement();
	}
		
}//Fin classe cms

//Création d'un objet CMS
$cms = new cms;
//Passage en mode gestion des images, ou des textes, ou de l'interface suivant choix
switch ($cms->mode){
	case "txt": //mode gestion des pages, articles et textes
		if($cms->pageed>0){ //édition d'une page
			require_once("page_editor.php");
		}
		elseif($cms->article>0){ //édition d'un article
			require_once("content_editor.php");
		}
		elseif(isset($_POST["btnclassements"])){ //édition des critères de classements
			$cms->ajouterclassement();
			require_once("classements_editor.php");
		}
		else{ //par défaut affichage en liste des pages et articles répondant aux critères sélectionnés
			require_once("content_lists.php"); 
		}
		break;
	case "img": //mode upload d'images
		require_once("content_upload.php");
		break;
	case "inter": //mode gestion de l'interface (éléments localisés)
		if(empty($cms->elted)){
			require_once("interface_lists.php");
		}
		else{
			require_once("interface_editor.php");
		}
		break;	
	default:
		echo 'Mode du CMS non identifié';
}

?>

 