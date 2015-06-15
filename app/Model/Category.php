<?php

class Category extends AppModel {

		public $hasMany = 'Item';
		public $validate = array(
			'name' => array(
				'rule'=> 'notEmpty'
				)
			);
}

?>