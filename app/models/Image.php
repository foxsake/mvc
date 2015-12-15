<?php

/**
* 
*/
class Image extends Model{

	public function __construct(){
		$this->table = 'images';
	}

	public function insert($id,$filename){
		return $this->query("INSERT INTO $this->table(postid,image) VALUES(?,?)",$id,$filename);
	}

	public function deleteimg($id){
		return $this->query("DELETE FROM $this->table where postid = ?",$id);
	}
}