<?php


class Posts extends Controller{

	public function index(){
		$m = $this->model('Post')->all();
		$this->render('post/index',['items' => $m]);
	}

	public function create(){
		$rows = $this->model('Category')->all();
		$cats = [];
		foreach ($rows as $row) {
			$cats[] = [
				"id" => $row["id"],
                "name" => $row["name"]
            ];
		}
		$this->render('post/create',['target'=>'/mvc/public/posts/store','cats'=>$cats]);
	}

	public function store(){
		$post = $this->model('Post');
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
        // validate submission
        if (empty($_POST["title"])){
            $this->apologize("You must provide a title.");
        }
        else if (empty($_POST["content"])){
            $this->apologize("You must provide content");
        }

        //insert to database
        $suc = $post->insert($_POST['categoryid'],$_POST['title'],$_POST['content']);

        if($suc === false){
        	$this->apologize("Title already Taken.");
        }else{
        	$id = $post->last_insert_id();

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
			            			$this->model('Image')->insert($id,$filename);
			          			}
			        		} else {
			          			print_r("not a valid image.");
			        		}
			      		}
			    	}
			  } else {
			  	print_r("Atelast 1 image");
			  }
			print_r("Item Added!");
        }
	}
}

	public function edit($id){
		$rows = $this->model('Category')->all();
		$cats = [];
		foreach ($rows as $row) {
			$cats[] = [
				"id" => $row["id"],
                "name" => $row["name"]
            ];
		}

		$item = $this->model('Post')->get($id);
		$item = $item[0];
		$this->render('post/create',['target'=>'/mvc/public/posts/update','cats'=>$cats,'item'=>$item]);
	}

	public function update(){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
        // validate submission
        if (empty($_POST["title"])){
            $this->apologize("You must provide a title.");
        }
        else if (empty($_POST["content"])){
            $this->apologize("You must provide content");
        }

		$suc = $this->model('Post')->update($_POST['id'],$_POST['categoryid'],$_POST['title'],$_POST['content']);
		if($suc)
			print_r('FAIL!');
		else
			print_r('SUCCESS!');
	}
}

	public function delete($id){
		$this->model('Post')->delete($id);
		$this->model('Image')->deleteimg($id);
		$this->redirect('/mvc/public/posts');
	}
}