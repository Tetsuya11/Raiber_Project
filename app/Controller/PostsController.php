<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController{
		var $name = "Posts";
		var $name = array("Post");
		function index(){
			$this->set("posts",$this->Post->findAll(null,null,));
		}

		public function beforeFilter() {
			$this->Auth->allow('index');
		}

		public function index() {
			if ($this->Auth->loggedIn()) {
				$this->Session->setFlash(_('ログインしています。'));
			} else {
				$this->Session->setFlash(_('ログインしていません。'));
			}
		}
}