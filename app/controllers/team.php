<?php


class Team extends Controller{

	public function __construct(){
		
	}

	public function index($test=''){
		$model = $this->model('Teams');
		$items = [];
		foreach ($model->all() as $row) {
			$items[] = [
				"id" => $row["logo"],
                "name" => $row["name"],
                "logo" => $row["logo"]
            ];
		}
		$this->render('team/index',["items" => $items]);
	}

	public function create(){
		$this->render('team/create');
	}

	public function edit($id){
		$model = $this->model('Teams');
		$this->dd($model->get($id));
		$this->render('team/create');
	}

	public function store(){
			$model = $this->model('Teams');
			if($_SERVER["REQUEST_METHOD"] == "POST"){
			
	        	// validate submission
		        if (empty($_POST["name"])){
		            $this->apologize("You must provide a name.");
		        }

	        //insert to database
			  	$valid_image_check = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp");
			  	if(count($_FILES["pics"]) > 0) {
			    	$folderName = "uploads/";

			    	for ($i = 0; $i < count($_FILES["pics"]["name"]); $i++) {
						if ($_FILES["pics"]["name"][$i] <> "") {
			        		$image_mime = strtolower($_FILES["pics"]["type"][$i]);
			        		// if valid image type then upload
			        		if (in_array($image_mime, $valid_image_check)) {
			          			$ext = explode("/", strtolower($image_mime));
			          			$ext = strtolower(end($ext));
			          			$filename = rand(10000, 990000) . '_' . time() . '.' . $ext;
			          			$filepath = $folderName . $filename;
			          			if (!move_uploaded_file($_FILES["pics"]["tmp_name"][$i], $filepath)) {
			            			$counter++;
			          			} else {
			            			$model->insert($_POST["name"],$filename);
			            			if(!$model){
			            				print_r("failed");
			            			}else{
			            				print_r("success!");
			            			}
			          			}
			        		} else {
			          			print_r("not a valid image.");
			        		}
			      		}
			    	}
			  } else {
			  	print_r("Atelast 1 image");
			  }
	    }
	}
}