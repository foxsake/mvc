<?php


class Home extends Controller{

	public function index(){
		if(isset($_SESSION['id'])){
			$name = $_SESSION['username'];
		}else{
			$name = 'you';
		}
		$this->render('home/index',['name'=>$name]);
	}
}