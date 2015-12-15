<?php

/**
* 
*/
class Post extends Model{

	public function __construct(){
		$this->table = 'post';
	}

	public function insert($catid,$title,$content){
		return $this->query("INSERT INTO $this->table(categoryid,title,content) VALUES(?,?,?)",$catid,$title,$content);
	}

	public function update($id,$categoryid,$title,$content){
		return $this->query("update $this->table set categoryid = ?, title = ? , content = ? where id = ?",$categoryid,$title,$content,$id);
	}

	public function get_categ($id){
		return $this->query("select * from $this->table where categoryid = ?",$id);
	}
	
}