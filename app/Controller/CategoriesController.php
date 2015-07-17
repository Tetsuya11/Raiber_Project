<?php

class CategoriesController extends AppController{
	public $helpers = array('Html','Form','Session');
	public $components = array('Session');

	public function index(){
		$this->set('categories',$this->Category->find('all'));

		// ログインユーザーの名前を呼び出す
		if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'Guest');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        }

	}

	//indexとviewはログインなしで閲覧可能
	public function beforefilter() {
		$this->Auth->allow('index', 'view');
	}

	public function view($id = null){
		if(!$id){
			throw new NotFoundException(__('Invalid category'));
		}

		$category = $this->Category->findById($id);
			if(!$category){
				throw new NotFoundException(__('Invalid category'));
			}
		$this->set('category',$category);

		// ログインユーザーの名前を呼び出す
		if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'Guest');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        }
	}

}
?>