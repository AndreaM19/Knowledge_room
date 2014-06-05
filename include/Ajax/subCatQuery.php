<?php
@ require '../DB/dbUtility.php';
@ require '../DB/dbData.php';

$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );

$param=$_GET['cat'];

$queryText="SELECT subCategoryName FROM subCategory WHERE topCategory='".$param."'";
$query = dbUtility::queryToDB ( $dbConn, $queryText );

//Build Json File
header ('Content-Type: application/json');
echo "{";
$i=0;
while ( $row = mysqli_fetch_array ( $query ) ){
	if ($i != 0) {echo ',';}
	echo '"subCat'.$i.'": "'.$row['subCategoryName'].'"';
	$i++;
}
if ($i==0) {
	echo '"subCat": "Sorry no subcategory specified"';
}
echo "}";
//End Json File

dbUtility::freeMemoryAfterQuery ( $query );

dbUtility::disconnectFromDB ( $dbConn );
