<?php
class Post extends AppModel {

    public $belongsTo = array('User', 'Category');
    
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    //投稿のオーナーが自らの投稿の編集を承認されているかどうかを伝えるための記述らしい
    public function isOwnedBy($post, $user) {
    	return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
?>