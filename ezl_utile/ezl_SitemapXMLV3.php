<?php
header("Content-type: text/xml");
require_once('../ezl_const.php');
require_once('../ezl_page.php');
require_once('../ezl_lien.php');
require_once('../ezl_localisation.php');
require_once('../includes/languages/ezl_'.$loc->langue->toString('longue_anglais').'.php');
require_once('../includes/languages/eb_'.$loc->langue->toString('longue_anglais').'.php');

require_once('../includes/configure.php');
require_once('../catalog/main.php');

// permet de généré une version partielle des URL..
$limit = 200000;
$url_root = $_SERVER['SERVER_NAME'].'/';
$url_root = 'http://www.lampevideoprojecteur.fr/';
$url_root = 'http://'.$_SERVER['SERVER_NAME'].'/';

function add_element($url,$frequency)
{
  global $url_root;
  global $loc;
  
  if (strlen($url)>0)
  {
    if ( $loc->typeproduit=="L" )
		$url .= ".html";
	else if ( $loc->typeproduit=="B" )
		$url .= ".htm";
	else if ( $loc->typeproduit=="H" )
		$url .= ".php";		
  }
  echo  '<url>
<loc>'.$url_root. $url.'</loc> 
<changefreq>'.$frequency.'</changefreq> 
</url>
';
}

// PRELIMINAIRES ---
echo   '<?xml version="1.0" encoding="UTF-8"?>
<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
	http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
