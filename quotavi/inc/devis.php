<?php
require_once('bdd.php');

function chargerDevis($numDevis){
	$tab = query('select t1.id_salle, t1.nom_salle, t1.equipement_tableau, t1.equipement_proj, t1.equipement_ordi, t1.equipement_logiciel, t1.equipement_service, t1.arrianne_proj, t1.arrianne_info, t1.arrianne_acc, t1.arrianne_serv, t2.l_node, t2.l_salle from quotavi_salles t1, quotavi_devis t2 where t1.id_devis = t2.id and t1.id_devis = ?', array($numDevis));
	$size = $tab[2]->rowCount();
	$tab_salles = array();
	$lNode = "";
	$lSalle = "";
	$_SESSION['quotavi']['equipement'] = array();
	if($size>0){
		$_SESSION['quotavi']['nb_salle']=$size;
		foreach ($tab[0] as $key => $value){
			$tab_salles[$key+1]=$value->nom_salle;
			$lNode = $value->l_node; 
			$lSalle = $value->l_salle;
			$equip = array();
			if($value->equipement_tableau=="1")
				$equip['tableau'] = true;
			if($value->equipement_proj=="1")
				$equip['proj'] = true;
			if($value->equipement_ordi=="1")
				$equip['ordi'] = true;
			if($value->equipement_logiciel=="1")
				$equip['logiciel'] = true;
			if($value->equipement_service=="1")
				$equip['service'] = true;

			if($_SESSION['quotavi']['arrianne'][$value->id_salle] == null)
				$_SESSION['quotavi']['arrianne'][$value->id_salle]= array();
			if(!empty($value->arrianne_proj))
				$_SESSION['quotavi']['arrianne'][$value->id_salle]['proj'] = $value->arrianne_proj;
			if(!empty($value->arrianne_info))
				$_SESSION['quotavi']['arrianne'][$value->id_salle]['info'] = $value->arrianne_info;
			if(!empty($value->arrianne_acc))
				$_SESSION['quotavi']['arrianne'][$value->id_salle]['acc'] = $value->arrianne_acc;
			if(!empty($value->arrianne_serv))
				$_SESSION['quotavi']['arrianne'][$value->id_salle]['serv'] = $value->arrianne_serv;

			$_SESSION['quotavi']['equipement'][$value->id_salle] = $equip;
		}
		$_SESSION['quotavi']['salles_name']=$tab_salles;
		$_SESSION['quotavi']['devis']=$numDevis;
		
		return json_encode(array('status'=>'ok', 'node'=>$lNode, 'lSalle' => $lSalle));
	}
	else{
		return json_encode(array("status"=>"ko"));
	}
}

function creerDevis($customersId = null){
	if($customersId!=null)
		$r = query('insert into quotavi_devis(customers_id) values(?)', array($customersId));
	else
		$r = query('insert into quotavi_devis() values()', array());
	$_SESSION['quotavi']['devis']=$r[1]->lastInsertId();
	return json_encode(array("status"=>"ok","devis" => $_SESSION['quotavi']['devis']));
}

