<?php

App::uses('AppController', 'Controller');//クラスのローディング

class PostsController extends AppController{
		var $name = "Posts";
		var $name = array("Post");
		function index(){
			$this->set("posts",$this->Post->findAll(null,null,));
		}

		public function beforeFilter() {
			$this->Auth->allow('index');
		}

		public function add() {
			if (!empty($this->data)) {
				$post["Post"]["title"] = $this->data["Memo"]["title"];
				$post["Post"]["url"] = $this->data["Memo"]["url"];
				$post["Post"][""] = $this->data["Memo"]["memo"];
				$this->Memo->save($memo);
				$this->redirect("/memos");
				}
			}
		}

		public function index() {
			if ($this->Auth->loggedIn()) {
				$this->Session->setFlash(_('ログインしています。'));
			} else {
				$this->Session->setFlash(_('ログインしていません。'));
			}
		}
}
