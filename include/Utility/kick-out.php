<?php
function kickOut($whoami, $showMessage){
	$path="signin.php";
	if($showMessage)$path=$path."?msg=auth%20required";
	if(!isset($whoami))header("location:".$path."");
	else return;
}