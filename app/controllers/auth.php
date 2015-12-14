<?php

/**
* 
*/
class Auth extends Controller{
	
	function logout(){
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
        $this->redirect('/mvc/public');
    }

    function login(){
        if(!empty($_SESSION["id"])){
            $this->redirect('/mvc/public/');
        }
        $model = $this->model('User');
    	//TODO
    	if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // validate submission
        if (empty($_POST["username"])){
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"])){
            apologize("You must provide your password.");
        }

        $rows = $model->check($_POST["username"]);

        // if we found user, check password
        if (count($rows) == 1){
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row["hash"]) == $row["hash"]){
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];

                // redirect to portfolio
                $this->redirect("/mvc/public");
            }
        }

        // else apologize
        $this->apologize("Invalid username and/or password.");
    }
    else{
        $this->render("login_form", ["title" => "Log In"]);
    }
    }
}