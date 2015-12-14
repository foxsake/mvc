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

	
}