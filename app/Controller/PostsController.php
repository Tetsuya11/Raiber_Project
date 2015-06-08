<?php

class PostsController extends AppController{
		var $name = "Posts";
		var $name = array("Post");
		function index(){
			$this->set("posts",$this->Post->findAll(null,null,))
		}
		function add() {
		if (!empty($this->data)) {
		$post["Post"]["title"] = $this->data["Memo"]["title"];
		$post["Post"]["url"] = $this->data["Memo"]["url"];
		$post["Post"][""] = $this->data["Memo"]["memo"];
		$this->Memo->save($memo);
		$this->redirect("/memos");
		}
		}
	}