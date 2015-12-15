<?php


class Categ extends Controller{

	public function __construct(){
        if(isset($_POST["admin"]) && $_POST["admin"]==false){
            $this->redirect("/mvc/public/home");
        }
    }

	public function index(){
		$m = $this->model('Category')->all();
		$this->render('category/index',['items' => $m]);
	}

	public function create(){
		$this->render('category/create',['target'=>'/mvc/public/categ/store']);
	}
	public function store(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if($this->model('Category')->count() < 5){
        	// validate submission
	        if (empty($_POST["name"])){
	            $this->apologize("You must provide category name.");
	        }
	       $game = $this->model('Category');
	       $res = $game->insert($_POST["name"]);

	       if(!$res){
	       	print_r('success!');
	       }else{
	       	print_r('failed!');
	       }
	    }else{
	    	print_r("you cant add anymore categories.");
	    }
	}
	}
	public function edit($id){
		$item = $this->model('Category')->get($id);
		$item = $item[0];
		$this->render('category/create',['target'=>'/mvc/public/categ/update',"item"=>$item]);
	}
	public function update(){
		$res = $this->model('Category')->update($_POST['id'],$_POST['name']);
		if(!$res){
			print_r('SUCCESS!');
		}else{
			print_r('FAIL!');
		}
	}
	public function delete($id){
		$res = $this->model('Category')->delete($id);
		$this->redirect('/mvc/public/categ');
	}
}