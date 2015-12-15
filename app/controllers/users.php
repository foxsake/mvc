<?php


class Users extends Controller{

	public function __construct(){
        if(isset($_POST["admin"])&& $_POST["admin"]==false){
            $this->redirect("/mvc/public/home");
        }
    }

	public function index(){
		$m = $this->model('User')->all_na();
		$this->render('user/index',['items' => $m]);
	}

	public function ban($id){
		$m = $this->model('User');
		$m->ban($id);
		$this->redirect('/mvc/public/users/');
	}

	public function unban($id){
		$m = $this->model('User');
		$m->unban($id);
		$this->redirect('/mvc/public/users/');
	}

}