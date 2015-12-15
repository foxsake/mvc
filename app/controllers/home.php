<?php


class Home extends Controller{

	public function index(){
		$m = $this->model('Post')->all_in();
		$this->render('home/index',['items'=>$m]);
	}

	public function category($id){
		$m = $this->model('Post')->get_categ($id);
		$this->render('home/index',['items'=>$m]);
	}

	public function post($id){
		$m = $this->model('Post')->view_post($id);
		$c = $this->model('Comment')->comments($id);
		$this->render('home/post',['item'=>$m , 'comments'=>$c]);
	}

	public function about(){
		$this->render('home/about');
	}

	public function leavecomment($id){
		if(!isset($_SESSION["id"])){
			$this->apologize("You need to be logged in to leave a comment.");
		}
		$this->render('home/comment',['target'=>'/mvc/public/home/store','id'=>$id]);
	}

	public function store(){
		if(!isset($_SESSION["id"])){
			$this->apologize("You need to be logged in to leave a comment.");
		}

		$mdl = $this->model('Comment');
		$mdl->insert($_POST['id'],$_SESSION["id"],$_POST["comment"]);
		$this->redirect("/mvc/public/home/post/".$_POST['id']);
	}

	public function refreshcomment($id){

		print_r(json_encode($this->model('Comment')->comments($id)));
	}

	public function search(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$m = $this->model('Post')->search($_POST["search"]);
			$this->render('home/index',['items'=>$m]);
		}
	}
}