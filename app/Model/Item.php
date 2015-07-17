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
    
    //ユーザーが自分の商品のみ扱えるということを伝える。（どこに？）
    public function isOwnedBy($item, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }

}

?>