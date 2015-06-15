<?php

class CategoriesController extends AppController{
		public $helpers = array('Html','Form','Session');
		public $components = array('Session');

		public function index(){
			$this->set('categories',$this->Category->find('all'));

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
		}

}
?>