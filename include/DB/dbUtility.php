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
	
	
	/*This function is used for counting item into a top category*/
	public static function itemCounter($conn, $subCat){
		if(isset($conn)){
			$queryText = "SELECT count(resourceId) AS total FROM resource WHERE subcategory='" . $subCat . "'";
			$myQuery=mysqli_query($conn, $queryText);
			$data = mysqli_fetch_assoc ( $myQuery );
			$tot=$data ['total'];
		return $tot;
		}
		else return false;		
	}
	
}
