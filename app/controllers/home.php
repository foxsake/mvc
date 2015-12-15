<?php


class Home extends Controller{

	public function index(){
		$m = $this->model('Category');
		if(isset($_SESSION['id'])){
			$name = $_SESSION['username'];
		}else{
			$name = 'you';
		}
		$this->render('home/index',['name'=>$name]);
	}

	public function category($id){
		//
	}

	public function about(){
		//
	}
}