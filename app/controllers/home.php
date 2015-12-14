<?php


class Home extends Controller{

	public function index(){
		$model = $this->model('Game');
		$this->render('home/index',["items" => $model->all_games()]);
	}

	public function show($id){
		$model = $this->model('Game');
		$this->render('home/view',["items" => $model->view_game($id)]);
	}

	public function refresh(){
		$model = $this->model('Game');
		print_r(json_encode($model->all_games()));
	}

	public function history($id){
		$game = $this->model('Game');
		$score = $this->model('Score');
		$this->render('scores/show',['items'=>$score->show($id),'game'=>$game->view_game($id)]);
	}

	public function refreshshow($id){
		$model = $this->model('Game');
		print_r(json_encode($model->view_game($id)));
	}

	public function ended(){
		$model = $this->model('Game');
		$this->render('home/index',["items" => $model->all_ended_games()]);
	}

}