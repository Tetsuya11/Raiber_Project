<?php

class PostsController extends AppController{
		var $name = "Posts";
		var $name = array("Post");
		function index(){
			$this->set("posts",$this->Post->findAll(null,null,))
		}

}