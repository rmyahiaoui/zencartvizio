<?php
require_once('bdd.php');

function saveSalles($names){
	$salles_name=array();
	foreach ($names as $key => $value){
		$salles_name[$key] = $value;
		query('insert into quotavi_salles(id_devis, id_salle, nom_salle) values(?,?,?)', array($_SESSION['quotavi']['devis'], $key, $value));
	}
	$_SESSION['quotavi']['salles_name']=$salles_name;
	$_SESSION['quotavi']['nb_salle']= count($names);
	return json_encode(array("status"=>"ok"));
}

function initEquipement($numSalle){
	if($_SESSION['quotavi']['equipement']==null)
		$_SESSION['quotavi']['equipement']=array();
	$equip = array();
	if(!empty($_POST['tableau']))
		$equip['tableau']=true;
	if(!empty($_POST['proj']))
		$equip['proj']=true;
	if(!empty($_POST['ordi']))
		$equip['ordi']=true;
	if(!empty($_POST['logiciel']))
		$equip['logiciel']=true;
	if(!empty($_POST['services']))
		$equip['service']=true;
	$_SESSION['quotavi']['equipement'][$numSalle]=$equip;
	query('update quotavi_salles set equipement_tableau = ?, equipement_proj = ?, equipement_ordi = ?, equipement_logiciel = ?, equipement_service = ? where id_devis = ? and id_salle = ?', array($equip['tableau'],$equip['proj'],$equip['ordi'],$equip['logiciel'],$equip['service'],$_SESSION['quotavi']['devis'], $numSalle));
	return json_encode(array("status"=>"ok"));
}

function nextNode($node, $numSalle){
	if($node=="proj_inter" && $_SESSION['quotavi']['equipement'][$numSalle]['tableau']==true)
		$node="ordi_f";
	if($node=="mi_f" && $_SESSION['quotavi']['equipement'][$numSalle]['tableau']==true)
		$node="ordi_f";
	if($node=="miwb" && $_SESSION['quotavi']['equipement'][$numSalle]['ordi']==true)
		$node="logiciel";
	if($node=="vp" && $_SESSION['quotavi']['equipement'][$numSalle]['proj']==true)
		$node="proj_f";
	if($node=="malette" && $_SESSION['quotavi']['equipement'][$numSalle]['proj']==true)
		$node="ordi_m";
	if($node=="proj_m" && $_SESSION['quotavi']['equipement'][$numSalle]['ordi']==true)
		$node="logiciel";
	if($node=="ordi_m" && $_SESSION['quotavi']['equipement'][$numSalle]['ordi']==true)
		$node="logiciel";
	if($node=="ordi_m" && $_SESSION['quotavi']['equipement'][$numSalle]['logiciel']==true)
		$node="accessoires";
	if($node=="tableau" && $_SESSION['quotavi']['equipement'][$numSalle]['tableau']==true)
		$node="ordi_f";
	if($node=="tableau" && $_SESSION['quotavi']['equipement'][$numSalle]['ordi']==true)
		$node="logiciel";
	if($node=="ordi_f" && $_SESSION['quotavi']['equipement'][$numSalle]['ordi']==true)
		$node="logiciel";
	if($node=="ordi_f" && $_SESSION['quotavi']['equipement'][$numSalle]['logiciel']==true)
		$node="accessoires";
	if($node=="logiciel" && $_SESSION['quotavi']['equipement'][$numSalle]['logiciel']==true)
		$node="accessoires";
	if($node=="accessoires" && $_SESSION['quotavi']['equipement'][$numSalle]['service']==true){
		if($numSalle+1<=$_SESSION['quotavi']['nb_salle']){
			$node="equipement";
			$_GET['salle']++;
		}
		else
			$node="devis";
	}
	return $node;
}

function nextN($currentNode,$numSalle){
	global $nodes;
	$voisin = $nodes[$currentNode]->getNeighbours();
	if(count($voisin)==0)
		return '';
	else{
		$voisinNom = $voisin[0]->getMetadata('name');
		$voisinCut =  split('_', $voisinNom);
		while($_SESSION['quotavi']['equipement'][$numSalle][$voisinCut[0]]==true){
			$voisin = $nodes[$voisinNom]->getNeighbours();
			$voisinNom = $voisin[0]->getMetadata('name');
			$voisinCut =  split('_', $voisinNom);
		}
		return $voisin[0]->getMetadata('name');
	}
}

