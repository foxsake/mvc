<?php

/**
* 
*/
class Settings extends Model{

	public function __construct(){
		$this->table = 'settings';
	}
	
	public function get_banner(){
		$var = $this->query("select * from $this->table limit 1");
		return $var[0]['banner'];
	}

	public function set_banner($banner){
		return $this->query("update $this->table set banner = ?", $banner);
	}
	
}