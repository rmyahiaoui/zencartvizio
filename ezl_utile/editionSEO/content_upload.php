<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="content_edition.css" />
		<title>CMS - Gestion des fichiers images</title>
	</head>
	<body>
		<?php require_once("cms_mode.php"); ?>
		<h4>Attention de respecter les règles de nommage des fichiers suivantes:</h4>
		(Les crochets ne doivent pas figurer; ils encadrent les valeurs qui doivent être renseignées. Les valeurs indiquées en MAJUSCULES sont à taper en MAJUSCULES)
		<ol>
			<li>Pour les images figurant dans les vues 'hotes-produits': hotes_[TYPEPRODUIT]_[CONSTRUCTEUR].jpg</li>
		</ol>
		<br/>
		<form name="formulaire_envoi_fichier" enctype="multipart/form-data" method="post" action="content_upload.php">
		<input type="file" name="fichier_choisi">
		<br/><br/>
		
		<br/><br/>
		<input type="submit" name="upload" value="Envoyer le fichier">
		</form>


		<?php
		//on vérifie que le champ est bien rempli:
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
			$chemindestination = "../../eb_images/";

			if(move_uploaded_file($nomTemporaire, $chemindestination.$nomFichier)){
				echo("<br/>upload a réussi|". $nomFichier."|". $nomTemporaire."|". $typeFichier."|". $poidsFichier );
			}
			else{
				echo("<br/>l'upload a échoué") ;
			}
		}//fin if
		else
		{
			echo("Vous n'avez pas choisi de fichier!!") ;
		}//fin else
		?>
	</body>