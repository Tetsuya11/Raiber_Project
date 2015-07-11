<?php

class Item extends AppModel {
    //public $hasOne ='Category';

    public $belongsTo = array('User', 'Category');
	public $hasMany = 'Post';
    
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'discription' => array(
            'rule' => 'notEmpty'
        )
    );
    
    
    public function isOwnedBy($item, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

}

?>