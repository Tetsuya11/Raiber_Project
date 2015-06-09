<?php

App::uses('AppController', 'Controller');//ローディング
//App::import('Vendor', 'facebook/php-sdk/src/facebook');

class UsersController extends AppController {

    public $name = 'Users';
    public $uses = array('User');
    public $components = array(
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish', 
                    'fields' => array(
                        'username' => 'email', 
                        'password' => 'password', 
                    ), 
                )
            ), 
            'loginAction' => '/users/login', 
            'loginRedirect' => '/users/mypage', 
        ), 
        'Session', 
        'Security', 
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
        $this->Security->blackHoleCallback = 'blackhole';
    }

    public function login() {

        //フォームから情報が送信された場合のみの認証を実施
        if ($this->request->is('post')) {

            //認証処理を実施
            if($this->Auth->login()){
                //認証に成功した場合は、設定されたURLへリダイレクト
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Session->setFlash('ログインに失敗しました');
            }

        }

    }

    public function logout() {

        //ログアウトを実施
        $this->Auth->logout();

        //ログアウト完了画面を表示
        $this->render('logout');

    }

    public function mypage() {

    }

    public function blackhole($type) {

        $this->Session->setFlash('不正なリクエストが行われました');
        $this->redirect(array('controller' => $this->controller, 'action' => $this->action));

    }

}