function enTete($i, $numSalle){
	$str='<div class="devis_breadcrumb">
		<span>Salles:</span>';
	
	foreach($_SESSION['quotavi']['salles_name'] as $key => $value){
		$active = "";
		if($numSalle==$key)
			$active = "active";

		if(!empty($_SESSION['quotavi']['arrianne'][$key]["proj"]))
			$link = '<a href="./index.php?main_page=quotavi&amp;salle='.$key.'&amp;node='.$_SESSION['quotavi']['arrianne'][$key]["proj"].'" class="'.$active.'">'.$_SESSION['quotavi']['salles_name'][$key].'</a>';
		else
			$link = '<a href="">'.$_SESSION['quotavi']['salles_name'][$key].'</a>';

		$str.=$link;
	}
	$str.='</div>
		<div class="devis_navigation_pipe">       
   		<ul class="devis_step">';
	$j=0;
	$arriane = array("Votre solution de Projection interactive" =>"proj", "Vos besoins en Informatique et logiciels" =>"info", "Vos Accessoires" => "acc", "Vos besoins en Formation et Service" =>"serv", "Votre Devis" =>"devis");
	$steps = array("one", "two", "three", "four", "five", "six");
	$couleurCat = array("Projection Interactive" => "c1", "Informatique" =>"c2", "Accessoires" => "c3", "Services" => "c4", "Devis" => "c5");
	foreach ($arriane as $key => $value){
		$str .='<li class="devis_step '. $steps[$j].' ';
		$str .=(($j<$i+1)?'step_active">':'">');
		$str .='<span></span>';
		if(!empty($_SESSION['quotavi']['arrianne'][$numSalle][$value]))
			$str .= '<a href="./index.php?main_page=quotavi&amp;salle='.$numSalle.'&amp;node='.$_SESSION['quotavi']['arrianne'][$numSalle][$value].'">'.$key.'</a>';
		else
			$str .= '<a href="">'.$key.'</a>';
		$str .='<span class="arrow"></span>
		</li>';
		$j++;
	}
	$str.="</div>";
	return $str;
}

function afficheEnTete($node, $numSalle){
	if($node=="type" || $node=="fixe" || $node=="mi_f" || $node=="mi_m" || $node == "malette" || $node == "vp" || $node == "proj_inter" || $node =="proj_f" || $node == "miwb")
		return enTete(1, $numSalle);
	else if($node=="tableau"|| $node=="proj_m")
		return enTete(2, $numSalle);
	else if($node=="ordi_m"||$node=="logiciel"||$node=="ordi_f")
		return enTete(3, $numSalle);
	else if($node=="accessoires")
		return enTete(4, $numSalle);
	else if($node=="services")
		return enTete(5, $numSalle);
	else if($node=="devis")
		return enTete(6, $numSalle);
}

function saveArrianne($numSalle){
	if(!empty($_GET['node']) && !empty($_SESSION['quotavi']['devis'])){
		if($_SESSION['quotavi']['arrianne']==null)
			$_SESSION['quotavi']['arrianne'] = array();
		if($_SESSION['quotavi']['arrianne'][$numSalle]==null)
			$_SESSION['quotavi']['arrianne'][$numSalle] = array();
		if($_GET['node']=="proj_inter" || $_GET['node'] == "vp" ||$_GET['node'] =="mi_m")
			$_SESSION['quotavi']['arrianne'][$numSalle]["proj"]=$_GET['node'];
		if($_GET['node']=="ordi_f" ||$_GET['node'] =="ordi_m")
			$_SESSION['quotavi']['arrianne'][$numSalle]["info"]=$_GET['node'];
		if($_GET['node']=="accessoires")
			$_SESSION['quotavi']['arrianne'][$numSalle]["acc"]=$_GET['node'];
		if($_GET['node']=="services")
			$_SESSION['quotavi']['arrianne'][$numSalle]["serv"]=$_GET['node'];
		if($_GET['node']=="devis")
			$_SESSION['quotavi']['arrianne'][$numSalle]["devis"]=$_GET['node'];
		query('update quotavi_salles set arrianne_proj = ?, arrianne_info = ?, arrianne_acc = ?, arrianne_serv = ? where id_devis = ? and id_salle = ?', array($_SESSION['quotavi']['arrianne'][$numSalle]["proj"], $_SESSION['quotavi']['arrianne'][$numSalle]["info"], $_SESSION['quotavi']['arrianne'][$numSalle]["acc"], $_SESSION['quotavi']['arrianne'][$numSalle]["serv"], $_SESSION['quotavi']['devis'], $numSalle));
	}
}


function saveInfos($lNode, $numSalle){
	$tab = query('update quotavi_devis set l_node = ?, l_salle = ? where id = ?', array($lNode, $numSalle,$_SESSION['quotavi']['devis']));
	return json_encode(array('status'=>'ok'));
}
?>