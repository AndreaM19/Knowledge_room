<?php
@ require '../../include/DB/dbUtility.php';
@ require '../../include/DB/dbData.php';
require_once '../../include/Auth/LoginSessions.php';
@require '../../include/Utility/kick-out.php';
?>

<?php
$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );
?>

<?php
LoginSessions::startSession();
?>

<?php
kickOut($_SESSION['role'], true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="img/ico/favicon.ico">

<title>Welcome to Knowledge Room</title>


</head>

<body>


<?php
$success=false;
if(isset($_GET['addItem']) & @$_GET['addItem']==1){
	$queryText = "INSERT INTO resource (resourceId, title, annotationDate, description, subCategory) VALUES (NULL, '".$_POST['title']."', '25-06-2014', '".$_POST['comment']."', '".$_POST['subCategory']."')";
	
	if(dbUtility::queryToDB ( $dbConn, $queryText ))$success=true; 
	dbUtility::freeMemoryAfterQuery ( $query );
	
	if($success)echo"<h1>OK</h1>";
	else echo"<h1>Error</h1>";
}
?>

<?php
dbUtility::disconnectFromDB ( $dbConn );
?>
