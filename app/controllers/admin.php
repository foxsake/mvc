<?php


class Admin extends Controller{

	public function __construct(){
        if(isset($_POST["admin"]) && $_POST["admin"]==false){
            $this->redirect("/mvc/public/home");
        }
    }

	public function index(){
		$curtheme = $this->model('Settings')->get_theme();
		$layouts = $this->model('Settings')->get_layout();
		$this->render('admin/index',['layouts'=>$layouts,'curtheme'=>$curtheme]);
	}

	public function banner(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
			  	if(count($_FILES["pics"]) > 0) {
			    	$folderName = "uploads/";

			    	for ($i = 0; $i < count($_FILES["pics"]["name"]); $i++) {
						if ($_FILES["pics"]["name"][$i] <> "") {
			        		$image_mime = strtolower($_FILES["pics"]["type"][$i]);
			        		if (in_array($image_mime, $valid_image_check)) {
			          			$ext = explode("/", strtolower($image_mime));
			          			$ext = strtolower(end($ext));
			          			$filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
			          			$filepath = $folderName . $filename;
			          			if (!move_uploaded_file($_FILES["pics"]["tmp_name"][$i], $filepath)) {
			          				$this->dd("err..pirate!");
			            			$counter++;
			          			} else {
			            			$this->model('Settings')->set_banner($filename);
			          			}
			        		} else {
			          			print_r("not a valid image.");
			        		}
			      		}
			    	}
			  } else {
			  	print_r("Atelast 1 image");
			  }
			print_r("Banner Set!");
		}else{
			print_r("not set");
		}
	}

	public function theme(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$suc = $this->model('Settings')->set_theme($_POST['theme']);
			if($suc){
				print_r('failed');
			}else{
				print_r('theme changed');
			}
		}
	}

	public function layout(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$suc = $this->model('Settings')->set_layout($_POST['layout']);
			if($suc){
				print_r('failed');
			}else{
				print_r('layout changed');
			}
		}
	}
}