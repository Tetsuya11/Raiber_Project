<?php

App::uses('AppController', 'Controller');//クラスのローディング

class PostsController extends AppController{
		// var $name = "Posts";
		//var $name = array("Post");
		public $helpers = array('Html', 'Form','Session');
		public $components = array('Session');


		public function index(){
			$this->set('posts',$this->Post->find('all'));
			if ($this->request->is('post')) {
	            $this->Post->create();
	            if ($this->Post->save($this->request->data)) {
	                $this->Session->setFlash(__('投稿完了！ Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('投稿できませんでした Unable to add your post.'));
	        }

			// if ($this->Auth->loggedIn()) {
			// 	$this->Session->setFlash(_('ログインしています。'));
			// } else {
			// 	$this->Session->setFlash(_('ログインしていません。'));
			// }
		}

		// public function beforeFilter() {
		// 	$this->Auth->allow('index');
		// }


		// public function index() {
		// 	if ($this->Auth->loggedIn()) {
		// 		$this->Session->setFlash(_('ログインしています。'));
		// 	} else {
		// 		$this->Session->setFlash(_('ログインしていません。'));
		// 	}
		// }
}

