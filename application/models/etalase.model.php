<?php
class EtalaseModel extends Model{
	public function __construct(){
		$this->connect();
		$this->_table = "etalase";		
	}
}