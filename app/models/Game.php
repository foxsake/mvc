<?php

/**
* 
*/
require_once 'Score.php';

class Game extends Model{

	public function __construct(){
		$this->table = 'game';
	}

	public function insert($teama,$teamb,$description){
		$this->query("INSERT INTO $this->table(teama,teamb,description) VALUES(?,?,?)", $teama,$teamb,$description);
		$last = $this->query("SELECT LAST_INSERT_ID() AS id");
		$last = $last[0]["id"];
		$score = new Score;
		return $score->insert($last,0,0);
	}
	
	public function all_games(){
		return $this->query("
			SELECT game.id,ta.name as tan,ta.logo as tal,tb.name as tbn,tb.logo as tbl,game.description,scorea,scoreb,score.created,game.started,game.ended 
			FROM game 
			join score on score.id = (
			    SELECT id 
			    FROM score 
			    WHERE gameid = game.id 
			    ORDER by created desc
			    LIMIT 1
			) 
			JOIN teams as ta
			on ta.id = game.teama
			JOIN teams as tb
			on tb.id = game.teamb
			WHERE ended is null
			ORDER by created desc
		");
	}

	public function all_ended_games(){
		return $this->query("
			SELECT game.id,ta.name as tan,ta.logo as tal,tb.name as tbn,tb.logo as tbl,game.description,scorea,scoreb,score.created,game.started,game.ended 
			FROM game 
			join score on score.id = (
			    SELECT id 
			    FROM score 
			    WHERE gameid = game.id 
			    ORDER by created desc
			    LIMIT 1
			) 
			JOIN teams as ta
			on ta.id = game.teama
			JOIN teams as tb
			on tb.id = game.teamb
			WHERE ended is not null
			ORDER by created desc
		");
	}

	public function view_game($id){
		return $this->query("
			SELECT game.id,ta.name as tan,ta.logo as tal,tb.name as tbn,tb.logo as tbl,game.description,scorea,scoreb,score.created,game.started,game.ended 
			FROM game 
			join score on score.id = (
			    SELECT id 
			    FROM score 
			    WHERE gameid = game.id 
			    ORDER by created desc
			    LIMIT 1
			) 
			JOIN teams as ta
			on ta.id = game.teama
			JOIN teams as tb
			on tb.id = game.teamb
			WHERE game.id = $id
			ORDER by created desc
			LIMIT 1
		");
	}

	public function end($id){
		return $this->query("update $this->table set ended = current_timestamp() where id = ?",$id);
	}
}