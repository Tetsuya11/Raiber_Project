<?php

class Member extends AppModel {

	public $displayField = 'name';

	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'fb_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'picture' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'modefied' => array(
			'datetime' => array(
				'rule' => array('datetime'),
			),
		    'notEmpty' => array(
		    	'rule' => array('notEmpty'),
		    ),
		),
	);
}

?>