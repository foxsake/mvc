<?php

/**
* 
*/
class Category extends Model{

	public function __construct(){
		$this->table = 'category';
	}

	public function insert($name){
		return $this->query("INSERT INTO $this->table(name) values(?)",$name);
	}

	public function update($id,$name){
		return $this->query("UPDATE $this->table SET name = ? where id = ?",$name,$id);
	}
	
}