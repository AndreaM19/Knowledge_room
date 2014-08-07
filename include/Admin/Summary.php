<?php

class Summary{
	private $topCatTot;
	private $subCatTot;
	private $itemTot;
	
	public function __construct($databaseConnection){
		$data=$this->getDataFromDb($databaseConnection);
		$this->topCatTot=$data['top'];
		$this->subCatTot=$data['sub'];
		$this->itemTot=$data['item'];
	}
	
	public function getTopCatTot(){
		return $this->topCatTot;
	}
	
	public function getSubCatTot(){
		return $this->subCatTot;
	}
	
	public function getItemTot(){
		return $this->itemTot;
	}
	
	private function getDataFromDb($databaseConnection){
		$dbConn = $databaseConnection;
		//Query text
		$queryTextTopCat="select count(categoryId) as topCatTot from topcategory;";
		$queryTextSubCat="select count(subcategoryId) as subCatTot from subcategory;";
		$queryTextItem="select count(resourceId) as itemTot from resource";
		//Launch query to db
		$query_topCat=dbUtility::queryToDB ( $dbConn, $queryTextTopCat);
		$query_subCat=dbUtility::queryToDB ( $dbConn, $queryTextSubCat);
		$query_item=dbUtility::queryToDB ( $dbConn, $queryTextItem);
		
		$data_1 = mysqli_fetch_assoc ( $query_topCat );
		$data_2 = mysqli_fetch_assoc ( $query_subCat );
		$data_3 = mysqli_fetch_assoc ( $query_item );
		
		$a = array('top' => $data_1 ['topCatTot'], 'sub' => $data_2 ['subCatTot'], 'item' => $data_3 ['itemTot']);
		return $a;
	}
}