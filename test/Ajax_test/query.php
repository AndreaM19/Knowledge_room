<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';

$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );

$param=$_GET['reg'];

$queryText="SELECT subCategoryName FROM subCategory WHERE topCategory='".$param."'";
$query = dbUtility::queryToDB ( $dbConn, $queryText );

//Build Json File
header ('Content-Type: application/json');
echo "{";
$i=0;
while ( $row = mysqli_fetch_array ( $query ) ){
	if ($i != 0) {echo ',';}
	echo '"prov'.$i.'": "'.$row['subCategoryName'].'"';
	$i++;
}
echo "}";
//End Json File

dbUtility::freeMemoryAfterQuery ( $query );

dbUtility::disconnectFromDB ( $dbConn );
