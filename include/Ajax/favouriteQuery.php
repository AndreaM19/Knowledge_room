<?php
@ require '../DB/dbUtility.php';
@ require '../DB/dbData.php';

$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );

$param=$_GET['resourceTitle'];

$queryText="INSERT INTO favourite (favouriteId, resourceTitle, star, eye) VALUES (NULL, '".$param."', 1, 0)";

//$queryText="SELECT subCategoryName FROM subCategory WHERE topCategory='".$param."'";
$query = dbUtility::queryToDB ( $dbConn, $queryText );

dbUtility::freeMemoryAfterQuery ( $query );

dbUtility::disconnectFromDB ( $dbConn );
