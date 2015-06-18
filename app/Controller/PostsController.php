<?php

App::uses('AppController', 'Controller','Session');//クラスのローディング

 class PostsController extends AppController{
// 		var $name = "Posts";
// 		var $name = array("Post");
// 		function index(){
// 			$this->set("posts",$this->Post->findAll(null,null,));

		public $helpers = array('Html', 'Form');
		public $components = array('Session');

	

		public function beforeFilter() {
			$this->Auth->allow();
		}

		// public function add() {
		// 	if (!empty($this->data)) {
		// 		$post["Post"]["title"] = $this->data["Memo"]["title"];
		// 		$post["Post"]["url"] = $this->data["Memo"]["url"];
		// 		$post["Post"][""] = $this->data["Memo"]["memo"];
		// 		$this->Memo->save($memo);
		// 		$this->redirect("/memos");
		// 		}
		// 	}
		// }

		public function index() {
				$this->set('posts',$this->Post->find('all'));
				if ($this->request->is('post')) {
		            $this->Post->create();
		            if ($this->Post->save($this->request->data)) {
		                $this->Session->setFlash(__('投稿完了！ Your post has been saved.'));
		                return $this->redirect(array('action' => 'index'));
		            }
		            $this->Session->setFlash(__('投稿できませんでした Unable to add your post.'));
		        }


				if ($this->Auth->loggedIn()) {
					$this->Session->setFlash(_('ログインしています。'));
				} else {
					$this->Session->setFlash(_('ログインしていません。'));
				}
		}

		public function delete($id) {
	    if($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }
			 		
			 	//下はモデル（データベースから削除する為の記述）
			 	if($this->Post->delete($id)) {
			 		$this->Session->setFlash('Deleted!');
			 		
			 	}
			 	$this->redirect(array('action'=>'view'));
		}
	}



