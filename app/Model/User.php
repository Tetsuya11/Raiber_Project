<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $hasMany = array('Comment', 'Item', 'Post');

    public $validate = array(
        'username' => array(
            'rule1' => array(
                'rule' => array('notEmpty'),
                    'message' => 'A username is required'
            )            
        ),
        'email' => array(
            'rule' => 'email',
            'required' => true,
            'allowEmpty' => false,
            'message' => 'Please enter your email'
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your password'
            )
        ),
        'picture'=>array(
            'rule1' => array(
                //拡張子の指定
                'rule' => array('extension',array('jpg','jpeg','gif','png')),
                'message' => 'Please enter your picture',
                'allowEmpty' => true,
            ),
            'rule2' => array(
                //画像サイズの制限
                'rule' => array('fileSize', '<=', '500000'),
                'message' => 'File size is under 500KB',
            )
        )   
    );
    
    //パスワードハッシュ化
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