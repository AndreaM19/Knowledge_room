<?php
class DateManager{
	private $date;
	
	public function __construct(){
		$this->date=date_create();
	}
	
	public function getDate(){
		date_timestamp_set($this->date,1371803321);
		return date_format($this->date,"Y-m-d");
	}
}