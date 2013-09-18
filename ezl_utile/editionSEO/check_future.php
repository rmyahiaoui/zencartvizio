<?php
require_once('../../catalog/main.php');
$sql = "SELECT DISTINCT date_parution,
		TYPE , count(1) cntr
		FROM eb_articles
		WHERE date_parution > now( )
		GROUP BY date_parution,TYPE
		ORDER BY date_parution,TYPE";
  $rs = & $conn->Execute($sql);
  echo '<table>';
  while(!$rs->EOF)
  {
     if ( $rs->fields['TYPE']=='Témoignage')
	 {
		echo '<tr bgcolor=gray>';
	 }
	 else
	 {
		echo '<tr>';
	 }
	 
	 
     echo '<td>';
	 echo $rs->fields['date_parution'];
     echo '</td>';

     echo '<td>';
	 echo $rs->fields['TYPE'];
     echo '</td>';

     echo '<td>';
	 echo $rs->fields['cntr'];	 	 
     echo '</td>';
	 
	 echo '</tr>';	 
     $rs->MoveNext();
  }
?>