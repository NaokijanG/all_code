<?php 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,"URL");
	$result=curl_exec($ch);
	curl_close($ch);
	$DATA = json_decode($result, true);

	$name     = $DATA['field1'] . ' ' . $DATA['field2'] . ' ' . $DATA['field3'];
 ?>