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

	
}