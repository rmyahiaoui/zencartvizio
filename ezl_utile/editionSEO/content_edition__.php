<?php
require_once('../../ezl_page.php'); 
require_once('../../ezl_utile.php'); 
require_once('../../ezl_langue.php'); 
require_once('../../catalog/main.php');

//Classe pour l'édition des contenus (textes organisés en articles) des pages éditoriales
class content_edition{

	public $mode; //code du mode sur 3 caractères (txt pour textes, img pour images,...) pour afficher la gestion des textes ou l'upload des images
	public $optionspage=array();//Tableau des options pour le sélecteur de page
	public $optionstype=array();//Tableau des options pour le sélecteur de type d'article	
	public $optionsconstructeur=array();//Tableau des options pour le sélecteur de constructeur
	public $optionstypeprod=array();//Tableau des options pour le sélecteur de type produit
	public $optionsformat=array();//Tableau des options pour le sélecteur de format (de texte)
	public $page;//indice de la page sélectionnée
	public $type;//indice du type article sélectionné
	public $langue; //code langue sur 2 caractères du contenu affiché	
	public $article;//id de l'article sélectionné pour édition
	public $jeuarticles; //ressource représentant le jeu des articles de la page sélectionnée et/ou du type article sélectionné	
	public $jeutextes; //ressource représentant le jeu des textes correspondant aux articles sélectionnés
	public $lignearticle;//ressource représentant la ligne de l'article sélectionné
	public $texte; //id du texte passé en mode édition	
	public $texteloc; // chaîne du texte localisé (chaîne fr, chaîne en,...)
	
	Public function __construct(){
		
		//Initialisation du mode gestion des textes ou des images
		isset($_POST['mode'])?$this->mode=$_POST['mode']:$this->mode="txt";
		if($this->mode=="img") return;
		
		//Sélection(s):initialisation du contexte en mode texte
		isset($_POST['selpages'])?$this->page=$_POST['selpages']:$this->page=0; //Sans page sélectionnée, page=0
		isset($_POST['seltypes'])?$this->type=$_POST['seltypes']:$this->type=0; //Sans type article sélectionné, type=0
		isset($_POST['flag'])?$this->langue=$_POST['flag']:$this->langue='fr'; //français par défaut		
		isset($_POST["btnarticle"])?$this->article=$_POST['btnarticle']:$this->article=0;//Sans article sélectionné, article=0
		
		//Options du sélecteur de pages
		$this->optionspage[]=' ';//la 1ère option du sélecteur est une chaîne vide (<=>'aucune'). Indice implicite à 0 => option par défaut (cf-//Sélection(s)
		$sql="SELECT * FROM eb_pages ORDER BY idordered";
		$jeupages=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());//liste des pages définies pour le site
		while($pagerow = mysql_fetch_array($jeupages)){ //Parcours des pages du site
			$this->optionspage[$pagerow['idordered']]=$pagerow['label'];//pour ajout au tableau du sélecteur
		}
		
		//Options du sélecteur de types article
		//la 1ère option du sélecteur est une chaîne vide (<=>'aucune')		
		$this->optionstype[]=' ';//Indice implicite à 0 => option par défaut (cf-//Sélection(s))
		$this->optionstype[]='Actualité';
		$this->optionstype[]='Autre';
		$this->optionstype[]='Meta_Desc';
		$this->optionstype[]='Meta_Keywords';
		$this->optionstype[]='Meta_Title';
		$this->optionstype[]='Témoignage';
		$this->optionstype[]='Partenaire';		
		
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
		
		//Options du sélecteur de format (de texte)
		$this->optionsformat[]='Titre';
		$this->optionsformat[]='Chapeau';
		$this->optionsformat[]='Sous-titre';
		$this->optionsformat[]='Paragraphe';
		
		//Jeu des articles ou, si un article est édité, ligne de l'article sélectionné 
		$this->article>0?$this->fairelignearticle($this->article):$this->fairejeuarticles();
		
		//Traitement des demandes (ajout, suppression, édition,...)
		$this->checkOtherPOSTValues();

	}//Fin de __construct()
		
	Public function fairejeuarticles(){
		$opwhere=($this->page&&!empty($this->type))?'AND':'OR';//initialisation de l'opérateur pour la condition Where 
		$sql="SELECT * FROM eb_articles WHERE id_page='$this->page' $opwhere type='".utf8_decode($this->optionstype[$this->type])."' ORDER BY ordre";
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
	
	Private function renvoiPositionLibre($typeelement){
		if ($typeelement=='article'){
			$sql="SELECT COUNT(*) FROM eb_articles WHERE id_page='$this->page'";
		}elseif($typeelement=='texte'){
			$sql="SELECT COUNT(*) FROM eb_texts WHERE id_article='$this->article'";		
		}
		$qry=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$row = mysql_fetch_row($qry);
		return $row[0]+1;			
	}
	
	Private function checkOtherPOSTValues(){
		//Si bouton back (Retour liste) a été cliqué il n'y a pas à tenir compte du reste
		if(isset($_POST["back"])) return;
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
				$this->fairejeuarticles();
			}
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
			//Rafraîchir le jeu d'articles
			$this->fairejeuarticles();
			//Sortir de checkOtherPOSTValues()
			return;			
		}
		//Traitements des POST envoyés de l'éditeur
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
		//Si demande de mise à jour à partir de l'éditeur
		if(isset($_POST["update_x"])){	
			//Mise à jour des infos de l'article
			$id=$_POST["idart"];
			$type=utf8_decode($_POST["seltype$id"]);
			$constructeur=utf8_decode($_POST["selconstructeur$id"]);
			$produit_hote=utf8_decode($_POST["produit_hote$id"]);	

			$typeprod=utf8_decode($_POST["seltypeprod$id"]);
			
			$publi=(isset($_POST["publi$id"]))?1:0;
			$ordre=$_POST["ordart$id"];
			$url=addslashes(utf8_decode($_POST["urlart$id"]));
			$dtpub=$_POST["dtpub$id"];
			$sql="UPDATE eb_articles SET type='$type',constructeur='$constructeur',produit_hote='$produit_hote',typeprod='$typeprod',publi=$publi,ordre='$ordre',url='$url',date_parution='$dtpub' WHERE id='$id'";
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
	}//fin de checkOtherPOSTValues()
	
	Public function faireCACPubli($articleid,$publi){//Génération du code PHP pour l'affichage de la Case A Cocher pour le champ 'Publishing'.
	//Arguments=id du text et valeur du champ publishing
		$checkattrib=($publi==1)?'checked':'';
		$codepubli='<input type="checkbox" name="publi'.$articleid.'" '.$checkattrib.'>';
		return $codepubli;
	}//Fin de faireCACPublishing()	
	
}//Fin de la classe eb_texts_edition

//Création d'un objet d'édition
$editeur = new content_edition;
//Passage en mode gestion des images ou des textes suivant choix
if($editeur->mode=="txt"){
	$editeur->article==0?require_once("content_lists.php"):require_once("content_editor.php");
}
elseif($editeur->mode=="img"){
	require_once("content_upload.php");
}
//Appel du mode liste ou du mode édition suivant si un article est sélectionné


?>

 