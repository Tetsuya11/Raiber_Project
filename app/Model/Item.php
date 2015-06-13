<?php

class Item extends AppModel {

    public $hasMany = 'Post';

    public $belongsTo = 'User';

	// var $name = 'Item';
 //    var $belongsTo = array(
 //        'User' => array(
 //            'className' => 'User',
 //            'conditions' => 'User.item_id = Item.id',
 //            'order' => 'Item.id ASC',
 //            'foreignKey' => ''),
 //        'Post' => array(
 //            'className' => 'Post',
 //            'conditions' => '',
 //            'order' => 'Post.id ASC',
 //            'foreignKey' => 'post_id')
 //        );

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