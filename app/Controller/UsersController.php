<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public $components = array('Auth');

    public $helpers = array('Form', 'Html', 'Xform.Xformjp');

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add_user', 'add_confirm', 'add_success', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect(array('controller' => 'items', 'action' => 'index')));
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
    //新規会員の追加
    public function add_user() {//初回登録画面
        
    }
    //確認画面
    public function add_confirm() {
        $this->params['xformHelperConfirmFlag'] = true;

    } 
    //Eメール送信機能
    public function send() {
        $email = new CakeEmail('default');
 
        $email->config(array(
            'template' => 'contacts',
            'viewVars' => array(
                'name' => $this->request->data['User']['username'],
                'email' => $this->request->data['User']['email'],
                'password' => $this->request->data['User']['password'],
                'picture' => $this->request->data['User']['picture'],
            ),
            'to' => 'brn0612@gmail.com',
            'subject' => 'ご登録ありがとうございます',
        )
        );
 
        if ($email->send()) {
            $this->redirect('add_success');
        } else {
             // メール送信失敗の処理
        }
    }
    //確認画面
    public function add_success() {

    }
    //マイページ
    public function mypage() {

    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
