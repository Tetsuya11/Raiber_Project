<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $hasMany = 'Post';

    public $validate = array(
        'login' => array(
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'Letters and numbers only'
            ),
            'between' => array(
                'rule' => array('between', 3, 15),
                'message' => 'Between 3 to 15 characters'
            ),
        ),
        'password' => array(
            'rule' => array('minLength', 4),
            'message' => 'Minimum 4 characters long'
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
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