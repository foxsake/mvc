<?php


class Scores extends Controller{

	public function __construct(){
		if(empty($_SESSION["id"])){
			$this->redirect('/mvc/public/');
		}
	}

	public function scorea($id,$inc){
		$score = $this->model('Score');
		$last = $score->last($id);
		$score->insert($id,$last['scorea']+$inc,$last['scoreb']);
		$this->redirect('/mvc/public/games/show/'.$id);
	}

	public function scoreb($id,$inc){
		$score = $this->model('Score');
		$last = $score->last($id);
		$score->insert($id,$last['scorea'],$last['scoreb']+$inc);
		$this->redirect('/mvc/public/games/show/'.$id);
	}

	public function undo($id){
		$score = $this->model('Score');
		$last = $score->undo($id);
		$this->redirect('/mvc/public/games/show/'.$id);
	}

	public function show($id){
		$game = $this->model('Game');
		$score = $this->model('Score');
		$this->render('scores/show',['items'=>$score->show($id),'game'=>$game->view_game($id)]);
	}
}