<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public $var = array(
                    'Auth' => array(
                        'allowActions' => array('add', 'login')
                    ),
                    //ログイン後の飛び先をアイテム一覧に指定
                    'loginRedirect' => array(
                        'controller' => 'items', 'action' => 'index'
                    ),
                    'logoutRedirect' => array(
                        'action' => 'login'
                    ),
                    'Session'
                );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            //Authコンポーネントのログイン処理を呼び出す
            if ($this->Auth->login()) {
                //ログイン成功
                $this->redirect($this->Auth->redirect());
            } else {
                //ログイン失敗
                $this->Session->setFlash(__('Invalid username or password, try again'
                    , 'default', array(), 'auth'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }


    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'thanks'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function thanks() {
        //入力されたデータよりテーブルを読み込む
        $record = $this->User->read(null, $this->data['User']['id']);
        //controllerからviewに値を受け渡す
        $this->set('data', $record);
    }

    public function mypage() {
        $this->User->id = $id;
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