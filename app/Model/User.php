<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    var $name = 'User';
    var $useTable = 'users';

    public $validate = array(
        'name' => array(
            array(
                'rule' => 'notEmpty', 
                'name' => 'お名前を入力してください'
            ), 
        ),
        'password' => array(
            array(
                'rule' => 'notEmpty', 
                'message' => 'パスワードを入力してください'
            ), 
            /*
            array(
                'rule' => 'alphanumericsymbols', 
                'message' => 'パスワードに使用できない文字が入力されています'
            ), 
            array(
                'rule' => array('minLength', 8), 
                'message' => 'パスワードは8文字以上入力してください', 
            ),
            */
            array(
                'rule' => 'passwordConfirm', 
                'message' => 'パスワードが一致していません'
            ), 
        ),
        'password_confirm' => array(
            array(
                'rule' => 'notEmpty', 
                'message' => 'パスワード(確認)を入力してください'
            ), 
        ),
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

    public function passwordConfirm($check){

        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['User']['password'] === $this->data['User']['password_confirm']){
            return true;
        }else{
            return false;
        }

    }

    /*
    public function alphanumericsymbols($check){
        $value = array_values($check);
        $value = $value[0];
        return preg_match('/^[a-zA-Z0-9\s\x21-\x2f\x3a-\x40\x5b-\x60\x7b-\x7e]+$/', $value);
    }
    */
}