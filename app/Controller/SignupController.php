<?php

class SignupController extends AppController {

    public $name = 'Signup';
    public $uses = array('User');
    public $components = array(
        'Security', 
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->blackHoleCallback = 'blackhole';
    }

    public function index(){

        if(!$this->request->data){
            $this->render();
            return;
        }

        //入力データをセット
        $this->User->set($this->request->data);

        //入力内容を検査
        if($this->User->validates()){

            //モデルの状態をリセット
            $this->User->create();

            //入力済みデータをモデルにセット
            $user = array('User' => $this->request->data['User']);

            //データを保存
            $this->User->save($user);

            //サンクス画面を表示
            $this->render('thanks');

        }

    }

    public function blackhole($type) {

        $this->Session->setFlash('不正なリクエストが行われました');
        $this->redirect(array('controller' => $this->controller, 'action' => $this->action));

    }

}