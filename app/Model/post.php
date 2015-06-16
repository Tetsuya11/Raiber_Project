<?php

class Post extends AppModel {
    public $validate = array(
       'message' => array(
           'rule' => 'notEmpty'
       ),
    );

    public $belongsTo = array('Item','User');
}


?>