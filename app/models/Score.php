<?php

/**
* 
*/
class Score extends Model{

	public function __construct(){
		$this->table = 'score';
	}

	public function insert($gameid,$scorea,$scoreb){
		return $this->query("INSERT INTO $this->table(gameid,scorea,scoreb) VALUES(?,?,?)", $gameid,$scorea,$scoreb);
	}

	public function last($id){
		$rows = $this->query("select * from $this->table where gameid = ? order by created desc limit 1",$id);
		return $rows[0];
	}

	public function show($id){
		return $this->query("select * from $this->table where gameid = ? order by created desc",$id);
	}

	public function undo($id){
		$this->query("delete from $this->table where $this->table.gameid = ? and $this->table.id = (select id from (select id from score as s where gameid = ? order by created desc limit 1) as t)",$id,$id);
	}
	
}