<?php

class ItemsController extends AppController{

		public $helpers = array('Html','Form');


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



}