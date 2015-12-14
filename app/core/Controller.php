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

	public function dd($variable){
		require_once '../app/views/dump.php';
		exit;
	}

	function apologize($message)
    {
        $this->render("apology", ["message" => $message]);
        exit;
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists('../app/views/'.$template.'.php')){
            // extract variables into local scope
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