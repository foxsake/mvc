<?php


class Games extends Controller{

	public function __construct(){
		if(empty($_SESSION["id"])){
			$this->redirect('/mvc/public/');
		}
	}

	public function index(){
		$model = $this->model('Game');
		$this->render('games/index',["items" => $model->all_games()]);
	}

	public function ended(){
		$model = $this->model('Game');
		$this->render('games/index',["items" => $model->all_ended_games()]);
	}

	public function create(){
		$rows = $this->model('Teams')->all();
		$teams = [];
		foreach ($rows as $row) {
			$teams[] = [
				"id" => $row["id"],
                "name" => $row["name"]
            ];
		}
		$this->render('games/create',['teams'=>$teams]);
	}

	public function store(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
        	// validate submission
	        if (empty($_POST["teama"])){
	            $this->apologize("You must provide Team A.");
	        }
	        else if (empty($_POST["teamb"])){
	            $this->apologize("You must provide team B.");
	       }

	       $game = $this->model('Game');
	       $game->insert($_POST["teama"],$_POST["teamb"],$_POST["description"]);
	       if($game){
	       	print_r('success!');
	       }else{
	       	print_r('failed!');
	       }

	    }
	}

	public function refresh(){
		$model = $this->model('Game');
		print_r(json_encode($model->all_games()));
	}

	public function show($id){
		$model = $this->model('Game');
		$this->render('games/view',["items" => $model->view_game($id)]);
	}

	public function end($id){
		$model = $this->model('Game');
		$model->end($id);
		$this->redirect('/mvc/public/games/show/'.$id);
	}

}