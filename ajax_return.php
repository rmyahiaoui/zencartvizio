<?php
//2a Nom produit asc
//3a prix asc
//(d = desc)
  try {
    $db = new PDO('mysql:host=localhost;dbname=vizio', 'root', '');
    // Affichage du chapeau de la categorie et traitement du retour de fonction
      if (isset($_POST['idp'])) {
        $idCat = intval($_POST['idp']);
        $sql = "SELECT categories_name, categories_description FROM categories_description WHERE  categories_id = $idCat";
        $rep0 = $db->query($sql);
        $tabP = $rep0->fetchAll();
        if (!isset($_POST['rangeby'])) { // On affiche le fil d'ariane et desc une seule fois
           echo  '<div id="filariane" style="margin-top:20px;color:#5e6d76;font-family:tahoma;font-style:italic">Accueil >'.$tabP[0]['categories_name'].'</div><h3 style="font-family:Tahoma;color:#0299d4;">'.$tabP[0]['categories_name'].'</h3><div style="padding:3px;color:#1b3442;font-family:tahoma;font-weight:bold;font-size:0.9em">'.$tabP[0]['categories_description'].'</div><br/>';
        }
      }
    if (isset($_POST['rangeby'])) {
      // if ($_POST['rangeby'] == '2a') {
      //   $rangeP = '3d';
      //   $range = '2d';
      //   $order = 'ORDER BY pd.products_name ASC';
      //   $styleBgPosititionP = "background-position: -65px -16px;";
      //   $styleBgPositition = "background-position: -65px -16px;";
      // } elseif ($_POST['rangeby'] == '2d') {
      //   $rangeP = '3d';
      //   $range = '2a';
      //   $order = 'ORDER BY pd.products_name DESC';
      //   $styleBgPosititionP = "background-position: -65px -16px;";
      //   $styleBgPositition = "background-position: 0px -16px;";
      // } 
      if ($_POST['rangeby'] == '3a') {
        $order = 'ORDER BY products_price ASC';
        // $rangeP = '3d';
        // $range = '2d';
        // $styleBgPosititionP = "background-position: -65px -16px;";
        // $styleBgPositition = "background-position: -65px -16px;";
      } elseif ($_POST['rangeby'] == '3d') {
        $order = 'ORDER BY products_price DESC';
        // $rangeP = '3a';
        // $range = '2d';
        // $styleBgPosititionP = "background-position: 0px -16px;";
        // $styleBgPositition = "background-position: -65px -16px;";
      } else {
        $order = 'AND p.manufacturers_id = '.intval($_POST['rangeby']).'';
      }
      if (isset($_POST['idp'])) {
        $id = $_POST['idp'];

      }
        $sql = "
          SELECT  pd.products_id, products_name, products_quantity, products_image, pd.products_description, products_price, c.parent_id, cd.categories_name, cd.categories_description, cd.categories_id, p.manufacturers_id, man.manufacturers_name
          FROM products_description pd
          INNER JOIN products p
          ON p.products_id = pd.products_id
          INNER JOIN products_to_categories pc
          ON pd.products_id = pc.products_id
          INNER JOIN categories_description cd
          ON pc.categories_id = cd.categories_id 
          INNER JOIN categories c
          ON cd.categories_id = c.categories_id
          INNER JOIN manufacturers man
          ON p.manufacturers_id = man.manufacturers_id
          WHERE cd.categories_id = $id $order";
          $r0 = $db->query($sql);
          $r = $r0->fetchAll();
      // $sql = "select p.products_id, p.products_image,p.products_type, p.master_categories_id, p.products_quantity, p.manufacturers_id, p.products_price, p.products_tax_class_id, pd.products_name, pd.products_description, IF(s.status = 1, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status =1, s.specials_new_products_price, p.products_price) as final_price, p.products_sort_order, p.product_is_call, p.product_is_always_free_shipping, p.products_qty_box_status from products_description pd, products p left join manufacturers m on p.manufacturers_id = m.manufacturers_id, products_to_categories p2c left join specials s on p2c.products_id = s.products_id where p.products_status = 1 and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '2' and p2c.categories_id = $id $order";
      //   $rep = $db->query($sql);

      $return ='<div id="conteneurListeProd">';
          for ($i=0; $i < sizeof($r); $i++) {
              if (strlen($r[$i]['products_description']) >= 200) {
              $r[$i]['products_description'] = substr($r[$i]['products_description'], 0, 150);
              $r[$i]['products_description'] .= '...';
              $r[$i]['products_description'] = stripslashes($r[$i]['products_description']);
              } elseif($r[$i]['products_description'] == null) { $r[$i]['products_description'] =  'Pas de description disponible'; }
              $r[$i]['products_description'] = str_replace('<p></p>', '', $r[$i]['products_description']);
               $return .= '<br/>
              <div id="wrapListeCat">
                <div id="imgListeCat">';
                  if(empty($r[$i]['products_image']) OR !file_exists('images/'.$r[$i]['products_image'].'')) {
                      $return .= '<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&zenid=oqcvhm6b11063dcfir1jjiep42">
                      <img src="images/tbi_images/body/produits/prod1.png" alt="'.$r[$i]['products_name'].'" title=" '.$r[$i]['products_name'].'"" width="130" class="listingProductImage" style="position:relative" onmouseover="showtrail(\'images/no_picture.gif\',\''.$r[$i]['products_name'].'\',100,80,100,80,this,0,0,100,80);" onmouseout="hidetrail();">
                    </a>';
                  } else {
                       $return .= '<img src="images/'.$r[$i]['products_image'].'" />';
                  }
                     $return .= '
                  </div>
                  <div id="descListeCat">
                    <h3 style="background-color:#2798d4;color:white;font-size:1em;padding:7px;padding-left:15px;margin-top:-1px;width:394px;">' . $r[$i]['manufacturers_name'] . '</h3>
                      <div id="listeBod" class=""><p style="font-weight:bold">Référence :  '.$r[$i]['products_name'].'</p><p style="margin-top:-5px">'.$r[$i]['products_description'].'<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43"></p><img src="images/tbi_images/page_prod/savoir_plus.png" /></a>
                      </div>
                    </div>
                    <div id="prixListeCat" align="right">
                      <div class="prixListeCatOk">
                        <img src="images/tbi_images/page_prod/splash_prix.png" /><p style="margin-left:80px;margin-top:-40px">'.round($r[$i]['products_price'], 2).'&euro;</p>
                      </div>
                      <div class="prixListeCatBarre">1200&euro;</div>
                      <div class="prixListeCatStock"><span style="font-family:Tahoma;font-size:0.9em;color:#568203"> STOCK : </span>'.$r[$i]['products_quantity'].'</div>
                       <div class="prixListeCatAjouter" >
                        <img  name="products_id['.$r[$i]['products_id'].']" src="images/tbi_images/page_prod/ajouter_panier.png" />
                       </div>
                    </div>
                  </div>'; // fermeture wrapListeCat
           }
            $return .= '</div>';
      echo $return;
    }
    else  {
      if (isset($_POST['idp'])) {
        $id = $_POST['idp'];
      }
      function verifSousCatExist($id) {
        global $db;
        $return2 = array();
         $sql = "
          SELECT categories_name, cd.categories_id, cd.categories_description
          FROM categories_description cd
          INNER JOIN categories c
          ON c.categories_id = cd.categories_id
          WHERE parent_id = $id";
          $rep = $db->query($sql);
          $tab = $rep->fetchAll();
          if (!$tab) { // S'il n'y pas de sous cat alors affiche les produits
             $sql = "
              SELECT  pd.products_id, products_name, products_quantity, products_image, pd.products_description, products_price, c.parent_id, cd.categories_name, cd.categories_description, cd.categories_id, p.manufacturers_id, man.manufacturers_name
              FROM products_description pd
              INNER JOIN products p
              ON p.products_id = pd.products_id
              INNER JOIN products_to_categories pc
              ON pd.products_id = pc.products_id
              INNER JOIN categories_description cd
              ON pc.categories_id = cd.categories_id 
              INNER JOIN categories c
              ON cd.categories_id = c.categories_id
              INNER JOIN manufacturers man
              ON p.manufacturers_id = man.manufacturers_id
              WHERE cd.categories_id = $id";
              $rep2 = $db->query($sql);
              $y = 0;
              while($renv = $rep2->fetch()) {
                $return2[$y]['categories_ids'] = $id;
                $return2[$y]['categories_name'] = $renv['categories_name'];
                $return2[$y]['categories_description'] = $renv['categories_description'];
                $return2[$y]['products_id'] = $renv['products_id'];
                $return2[$y]['products_name'] = $renv['products_name'];
                $return2[$y]['products_quantity'] = $renv['products_quantity'];
                $return2[$y]['products_image'] = $renv['products_image'];
                $return2[$y]['products_price'] = $renv['products_price'];
                $return2[$y]['products_description'] = $renv['products_description'];
                $return2[$y]['manufacturers_id'] = $renv['manufacturers_id'];
                $return2[$y]['manufacturers_name'] = $renv['manufacturers_name'];
                $return2[$y]['parent_id'] = $renv['parent_id'];
                $y++;
              }
          }
          else { // S'il y a une sous categorie alors on enregistre les sous cat une part une puis on refait le test de sous cat
            for ($i=0; $i < sizeof($tab); $i++) {
              $return2[$i]['categories_name'] = $tab[$i]['categories_name'];
              $return2[$i]['categories_description'] = $tab[$i]['categories_description'];
              $return2[$i]['categories_id'] = $tab[$i]['categories_id'];
              $return2[$i]['produits'] = verifSousCatExist($tab[$i]['categories_id']);
            }
          }
        // $return = array();
        // $return = array('categories' => $return2, 'produits' => $r);
        return $return2;
      }

      $r = verifSousCatExist($id);
      // var_dump($r);
        if(isset($r[0]['categories_id'])) { // Si on a une sous categorie
          echo $r[0]['categories_description'];
          for ($i=0; $i < sizeof($r); $i++) { // on commence a liste les cat
            echo '<a href="'.$r[$i]['categories_id'].'" >'.$r[$i]['categories_name'].'</a><br/>';
              if (isset($r[$i]['produits'][0]['categories_id'])) { // Si on a une sous cat
                  for ($y=0; $y < sizeof($r[$i])-2; $y++) { 
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;-><a href="'.$r[$i]['produits'][$y]['categories_id'].'" >'.$r[$i]['produits'][$y]['categories_name'].'</a><br/>';
                    if (isset($r[$i]['produits'][$y]['produits'][0]['products_name'])) { // si on a des produit dans la sous cat
                      for ($x=0; $x < sizeof($r[$i]['produits'][$y]['produits']); $x++) { 
                          echo '<div style="margin-left:50px">'.
                          $r[$i]['produits'][$y]['produits'][$x]['products_image'].'<br/>
                          <a href="'.$r[$i]['produits'][$y]['produits'][$x]['products_name'].'" >'.$r[$i]['produits'][$y]['produits'][$x]['products_name'].'</a><br/>
                          Quantité : '.$r[$i]['produits'][$y]['produits'][$x]['products_quantity'].'<br/>
                          Prix : '.round($r[$i]['produits'][$y]['produits'][$x]['products_price'], 2).'<br/></div>';
                      }
                    }
                    else {
                      echo '<div style="margin-left:50px">Pas de produits dans cette categorie</div>';
                    }
                  }
              }
              else { // Si on a pas de sous cat
                if(isset($r[$i]['produits'][0])) // Si on a des produits
                  for ($y=0; $y < sizeof($r[$i]['produits']); $y++) { 
                    echo '<div style="margin-left:50px">'.
                    $r[$i]['produits'][$y]['products_image'].'<br/>
                    <a href="'.$r[$i]['produits'][$y]['products_name'].'" >'.$r[$i]['produits'][$y]['products_name'].'</a><br/>
                    Quantité : '.$r[$i]['produits'][$y]['products_quantity'].'<br/>
                    Prix : '.round($r[$i]['produits'][$y]['products_price'], 2).'<br/></div>';
                  }
              }
          }
        }
        elseif(!empty($r[0]['products_id'])) { // Si on a des produit direct
          //           if (1==1) {
          //   // echo zen_draw_pull_down_menu('filter_id', $options, (isset($_GET['filter_id']) ? $_GET['filter_id'] : ''), 'onchange="this.form.submit()"');

          // }
            //              <tr class="productListing-rowheading">
            //       <th class="productListing-heading" align="center" scope="col" id="listCell0-0">Image Produit</th>
            //       <th class="productListing-heading" scope="col" id="listCell0-1" ><h4  onclick="request(\'2d\', \''.$r[0]['categories_ids'].'\');" class="productListing-heading"><div  id="rangbylisteprod" style="margin-left:170px;background-position: -65px -16px;" >.</div>Nom Article</h4></th>
            //       <th class="productListing-heading" align="right" width="125" scope="col" id="listCell0-3" > <h4 onclick="request(\'3d\', \''.$r[0]['categories_ids'].'\');" class="productListing-heading"><div id="rangbylisteprod" style="margin-left:10px;background-position: -65px -16px;" >.</div>Prix</h4>
            // </th></th>
          echo '

                 <div id="barreTriProduit" >
                  <form style="margin-top:-2px;">
                  Trier par prix 
                  <select name="ordrePrix"  onchange="request(this.options[this.selectedIndex].value, \''.$r[0]['categories_ids'].'\');"  >
                    <option value="3a">Ordre croissant</option>
                    <option value="3d">Ordre decroissant</option>
                  </select>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trier par
                  <select name="ordreName"  onchange="request(this.options[this.selectedIndex].value, \''.$r[0]['categories_ids'].'\');"  >
                    <option value="">Marque</option>';
                    $manVerifDouble = array();
                    for ($i=0; $i < sizeof($r); $i++) { // Sert a verifier qu'on a pas de doublon de marque dans la liste
                      if($i==0) {
                        $manVerifDouble[$i] = $r[$i]['manufacturers_id'];
                        echo '<option onchange="request(this.options[this.selectedIndex].value, \''.$r[0]['categories_ids'].'\');" value="'.$r[$i]['manufacturers_id'].'">'.$r[$i]['manufacturers_name'].'</option>';
                      }
                      else {
                        if (!in_array($r[$i]['manufacturers_id'], $manVerifDouble)) {
                          $manVerifDouble[$i] = $r[$i]['manufacturers_id']; // On ajoute dans notre array s'il n'existe pas
                          echo '<option onchange="request(this.options[this.selectedIndex].value, \''.$r[0]['categories_ids'].'\');" value="'.$r[$i]['manufacturers_id'].'">'.$r[$i]['manufacturers_name'].'</option>';
                        }
                      }
                    }
                  echo '
                  </select>
                  </form>
                  </div>
                  <div id="conteneurListeProd">';
          for ($i=0; $i < sizeof($r); $i++) {
              if (strlen($r[$i]['products_description']) >= 200) {
              $r[$i]['products_description'] = substr($r[$i]['products_description'], 0, 150);
              $r[$i]['products_description'] .= '...';
              $r[$i]['products_description'] = stripslashes($r[$i]['products_description']);
              } elseif($r[$i]['products_description'] == null) { $r[$i]['products_description'] =  'Pas de description disponible'; }
              $r[$i]['products_description'] = str_replace('<p></p>', '', $r[$i]['products_description']);
              echo '<br/>
              <div id="wrapListeCat">
                <div id="imgListeCat">';
                  if(empty($r[$i]['products_image']) OR !file_exists('images/'.$r[$i]['products_image'].'')) {
                      echo '<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43&zenid=oqcvhm6b11063dcfir1jjiep42">
                      <img src="images/tbi_images/body/produits/prod1.png" alt="'.$r[$i]['products_name'].'" title=" '.$r[$i]['products_name'].'"" width="130" class="listingProductImage" style="position:relative" onmouseover="showtrail(\'images/no_picture.gif\',\''.$r[$i]['products_name'].'\',100,80,100,80,this,0,0,100,80);" onmouseout="hidetrail();">
                    </a>';
                  } else {
                      echo '<img src="images/'.$r[$i]['products_image'].'" />';
                  }
                    echo '
                  </div>
                  <div id="descListeCat">
                    <h3 style="background-color:#2798d4;color:white;font-size:1em;padding:7px;padding-left:15px;margin-top:-1px;width:394px;">' . $r[$i]['manufacturers_name'] . '</h3>
                      <div id="listeBod" class=""><p style="font-weight:bold">Référence :  '.$r[$i]['products_name'].'</p><p style="margin-top:-5px">'.$r[$i]['products_description'].'<a href="http://127.0.0.1/tbi/index.php?main_page=product_info&cPath=8&products_id=43"></p><img src="images/tbi_images/page_prod/savoir_plus.png" /></a>
                      </div>
                    </div>
                    <div id="prixListeCat" align="right">
                      <div class="prixListeCatOk">
                        <img src="images/tbi_images/page_prod/splash_prix.png" /><p style="margin-left:80px;margin-top:-40px">'.round($r[$i]['products_price'], 0).'<sup>&euro;</sup></p>
                      </div>
                      <div class="prixListeCatBarre">1200<sup>&euro;</sup></div>
                      <div class="prixListeCatStock"><span style="font-family:Tahoma;font-size:0.9em;color:#568203"> STOCK : </span>'.$r[$i]['products_quantity'].'</div>
                       <div class="prixListeCatAjouter" >
                        <img  name="products_id['.$r[$i]['products_id'].']" src="images/tbi_images/page_prod/ajouter_panier.png" />
                       </div>
                    </div>
                  </div>'; // fermeture wrapListeCat
           }
           echo '</div>';
        } else {
          echo 'pas de produits';
        }
      // var_dump($r);
    }
  } 
  catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
