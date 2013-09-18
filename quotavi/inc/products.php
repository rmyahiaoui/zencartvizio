<?php
require_once('bdd.php');
require_once('devis.php');

function listProducts($tab_code_produit, $numSalle){
	$str = "";
	foreach($tab_code_produit as $key => $val){
		$req="SELECT t2.products_id, t2.master_categories_id, t3.products_name, t4.id_products, t1.categories_name
				FROM categories_description t1
				INNER JOIN products t2 ON t1.categories_id = t2.master_categories_id
				INNER JOIN products_description t3 ON t3.products_id = t2.products_id
				LEFT JOIN quotavi_commandes t4 ON t4.id_products = t2.products_id
				AND t4.id_devis =?
				AND t4.id_salle =?
				WHERE t1.categories_id =  ?";
		$tab = query($req, array($_SESSION['quotavi']['devis'], $numSalle, $val));
		$str .= "<form><select name='select_products'>";
		$str .='<option value="" cpt="'.$tab[0][0]->master_categories_id.'" class="select_products_'.$key.'"></option>';
			foreach($tab[0] as $value){
				$a = ($value->id_products!=null) ? 'selected="selected"' : '';
				$str .="<option value='".$value->products_id."' cpt='".$value->master_categories_id."' class='select_products_".$key."' ".$a.">".utf8_encode($value->products_name)."</option>";
			}
		$str .="</select></form>
		<div name='select_products' class='devis_pr_content select_products_".$key."'></div>";
	}
	return $str;
}

function product_details($id){
	$tab = query('select t2.products_name, t2.products_description, t1.products_price, t1.products_image from products t1, products_description t2 where t1.products_id=t2.products_id and t1.products_id = ?', array($id));
	$json = array();
	$i=0;
	foreach($tab[0] as $val){
		$json[$i++] = array("name" => utf8_encode($val->products_name), "desc" => utf8_encode($val->products_description), "price" => utf8_encode(round($val->products_price)), "illustration" => $val->products_image);
	}
	return json_encode($json);
}

function choixProduit($numSalle, $phrase, $tab_code_produit,$node, $class=""){
	$str ="<div id='mainCont'><strong class='devis_choix'>".$phrase."</strong>";
		$str.=listProducts($tab_code_produit, $numSalle);
		$str.=recapitulatif();
		$str.='<div class="clear"><a id="precedent" href="" class="devis_pr">Precedent</a>';
		$str.='<a id="suivant" class="devis_suiv buy '.$class.'" href="./index.php?main_page=quotavi&amp;salle='.$numSalle.'&amp;node='.$node.'">Suivant</a></div>';
		return $str;
}

function addProduct($idProduit, $codeProduit, $numSalle){
	$tab = query('update quotavi_commandes t1 
		join products t2 on t1.id_products = t2.products_id
		set t1.id_products= ?
		where t1.id_devis = ? and t1.id_salle = ? and t2.master_categories_id = ?', array($idProduit, $_SESSION['quotavi']['devis'], $numSalle, $codeProduit));
	$l = $tab[2]->rowCount();
	if($tab[2]->rowCount()==0){
		$t = query('select * from quotavi_commandes where id_devis = ? and id_products = ? and id_salle = ? ', array($_SESSION['quotavi']['devis'], $idProduit, $numSalle));
		if($t[2]->rowCount()==0)
			query('insert into quotavi_commandes(id_devis, id_products, id_salle) values(?,?,?)', array($_SESSION['quotavi']['devis'],$idProduit,$numSalle));
	}
	return json_encode(array("status"=>"ok"));
}

function removeProduct($codeProduit, $numSalle){
	$t = query('delete t1.* from quotavi_commandes t1 inner join products t2 on t1.id_products=t2.products_id where t1.id_devis = ? and t1.id_salle = ? and t2.master_categories_id = ?', array($_SESSION['quotavi']['devis'], $numSalle, $codeProduit));
	return json_encode(array("status"=>"ok"));
}
?>