<?php

class Controller{
	//load ng model
	public function model($model){
		require_once '../app/models/'.$model.'.php';
		return new $model();
	}
    
	//load ng view
	public function view($view,$data=[]){
		require_once '../app/views/'.$view.'.php';
	}

    //die dump para sa debug.
	public function dd($variable){
		require_once '../app/views/dump.php';
		exit;
	}

    //print ng sorry
	function apologize($message){
        $this->render("apology", ["message" => $message]);
        exit;
    }

    //redirect sa ibang page
    function redirect($destination){
        if (preg_match("/^https?:\/\//", $destination)){
            header("Location: " . $destination);
        }else if (preg_match("/^\//", $destination)){
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }else{
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }
        exit;
    }

    //buoin yung page kasama yung settings.
    function render($template, $values = []){
        if (file_exists('../app/views/'.$template.'.php')){
            //for news only....
            $m = $this->model('Category');
            $values += ['cats'=>$m->all()];

            $ban = $this->model('Settings')->get_banner();
            $theme = $this->model('Settings')->get_theme();
            $layout = $this->model('Settings')->get_layout();
            $values += ['banner'=>$ban,'theme'=>$theme];
            
            extract($values);

            // render header
            require("../app/views/header.php");
            
            //render navigation
            require("../app/views/nav.php");
            
            // render template
            require("../app/views/$template.php");

            // render footer
            require("../app/views/footer.php");
        }else{
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
}