<?
//include ".../connect/connect.php";

require_once 'Classes/PHPExcel.php';
include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = "file.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray[1]['A'] =  'column_one';
$headingsArray[1]['B'] =  'column_two';
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, null, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}
echo '<table>';
foreach ($namedDataArray as $result) {
	$column_one = $result["column_one"];
	$column_two = $result["column_two"];
	//echo '<tr><td>'.$eq_group.'</td><td>'.$part_num.'</td></tr>';

	mysql_select_db("asset_am");
	$sql = "code_sql";
	mysql_query($sql);
	echo $sql.'<hr>';
}
echo '<table>';
?>