<?php
class Comment extends AppModel {
	public $validate = array(
        'commenter' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = 'Post';//全てのcommentはpostに帰属するという意味。
}
?>