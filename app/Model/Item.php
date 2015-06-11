<?php

class Item extends AppModel {

	public $hasMany = 'Post';

	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'discription' => array(
            'rule' => 'notEmpty'
        )
    );

}

?>