<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    // Authコンポーネントの利用設定。
    public $components = array(
            'Auth'=>array(
                    'allowedActions'=>array('index','login','add')
                    )
        );
    
    public function index(){
        $this->render('index');
    }
    
    /**
     * ユーザ登録情報の更新
     */
    public function edit(){
        
        
    }

    public function add() {
        
        // POSTの場合
        if ($this->request->is('post')) {
            
            // モデルの状態をリセットする
            $this->User->create();
            // データを登録する
            $this->User->save($this->request->data);
            
            // サンクスページに移動する
            $this->redirect(array('action' => 'thanks'));
            
        }
    }

    public function login(){

        if ($this->request->is('post')) {
            // Authコンポーネントのログイン処理を呼び出す。
            if($this->Auth->login()){
                // ログイン処理成功
                $this->redirect('認証に成功しました。', array('controller' => 'items', 'action' => 'index'));
            }else{
                // ログイン処理失敗
                $this->redirect('認証に失敗しました。', array('login'));
            }
        }
    }

    /**
     * ログアウト処理を行う。
     */
    public function logout(){
        
        $this->Auth->logout();
        return $this->flash('ログアウトしました。', '/users/login');
    }

    public function thanks() {

    }

    public function mypage() {

    }

}

