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

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"http://10.11.15.122/api-materials/emp.php?eid=$eid");
	$result=curl_exec($ch);
	curl_close($ch);
	$DATA = json_decode($result, true);

	$name     = $DATA['field1'] . ' ' . $DATA['field2'] . ' ' . $DATA['field3'];
 ?>