function genererDevis(){
	$str = '';
	$addr = query('SELECT t1.entry_firstname, t1.entry_lastname, t1.entry_street_address, t1.entry_suburb, t1.entry_postcode, t1.entry_city, t1.entry_state
	FROM address_book t1, customers t2, quotavi_devis t3
	WHERE t3.customers_id = t2.customers_id
	AND t2.customers_default_address_id = t1.address_book_id
	AND t3.id = ? ', array($_SESSION['quotavi']['devis']));

	$str.='<div id="hplAddr">SARL HPL<br/>47, rue Marcel Dassault<br/>92100 BOULOGNE</div>';
	$str.='<div id="facturation"> Mr/Mme '.$addr[0][0]->entry_firstname.' '.$addr[0][0]->entry_lastname.'<br/>Adresse : '.$addr[0][0]->entry_street_address.'<br/>Code postale : '.$addr[0][0]->entry_postcode.'<br/>Ville : '.$addr[0][0]->entry_city.'<br/>'.$addr[0][0]->entry_state.'</div>';
	$tab = query('select t4.products_name, t1.products_price, t1.master_categories_id, t3.nom_salle, t3.id_salle from products t1, quotavi_commandes t2, quotavi_salles t3, products_description t4 where t2.id_devis= ? and t1.products_id=t2.id_products and t1.products_id=t4.products_id and t2.id_devis = t3.id_devis and t2.id_salle = t3.id_salle order by t3.id_salle asc', array($_SESSION['quotavi']['devis']));
	$str.='<div id="mainContent" class="devisContainer"><h2>Devis n° '.$_SESSION['quotavi']['devis'].'</h2>';
	$cont = array();
	$totSalleArray = array();
	$sousCat = array("Intéractivité" =>array(40,41), "Projection" =>array(38, 36, 37), "Tableau" =>array(49), "Malette"  =>array(39), "Ordinateur" =>array(42,43), "Logiciel"  =>array(45), "Accessoires (Potence)" => array(34), "Accessoires (Visualisateur)" => array(35), "Service (Formation)" => array(44), "Service (Installation)" => array(47),"Service (Assistance)" => array(48));
	$Cat = array("Projection Interactive" => array('Intéractivité', 'Projection', 'Tableau', 'Malette'), "Informatique" => array('Logiciel', 'Ordinateur'), "Accessoires" => Array('Accessoires (Potence)', 'Accessoires (Visualisateur)'), "Services" => array('Service (Formation)', 'Service (Installation)', 'Service (Assistance)'));
	$couleurCat = array("Projection Interactive" => "c1", "Informatique" =>"c2", "Accessoires" => "c3", "Services" => "c4");
	foreach ($tab[0] as $key => $value){
		$totSalleArray[$value->id_salle] += round($value->products_price);
		if($cont[$value->nom_salle]==null)
			$cont[$value->nom_salle] = array($value->master_categories_id => array("name" => utf8_encode($value->products_name), "price" => round($value->products_price)));
		else
			$cont[$value->nom_salle][$value->master_categories_id] = array("name" => utf8_encode($value->products_name), "price" => round($value->products_price));
	}
	$str.='<table class="devis"><tr><td colspan="2"></td>';
	foreach ($cont as $key => $value){
		$str.='<td colspan="2">'.$key.'</td>';
	}
	$str.='</tr>';
	foreach ($Cat as $k => $sousCatName){
		$couleur = "class=".$couleurCat[$k];
		$str.='<tr><td '.$couleur.' rowspan="'.count($sousCatName).'">'.$k.'</td>';
		foreach ($sousCatName as $key => $name){
			$str.='<td '.$couleur.'>'.$name.'</td>';
			foreach ($cont as $t => $salle){
				foreach ($sousCat[$name] as $n => $codeCat){
					if($salle[$codeCat]!=null){
						$str.='<td '.$couleur.'>'.$salle[$codeCat]["name"].'</td><td '.$couleur.'><span class="format_price">'.$salle[$codeCat]["price"].'</span>€</td>';
						break;
					}
					else if($n+1==count($sousCat[$name]))
						$str.='<td '.$couleur.'>-</td><td '.$couleur.'>-</td>';
				}
			}
			$str.='</tr>';
		}
	}

	$str.='<tr><td colspan="2">Total</td>';
	$totSite = 0;
	foreach ($totSalleArray as $key => $value){
		$str.='<td colspan="2"><span class="format_price">'.$value.'</span>€</td>';
		$totSite+=$value;
	}
	$str.='</tr></table>';
	$str.='<p>Total Site : <span class="format_price">'.$totSite.'</span>€</p>';
	$str.='<a href="" class="print button">Imprimer</a>';
	return $str;
}

function recapitulatif(){
	$str ='<div class="devis_sidebar"><h3>Votre installation</h3>';
	$tab = query('select t4.products_name, t1.products_price, t3.nom_salle, t3.id_salle from products t1, quotavi_commandes t2, quotavi_salles t3, products_description t4 where t2.id_devis= ? and t1.products_id=t2.id_products and t4.products_id=t1.products_id and t2.id_devis = t3.id_devis and t2.id_salle = t3.id_salle order by t3.id_salle asc', array($_SESSION['quotavi']['devis']));
	$lSalle="";
	$size = count($tab[0]);
	$tot = 0;
	foreach ($tab[0] as $key => $value){
		if($lSalle != $value->id_salle){
			if($key>0)
				$str.='</ul>';
			$str.='<strong>'.$value->nom_salle.'<strong><ul>';
			$lSalle=$value->id_salle;
		}
		$str.='<li>'.utf8_encode($value->products_name).'</li>';
		$tot += round($value->products_price);
	}
	$str.='</ul>Total : <span class="format_price">'.$tot.'</span>€</div></div>';
	if($size>0)
		return $str;
	else
		return "";
}
?>