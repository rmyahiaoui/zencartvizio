<?php
/**
 * Common Template
 * 
 * outputs the html header. i,e, everything that comes before the \</head\> tag <br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: html_header.php 6948 2007-09-02 23:30:49Z drbyte $
 */
/**
 * load the module for generating page meta-tags
 */
require(DIR_WS_MODULES . zen_get_module_directory('meta_tags.php'));
/**
 * output main page HEAD tag and related headers/meta-tags, etc
 */
?>
  <?php
    // FVV détournement du comportement de zencart

	$titre=META_TAG_TITLE;
	$description=META_TAG_TITLE;

	if (   ($_GET['main_page']=="page") && ($_GET['id']==16) )
	{
		$sql = "select fr_text,type_article from eb_contenus where ordre_affichage=0 and page = 'products_all'";
	}
	else
	{
		$sql = "select fr_text,type_article from eb_contenus where ordre_affichage=0 and page = '". $_GET['main_page'] ."'";
	}


	//	main_page=page&id=16

	if  ( ($_SESSION['main_page']=="index")&&(strlen($_GET['cPath'])>0) )
	{
		$sql .= " and 0=1 ";
	}


//echo $sql;
	$rs = $db->Execute($sql);

	while(!$rs->EOF)
	{
//		$texte = utf8_encode($rs->fields['fr_text']);
		$texte = stripslashes($rs->fields['fr_text']);
		$type_article = $rs->fields['type_article'];

		if ( $type_article == 'Meta_Title' )
		{
			$titre=$texte;
		}
		else if ( $type_article == 'Meta_Desc' )
		{
			$description=$texte;
		}
		$rs->MoveNext();
	}
//echo 'titre: '.$titre;
//echo 'description: '.$description;

  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<title><?php echo $titre ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="icon" type="image/png" href="led.png" />
