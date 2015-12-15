<?php

/**
* 
*/
class Post extends Model{

	public function __construct(){
		$this->table = 'post';
	}

	public function insert($catid,$title,$content){
		return $this->query("INSERT INTO $this->table(categoryid,title,content) VALUES(?,?,?)",$catid,$title,$content);
	}

	public function update($id,$categoryid,$title,$content){
		return $this->query("update $this->table set categoryid = ?, title = ? , content = ? where id = ?",$categoryid,$title,$content,$id);
	}

	public function get_categ($id){
		return $this->query("
				select SQL_CALC_FOUND_ROWS post.id, post.title,post.content,post.posted, images.image
                from $this->table
                join images
                on images.id = 
                    (
                        select images.id
                        from images
                        where images.postid = post.id
                        limit 1
                    ) 
				where categoryid = ?",$id);

	}

	public function all_in(){
		return $this->query("
				select SQL_CALC_FOUND_ROWS post.id, post.title,post.content,post.posted, images.image
                from $this->table
                join images
                on images.id = 
                    (
                        select images.id
                        from images
                        where images.postid = post.id
                        limit 1
                    ) 
				");
	}

	public function view_post($id){
		$ff =  $this->query("
				select post.id, post.title,post.content,post.posted
                from $this->table 
				where id = ?
				",$id);
		return $ff[0];
	}

	public function search($search){
		return $this->query("
				select SQL_CALC_FOUND_ROWS post.id, post.title,post.content,post.posted, images.image
                from $this->table
                join images
                on images.id = 
                    (
                        select images.id
                        from images
                        where images.postid = post.id
                        limit 1
                    ) 
				where post.title = ?
				",$search);
	}
	
}