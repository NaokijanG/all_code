<?php 
	header('Content-type: application/json');
	header('Access-Control-Allow-Origin:*');

	require($_SERVER['DOCUMENT_ROOT']."/connect/connect.php");
	mysql_select_db("hr");

	$rs = mysql_query("SELECT field1, field2, field3 FROM employee_identity WHERE 1");

	$rows = array();
	while($r = mysql_fetch_assoc($rs)){
		array_push($rows, $r);
	}
	
	print json_encode($rows);
 ?>
