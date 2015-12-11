<?php


class Home extends Controller{

	public function index($test=''){
		$user = $this->model('User');
		$user->name = $test;
		$this->view('welcome',['name'=>$user->name]);
	}

	public function test(){
		echo 'test';
	}

	public function yes(){
		
	}
}