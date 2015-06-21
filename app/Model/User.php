<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $hasMany = 'Post';

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ''
                )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'picture'=>array(
            'rule1' => array(
                //拡張子の指定
                'rule' => array('extension',array('jpg','jpeg','gif','png')),
                'message' => 'A picture is required',
                'allowEmpty' => true,
            ),
            'rule2' => array(
                //画像サイズの制限
                'rule' => array('fileSize', '<=', '500000'),
                'message' => 'Under 500000',
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}