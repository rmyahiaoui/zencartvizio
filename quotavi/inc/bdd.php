<?php
$host= "10.0.208.26";
$port="3306";
$bd="vizio";
$user="root";
$pw="abidjan";

$co = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$bd, $user, $pw);

function query($rqt, $data){
	global $co;
	$sth  = $co->prepare($rqt);
	$sth->execute($data);
	$sth->setFetchMode(PDO::FETCH_OBJ);
	return array($sth->fetchAll(), $co, $sth);
}
?>