// ---------------- la page d'accueil   -------------------------------------------------------------------------------------------------------------------------------------
add_element("","daily");
if ( $loc->typeproduit=="L" )
{
	// ---------------- le bloc type de lampes  -------------------------------------------------------------------------------------------------------------------------------------
	for ($i=0;$i<count($loc->types_lampes);$i++)
	{
	   add_element($url_lpv[$loc->types_lampes[$i]],'weekly');
	}			
	// ---------------- les pages constructeur  -------------------------------------------------------------------------------------------------------------------------------------

		$liste_plus =" 'epson','hitachi','infocus','mitsubishi','nec','optoma','panasonic','sanyo','sony','toshiba','benq' ";
		$sql = "select distinct lower(categories_description.categories_name) constructeur
				from categories_description, categories  
				where categories.parent_id=0
				and   length(categories_description.categories_name)>0
				and   categories.categories_id=categories_description.categories_id
				order by 1";
		//			$recordSet = $db->Execute($sql);
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		   $constructeur = $rs->fields['constructeur'];	   
		   if (strpos($liste_plus,$constructeur))
		   {
			   $frequence = "weekly";
		   }
		   else
		   {
			   $frequence = "monthly";
		   }			   
		   add_element(sprintf(RADICAL_URL_CONSTRUCTEUR,$constructeur),$frequence);
		   // LES PAGES TEMOIGNAGES ET ACTUS SPECIFIQUES....
		   
		   $rs->MoveNext();
		}
	    /// les pages éditoriales -------------------------------------------------------------------------------------------------------------------------------------
		$liste_plus = " 'ACTUS','TEMOIGNAGES' ";

		for ($i=0;$i<count($loc->pages_edito);$i++)
		{
		   if (strpos($liste_plus,$loc->pages_edito[$i]))
		   {
			   $frequence = "daily";
		   }
		   else
		   {
			   $frequence = "yearly";
		   }			   				   
		   add_element( $url_menu[$loc->pages_edito[$i]],$frequence);
		}			
	   // pages produits VIDEOPROJECTEURS    ---------------------------------------------------------------------------------------------	
		$sql = 'select  distinct catd.categories_name, ctrd.categories_name nom_constructeur 
			  from   categories as cat, categories_description as catd, categories_description as ctrd
			  where  cat.categories_id = catd.categories_id
			  and    cat.parent_id = ctrd.categories_id
			  and catd.categories_name not like \'%SB15%\'
			  and catd.categories_name not like \'%EIP-1%\'			  			  			  
			  and catd.categories_name not like \'%°%\'			  			  			  			  
			  order by ctrd.categories_name, catd.categories_name
			  limit 0,'.$limit;

		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		   $url = sprintf(RADICAL_URL_CONSTRUCTEUR, $rs->fields['nom_constructeur'] ) 
		         .'/' . $rs->fields['categories_name'] . '-vprf';

	       add_element($url,'monthly');
				 
		   $rs->MoveNext();
	    }   

	   // pages produits LAMPES ----------------------------------------------------------------------------------------------------------------
		$sql = 'select distinct prd.products_model,cstrd.categories_name
				FROM categories AS cat,
					 categories AS cstr,
					 categories_description AS cstrd,
					 products AS prd
				where  cat.parent_id = cstr.categories_id
				and prd.master_categories_id = cat.categories_id
				and    cstrd.categories_id = cstr.categories_id
				order by 2,1
				limit 0,'.$limit;
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		   $url = sprintf(RADICAL_URL_CONSTRUCTEUR, $rs->fields['categories_name']) 
		         .'/' . $rs->fields['products_model'] . '-lprf';

	       add_element($url,'monthly');
				 
		   $rs->MoveNext();
	    }   
	   // pages actualites    
	   // pages temoignages
	    // pages partenaires 
		$sql = "SELECT DISTINCT url, type_article
				FROM eb_contenus
				WHERE type_article
				IN (
				'Partenaire',  'Testimony',  'News'
				)
				AND LENGTH( url ) >4
				union 
				SELECT  `urlrewrited` ,  `typepage` 
				FROM  `eb_pages` 
				WHERE  `typepage` 
				IN ( 'technote','miscalaneous','faq')			
				";
				
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		
		   if ( $rs->fields['type_article']=="Partenaire" )
		     $extension = '-pntr';
		   else if ( $rs->fields['type_article']=="Testimony" )
		     $extension = '-tmg';
		   else if ( $rs->fields['type_article']=="News" )
		     $extension = '-act';
		   else if ( $rs->fields['type_article']=="technote" )
		     $extension = '-pact';
		   else if ( $rs->fields['type_article']=="miscalaneous" )
		     $extension = '-msc';
		   else if ( $rs->fields['type_article']=="faq" )
		     $extension = '-faq';
		
		   $url =$rs->fields['url'].$extension;

	       add_element($url,'monthly');
				 
		   $rs->MoveNext();
	    }
        if ( $url_root == 'http://wwww.lampevideoprojecteur.fr/')
		{
			$sql = "select distinct urlreal, typepage
					from eb_contenus_v4
					where typepage in ('miscalaneous','technote','faq')
					and length(urlreal)>0
					order by date_parution desc";		
					
			$rs = & $conn->Execute($sql);
			while(!$rs->EOF)
			{
			
			   if ( $rs->fields['typepage']=="technote" )
				 $extension = '-pact';
			   else if ( $rs->fields['typepage']=="miscalaneous" )
				 $extension = '-msc';
			   else if ( $rs->fields['typepage']=="faq" )
				 $extension = '-faq';
			
			   $url =$rs->fields['urlreal'].$extension;

			   add_element($url,'monthly');
					 
			   $rs->MoveNext();
			}    		
		}
}
else if ( $loc->typeproduit=="H" )
{
	$code_langue = "fr";
	$radical_url = 'remplacement-lampes-videoprojecteurs-';
	$sql = "select distinct href  
from hpl_elts_localises 
where css_id like 'lnk%' 
and href not like '%hotprojectorlamps%'
and href not like '%shopping_cart%'
and href not like '%login%'
and langue='". $code_langue ."'";

			$rs = & $conn->Execute($sql);
			while(!$rs->EOF)
			{			
			   $url =$rs->fields['href'];
			   $url =str_replace(".php", "",$url);			   
			   add_element($url,'monthly');
					 
			   $rs->MoveNext();
			}   		 
			
	   // pages produits VIDEOPROJECTEURS    ---------------------------------------------------------------------------------------------	
		$sql = 'select  distinct catd.categories_name, ctrd.categories_name nom_constructeur 
			  from   categories as cat, categories_description as catd, categories_description as ctrd
			  where  cat.categories_id = catd.categories_id
			  and    cat.parent_id = ctrd.categories_id
			  and catd.categories_name not like \'%SB15%\'
			  and catd.categories_name not like \'%°%\'			  			  			  			  			  
			  and catd.categories_name not like \'%EIP-1%\'			  			  
			  order by ctrd.categories_name, catd.categories_name
			  limit 0,'.$limit;
			  
		// FR : remplacement-lampe-MITSUBISHI-VLT-SE2LP.php
		$lien_vp['fr']= "remplacement-lampes-videoprojecteurs-%s-%s";
		
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		   $url = sprintf($lien_vp[$code_langue], $rs->fields['nom_constructeur'],str_replace(" ","-",$rs->fields['categories_name']));

	       add_element($url,'monthly');
				 
		   $rs->MoveNext();
	    }   
		$lien_lampe['fr']= "remplacement-lampe-%s-%s";
	
	   // pages produits LAMPES ----------------------------------------------------------------------------------------------------------------
		$sql = 'select distinct prd.products_model,cstrd.categories_name
				FROM categories AS cat,
					 categories AS cstr,
					 categories_description AS cstrd,
					 products AS prd
				where  cat.parent_id = cstr.categories_id
				and prd.master_categories_id = cat.categories_id
				and    cstrd.categories_id = cstr.categories_id
				order by 2,1
				limit 0,'.$limit;
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
		   $url = sprintf( $lien_lampe[$code_langue], $rs->fields['categories_name'], $rs->fields['products_model'] );

	       add_element($url,'monthly');
				 
		   $rs->MoveNext();
	    }   	
}
else
{
   // les batteries 
	$radical_url['RB']['fr']='batteries-ordinateur';
	$radical_url['CG']['fr']='chargeurs-ordinateur';
	$radical_url['CB']['fr']='batteries-appareil-photo-numerique';
	
	$radical_url['RB']['sp']='baterias-ordenadores';
	$radical_url['CG']['sp']='cargadores-de-ordenador';
	$radical_url['CB']['sp']='baterias-para-camara-digital';
   
   // items de premier niveau
   	add_element(QUI_L,'monthly');
   	add_element(FAQ_L,'monthly');
   	add_element(LEXIQUE_L,'monthly');
   	add_element(CONFIDENTIALITE_L,'monthly');
   	add_element(GARANTIE_L,'monthly');
   	add_element(PAIEMENT_LIV_L,'monthly');
   	add_element(RECYCLE_L,'monthly');
   	add_element(CONTACT_L,'monthly');
   	add_element(PARTENAIRES_L,'monthly');
   	add_element(EB_RAPPELLE_L,'monthly');

	
	// les pages produits
	for ($i=0;$i<count($loc->types_pcp);$i++)
	{
	    $lg = $loc->langue;
//echo $loc->types_pcp[$i].$loc->langue.$radical_url[$loc->types_pcp[$i]][$lg].$radical_url['RB']['fr'];	exit;
        if ($loc->langue=='sp')
			add_element($radical_url[$loc->types_pcp[$i]]['sp'],'weekly');
		else if ($loc->langue=='fr')
			add_element($radical_url[$loc->types_pcp[$i]]['fr'],'weekly');		
	}				

    // les pages produit/constructeurs
	$sql = "select libelle_constructeur, code_type_produit 
	        from el_v_constructeurs 
			where length(libelle_constructeur)>0
			and length(code_type_produit)>0 
			order by 2,1	";
	
    // les pages 
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
	        if ($loc->langue=='sp')
				add_element($radical_url[$rs->fields['code_type_produit']]['sp'].'-'.$rs->fields['libelle_constructeur'],'weekly');
			else if ($loc->langue=='fr')
				add_element($radical_url[$rs->fields['code_type_produit']]['fr'].'-'.$rs->fields['libelle_constructeur'],'weekly');		
						 
		   $rs->MoveNext();
		}   

    // les pages produit/constructeurs/ordi
	$sql = "select libelle_constructeur, code_type_produit, libelle_produit
	        from el_v_produits_hotes 
			where length(libelle_constructeur)>0
			and length(code_type_produit)>0 
			and length(libelle_produit)>0 
			order by 2,1
 			limit 0,".$limit;
    // les pages 
		$rs = & $conn->Execute($sql);
		while(!$rs->EOF)
		{
	        if ($loc->langue=='sp')
				add_element($radical_url[$rs->fields['code_type_produit']]['sp'].'-'.$rs->fields['libelle_constructeur'].'-'.$rs->fields['libelle_produit'],'monthly');
			else if ($loc->langue=='fr')
				add_element($radical_url[$rs->fields['code_type_produit']]['fr'].'-'.$rs->fields['libelle_constructeur'].'-'.$rs->fields['libelle_produit'],'monthly');		
		   $rs->MoveNext();
		}   
		
	// les témoignages clients 
	
}   
///  FINITO   -------------------------------------------------------------------------------------------------------------------------------------
			
 echo '</urlset>';
?>
