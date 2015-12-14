<?php

/**
* 
*/
class Teams extends Model{

	public function __construct(){
		$this->table = 'teams';
	}

	public function insert($name,$logo){
		return $this->query("INSERT INTO $this->table(name,logo) VALUES(?,?)", $name,$logo);
	}
	
}