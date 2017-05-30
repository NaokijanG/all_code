<?php
$sql = "SELECT COUNT( IF( field1 = '' AND field2 != '' , 1, NULL ) ) AS name_field
	FROM TABLE
	WHERE 1";
?>