<meta name="author" content="The Zen Cart&trade; Team and others" />
<meta name="generator" content="shopping cart program by Zen Cart&trade;, http://www.zen-cart.com eCommerce" />
<?php if (defined('ROBOTS_PAGES_TO_SKIP') && in_array($current_page_base,explode(",",constant('ROBOTS_PAGES_TO_SKIP'))) || $current_page_base=='down_for_maintenance' || $robotsNoIndex === true) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<?php if (defined('FAVICON')) { ?>
<link rel="icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<?php } //endif FAVICON ?>

<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>" />

<?php

/**
 * load all template-specific stylesheets, named like "style*.css", alphabetically
 */
  $directory_array = $template->get_template_part($template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css'), '/^style/', '.css');
  // while(list ($key, $value) = each($directory_array)) {
  //   echo '<link rel="stylesheet" type="text/css" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . $value . '" />'."\n";
  // }
/**
 * load stylesheets on a per-page/per-language/per-product/per-manufacturer/per-category basis. Concept by Juxi Zoza.
 */
  $manufacturers_id = (isset($_GET['manufacturers_id'])) ? $_GET['manufacturers_id'] : '';
  $tmp_products_id = (isset($_GET['products_id'])) ? (int)$_GET['products_id'] : '';
  $tmp_pagename = ($this_is_home_page) ? 'index_home' : $current_page_base;
  $sheets_array = array('/' . $_SESSION['language'] . '_stylesheet',
                        '/' . $tmp_pagename,
                        '/' . $_SESSION['language'] . '_' . $tmp_pagename,
                        '/c_' . $cPath,
                        '/' . $_SESSION['language'] . '_c_' . $cPath,
                        '/m_' . $manufacturers_id,
                        '/' . $_SESSION['language'] . '_m_' . (int)$manufacturers_id,
                        '/p_' . $tmp_products_id,
                        '/' . $_SESSION['language'] . '_p_' . $tmp_products_id
                        );
  while(list ($key, $value) = each($sheets_array)) {
    //echo "<!--looking for: $value-->\n";
    $perpagefile = $template->get_template_dir('.css', DIR_WS_TEMPLATE, $current_page_base, 'css') . $value . '.css';
    if (file_exists($perpagefile)) echo '<link rel="stylesheet" type="text/css" href="' . $perpagefile .'" />'."\n";
  }

/**
 * load printer-friendly stylesheets -- named like "print*.css", alphabetically
 */
  $directory_array = $template->get_template_part($template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css'), '/^print/', '.css');
  sort($directory_array);
  while(list ($key, $value) = each($directory_array)) {
   // echo '<link rel="stylesheet" type="text/css" media="print" href="' . $template->get_template_dir('.css',DIR_WS_TEMPLATE, $current_page_base,'css') . '/' . $value . '" />'."\n";
  }
  $sautLigne ='
  ';
  ?>
  <link rel="stylesheet" type="text/css" href="includes/templates/theme317/css/tbi_css.css" />
  <link rel="stylesheet" type="text/css" href="includes/templates/theme317/css/stylesheet_main.css" />
  <link rel="stylesheet" type="text/css" href="includes/templates/theme317/css/supermenu.css" />
  <link href="bootstrap/css/bootstrap.css"  type="text/css" rel="stylesheet" />
  <!-- JavaScript plugins (requires jQuery) -->
  <script src="http://code.jquery.com/jquery.js"/>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js"/>


  <?php
/**
 * load all site-wide jscript_*.js files from includes/templates/YOURTEMPLATE/jscript, alphabetically
 */
  $directory_array = $template->get_template_part($template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript'), '/^jscript_/', '.js');
  while(list ($key, $value) = each($directory_array)) {
    echo '<script type="text/javascript" src="' .  $template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/' . $value . '"></script>'."\n";
  }

/**
 * load all page-specific jscript_*.js files from includes/modules/pages/PAGENAME, alphabetically
 */
  $directory_array = $template->get_template_part($page_directory, '/^jscript_/', '.js');
  while(list ($key, $value) = each($directory_array)) {
    echo '<script type="text/javascript" src="' . $page_directory . '/' . $value . '"></script>' . "\n";
  }

/**
 * load all site-wide jscript_*.php files from includes/templates/YOURTEMPLATE/jscript, alphabetically
 */
  $directory_array = $template->get_template_part($template->get_template_dir('.php',DIR_WS_TEMPLATE, $current_page_base,'jscript'), '/^jscript_/', '.php');
  while(list ($key, $value) = each($directory_array)) {
/**
 * include content from all site-wide jscript_*.php files from includes/templates/YOURTEMPLATE/jscript, alphabetically.
 * These .PHP files can be manipulated by PHP when they're called, and are copied in-full to the browser page
 */
    require($template->get_template_dir('.php',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/' . $value); echo "\n";
  }
/**
 * include content from all page-specific jscript_*.php files from includes/modules/pages/PAGENAME, alphabetically.
 */
  $directory_array = $template->get_template_part($page_directory, '/^jscript_/');
  while(list ($key, $value) = each($directory_array)) {
/**
 * include content from all page-specific jscript_*.php files from includes/modules/pages/PAGENAME, alphabetically.
 * These .PHP files can be manipulated by PHP when they're called, and are copied in-full to the browser page
 */
    require($page_directory . '/' . $value); echo "\n";
  }

//DEBUG: echo '<!-- I SEE cat: ' . $current_category_id . ' || vs cpath: ' . $cPath . ' || page: ' . $current_page . ' || template: ' . $current_template . ' || main = ' . ($this_is_home_page ? 'YES' : 'NO') . ' -->';
?>
<script type="text/javascript">
    function affiche(img)
      {
        document.getElementById("productMainImage").innerHTML ='<img style="width:540px;height:296px" src="images/showbig/'+img+'_big.jpg" />';
       }
    function affiche_menu(sousCat, id, url, text)
      {
        if(sousCat.search('_')) { // Cherche si on a deux produit (min) dans notre chaine
          var tabSousCat = sousCat.split('_');
        }
        if(tabSousCat.length > 1) {
            if(document.getElementById('testeuh'+id).innerHTML == '&nbsp;&nbsp;..') { // si c'est pas deroulé
              // alert(document.getElementById('cache'+tabSousCat[0]).style.display = 'none');
              document.getElementById('testeuh'+id).style.backgroundPosition = '-62px -16px'; // on met le style deroule
              for (var i = 0; i < tabSousCat.length; i++) {
                document.getElementById('cache'+tabSousCat[i]).style.display = 'block';
              }
              document.getElementById('testeuh'+id).innerHTML = '&nbsp;...'; // et on change le caractete invisible
            } else { // Si le bloc est deja ouvert
              // alert(1);
              document.getElementById('testeuh'+id).style.backgroundPosition = '-32px -16px';
              for (var i = 0; i < tabSousCat.length; i++) {
                document.getElementById('cache'+tabSousCat[i]).style.display = 'none';
              }
              document.getElementById('testeuh'+id).innerHTML = '&nbsp;&nbsp;..';
            }
         }

           function verif(variable)
            {
                var exp = new RegExp("^cache");
                return exp.test(variable);
            }
            var v = document.getElementsByTagName("h3");
            // var i = 0;
            var elements = new Array();
            for(i=0; i<v.length; i++){
              elements[i] = v[i];
              if(verif(elements[i].getAttribute("id"))) {
                 document.getElementById(elements[i].getAttribute("id")).style.backgroundColor ='white';
              }
            }
          document.getElementById('cache'+id).style.backgroundColor ='#ccc';
          document.getElementById('testeuh'+id).style.backgroundPosition = '-32px -16px';

      }
    function affiche_onglet(onglet, typetexte)
      {
        var arrayOnglet = ['ongletPresentation', 'ongletAvantages', 'ongletCaracTech', 'ongletLogiAssoc', 'ongletAccessAssoc', 'ongletAppliAssoc'];
        var arrayBlocText = ['productDescription','productAvantages', 'productCaracTech', 'productLogiAssoc', 'productAccesAssoc', 'productAppliAssoc'];
        for (var i = 0; i < 6; i++) {

          if (arrayOnglet[i] != onglet) {
            document.getElementById(arrayOnglet[i]).style.backgroundColor ='white';
            document.getElementById(arrayOnglet[i]).style.zIndex ='998';
            document.getElementById(arrayOnglet[i]).style.borderBottom ='1px solid grey';
              if (arrayBlocText[i] != typetexte) {
                document.getElementById(arrayBlocText[i]).style.display ='none';
              }
          }

        }
        document.getElementById(typetexte).style.display ='block';
        document.getElementById(onglet).style.backgroundColor ='#ccc';
        document.getElementById(onglet).style.zIndex ='999';
        document.getElementById(onglet).style.borderBottom ='1px solid white';
        // document.getElementById("descriptTextContener").innerHTML ='bhjkfdlsssfdsq';
       }


  function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
  }
</script>
<script type="text/javascript">
<!--
function request(range, id) {
    var xhr = getXMLHttpRequest();
    // <h3 style="font-size:1.1em;font-weight:normal;margin-left:0px;margin-top:-10px"><span style="color:white;background-image:url(http://code.jquery.com/ui/1.10.3/themes/smoothness/images/ui-icons_222222_256x240.png);background-position: -32px -16px;">&nbsp;&nbsp;...</span></h3>

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (document.getElementById("featuredProducts")) {
              document.getElementById("featuredProducts").innerHTML = xhr.responseText;
            }
            else {
              document.getElementById("conteneurListeProd").innerHTML = xhr.responseText;
            }
            // document.getElementById("imgS").innerHTML =  'test';
        } else if (xhr.readyState < 4) {
            if (document.getElementById("featuredProducts")) {
              document.getElementById("featuredProducts").innerHTML = "<center><img src=\"images/loader.gif\" /></center>";
            }
            else {
              document.getElementById("conteneurListeProd").innerHTML = "<center><img src=\"images/loader.gif\" /></center>";
            }

        }
    };
    // xhr.open("GET", "index.php?Sleep=" + sleep, true);
    // xhr.send(null);
    xhr.open("POST", "ajax_return.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("rangeby="+range+"&idp="+id);
}

function chargeProduitCat(id) {
  var xhr = getXMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if (document.getElementById("featuredProducts")) {
              document.getElementById("featuredProducts").innerHTML = xhr.responseText;
            }
            else if (document.getElementById("indexProductList")) {
              document.getElementById("indexProductList").innerHTML = xhr.responseText; 
            }
            else if (document.getElementById("productGeneral")) {
              document.getElementById("productGeneral").innerHTML = xhr.responseText; 
            }
            // document.getElementById("imgS").innerHTML =  'test';
        } else if (xhr.readyState < 4) {
           if (document.getElementById("featuredProducts")) {
              document.getElementById("featuredProducts").innerHTML = "<center><img src=\"images/loader.gif\" /></center>";
            }
            else if (document.getElementById("indexProductList")) {
              document.getElementById("indexProductList").innerHTML = "<center><img src=\"images/loader.gif\" /></center>";
            }
            else if (document.getElementById("productGeneral")) {
              document.getElementById("productGeneral").innerHTML = "<center><img src=\"images/loader.gif\" /></center>";
            }


        }
    };
    // xhr.open("GET", "index.php?Sleep=" + sleep, true);
    // xhr.send(null);
    xhr.open("POST", "ajax_return.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("idp="+id);
 }

//-->
</script>

  <?php 
  if(!stripos($_SERVER['REQUEST_URI'], 'cPath' )
 AND !stripos($_SERVER['REQUEST_URI'], 'shopping_cart')
 AND !stripos($_SERVER['REQUEST_URI'], 'create_account')
 AND !stripos($_SERVER['REQUEST_URI'], 'login' )) { 
    $bodyTrue = 0;
  }
  if($bodyTrue) { ?>
  <!-- SuperMenu -->
  <link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type='text/javascript' src='includes/templates/theme317/jscript/supermenu/jquery.hoverIntent.minified.js'></script>
  <script type='text/javascript' src='includes/templates/theme317/jscript/supermenu/jquery.dcmegamenu.1.3.3.js'></script>
  <script type="text/javascript">
  $(document).ready(function($){

    $('#mega-menu-6').dcMegaMenu({
      rowItems: '3',
      speed: 'slow',
      effect: 'slide',
      event: 'click',
      fullWidth: true
    });
    
  });
  </script>
  <link href="includes/templates/theme317/css/supermenu/red.css" rel="stylesheet" type="text/css" />
<?php } ?>
</head>
<?php
 // NOTE: Blank line following is intended: ?>

