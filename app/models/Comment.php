<?php

/**
* 
*/
class Comment extends Model{

	public function __construct(){
		$this->table = 'comment';
	}

	public function comments($id){
		return $this->query("
			select comment.id,users.username,comment.comment,comment.date
			from comment 
			join users 
			on users.id = comment.userid
			");
	}

	public function insert($postid,$userid,$comment){
		return $this->query("
			insert into $this->table(postid,userid,comment) values(?,?,?)
		",$postid,$userid,$comment);
	}
}