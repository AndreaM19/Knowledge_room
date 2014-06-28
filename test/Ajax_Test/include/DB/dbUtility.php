<?php
/*PHP Database Functions*/
class dbUtility{
	
	/*Open connection to a Database*/
	public static function connectToDB($host, $user, $password, $db){
		$conn = mysqli_connect($host, $user, $password, $db) or die ("An error is occured" . mysqli_error($conn));
		//mysqli_select_db($db, $conn);
		return $conn;
	}

	/*Close a connection to a Database*/
	public static function disconnectFromDB($connToClose){
		mysqli_close($connToClose);
	}
	
	/*Database Query*/
	public static function queryToDB($conn, $queryText){
		if(isset($conn)){
			$myQuery=mysqli_query($conn, $queryText);
		return $myQuery;
		}
		else return false;
				
	}
	
	/* This function is used to free memory space after queries*/
	public static function freeMemoryAfterQuery($queryValue){
		mysqli_free_result($queryValue);
	}
	
}
