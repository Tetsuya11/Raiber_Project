<?php
class Post extends AppModel {

    public $belongsTo = array('User', 'Category');
	public $hasMany = 'Comment';
    
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public function isOwnedBy($post, $user) {
    	return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}

}
?>