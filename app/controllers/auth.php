<?php

/**
* 
*/
class Auth extends Controller{
	
	public function logout(){
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

    public function login(){
        if(!empty($_SESSION["id"])){
            $this->redirect('/mvc/public/');
        }
        $model = $this->model('User');

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
                if($row["banned"]==true){
                    $this->apologize('Sorry, It Seems You had been banned!');
                }
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["admin"] = $row["admin"];
                if($_SESSION["admin"]==true)
                    $this->redirect("/mvc/public/amdin/");
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

    public function register(){
        $users = $this->model('User');
        // if form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["username"])){
                $this->apologize("You must provide your username.");
            }else if (empty($_POST["password"])){
                $this->apologize("You must provide your password.");
            }else if (empty($_POST["confirmation"])){
                $this->apologize("You must retype your password.");
            }else if($_POST["password"] != $_POST["confirmation"]){
                $this->apologize("Your passwords must match.");
            }

            $suc = $users->insert($_POST["username"],crypt($_POST["password"]));
            
            if($suc === false){
                $this->apologize("Username already taken.");
            }else{
                $id = $users->last_insert_id();
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $_POST["username"];
                $this->redirect("/mvc/public/");
            }       
        }else{
            // else render form
            $this->render("register_form", ["title" => "Register"]);
        }
    }
}