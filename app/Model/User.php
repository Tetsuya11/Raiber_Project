<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    // public $useTable = false;    

    public $hasMany = array('Post');

    // public $_schema = array(
    //     'name' => array('type' => 'string', 'length' => 255),
    //     'email' => array('type' => 'string', 'length' => 255),
    //     'pasword' => array('type' => 'string', 'length' => 255),
    //     'picture' => array('type' => 'file'),
    // );

    public $validate = array(
        'username' => array(
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
        'password' => array(
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
        'picture'=>array(
            'extension' => array(
            //ここの拡張子だけ受け付ける
                'rule' => array('extension',array('jpg','jpeg','gif','png')),
                'message' => array( '画像ではありません'),
                'allowEmpty' => true,
            ),
            'mimetype' => array( 
                'rule' => array( 'mimeType', array( 
                    'image/jpeg', 'image/png', 'image/gif') // MIMEタイプを配列で定義
            ),
            'message' => array( 'MIME type エラー')
            ),
            'size' => array(
                'maxFileSize' => array( 
                    'rule' => array( 'fileSize', '<=', '10MB'), 
                    'message' => array( 'ファイルサイズがオーバーしています')),
                'minFileSize' => array( 
                    'rule' => array( 'fileSize', '>', 0),
                    'message' => array('ファイルサイズが足りていません')),
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
}