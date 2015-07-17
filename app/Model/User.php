<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    //アップロードされたユーザー画像の保存先
    var $name = 'User';

    public $hasMany = array(
        'Item',
        'Post',
        'Category'
        );

    //ユーザーは自分のユーザーデータだけ扱うことができる
    //ログインしている時点で他のユーザーのユーザーデータにアクセスできないはずなので、意味ない？
    /*
    public function isOwnedBy($post, $user) {
        return true;
        //return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
    */

    //各入力内容のバリデーション
    public $validate = array(
        'username' => array(
            'rule1' => array(
                'rule' => array('notEmpty'),
                    'message' => 'A username is required'
            )            
        ),
        'email' => array(
            array(
                'rule' => 'notEmpty', 
                'message' => 'メールアドレスを入力してください'
            ), 
            array(
                'rule' => 'email', 
                'message' => '正しいメールアドレスを入力してください'
            ), 
        ),
        'password' => array(
            array(
                'rule' => 'notEmpty', 
                'message' => 'パスワードを入力してください'
            ), 
            array(
                'rule' => 'alphanumericsymbols', 
                'message' => 'パスワードに使用できない文字が入力されています'
            ), 
            array(
                'rule' => array('minLength', 4), 
                'message' => 'パスワードは4文字以上入力してください', 
            ),
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
        'image'=>array(
              'rule1' => array(
                 //拡張子の指定
                 'rule' => array('extension',array('jpg','jpeg','gif','png')),
                 'message' => '画像ではありません。',
                 'allowEmpty' => true,
              ),
              'rule2' => array(
                 //画像サイズの制限
                 'rule' => array('fileSize', '<=', '1000000'),
                 'message' => '画像サイズは1000KB以下でお願いします',
              )
        ),
        //ユーザーの権限がadminかauthorか区別する
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function passwordConfirm($check){

        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['User']['password'] === $this->data['User']['password_confirm']){
            return true;
        }else{
            return false;
        }

    }

    //同一パスワードのチェック
    public function alphanumericsymbols($check){
        $value = array_values($check);
        $value = $value[0];
        return preg_match('/^[a-zA-Z0-9\s\x21-\x2f\x3a-\x40\x5b-\x60\x7b-\x7e]+$/', $value);
    }
    
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