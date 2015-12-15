<?php

/**
* 
*/
class User extends Model{

	public function __construct(){
		$this->table = 'users';
	}
	
	public function check($username){
		return $this->query("SELECT * FROM users WHERE username = ?", $username);
	}

	public function insert($username,$hash){
		return $this->query("INSERT INTO users(username, hash) VALUES(?,?)",$username , $hash);
	}

	public function ban($id){
		return $this->query("update $this->table set banned = true where id = ?",$id);
	}

	public function unban($id){
		return $this->query("update $this->table set banned = false where id = ?",$id);
	}

	public function all_na(){
		return $this->query("SELECT * FROM $this->table WHERE admin = false");
	}

	
}