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

	    public function edit($id = null){
	    	if(!$id){
	    		throw new NotFoundException(__('Invalid post'));
	    	}

	    	$item = $this->Item->findById($id);
	    	if(!$item){
	    		throw new NotFoundException(__('Invalid post'));
	    	}

	    	if($this->request->is(array('item','put'))){
	    		$this->Item->id = $id;
	    		if($this->Item->save($this->request->data)){
	    			$this->Session->setFlash(__('Your post has been updated.'));
	    			return $this->redirect(array('action'=>'index'));
	    	}
	    	$this->Session->setFlash(__('Unable to updata your post.'));
	    }
	    	if(!$this->request->data){
	    		$this->request->data = $item;
	    	}
	    }

		   public function delete($id){
		   	if($this->request->is('get')){
		   		throw new MethodNotAllowedException();
		   	}
		   	if($this->Item->delete($id)){
		   		$this->Session->setFlash(__('The post with id: %s has been deleted.',h($id)));
		   	}
		   	else{
		   		$this->Session->setFlash(__('The post with id %s could not be deleted.',h($id)));
		   	}

		   	return $this->redirect(array('action' =>'index'));

	   }



}