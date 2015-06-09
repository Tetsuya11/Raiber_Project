<?php

class ItemsController extends AppController{

		public $helpers = array('Html','Form','Session');
		public $components = array('Session');


		public function index() {
        $this->set('items', $this->Item->find('all'));

    	}


        public function view($id = null) {
	        if (!$id) {
	            throw new NotFoundException(__('Invalid post'));
	        }

	        $item = $this->Item->findById($id);
	        if (!$item) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	        $this->set('item', $item);
	    }


	    public function add() {
	        if ($this->request->is('post')) {
	            $this->Item->create();
	            if ($this->Item->save($this->request->data)) {
	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }



}