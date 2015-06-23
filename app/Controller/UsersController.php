<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'add', 'logout');
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

    /*// 送信処理
    public function send() {
        $email = new CakeEmail('raiber');
 
        $email->config(array(
            'template' => 'users',
            'viewVars' => array(
                'name' => $this->request->data['User']['username'],
                'email' => $this->request->data['User']['email'],
                'password' => $this->request->data['User']['password'],
            ),
            'to' => 'to@example.com',
            'subject' => 'ご登録ありがとうございます！ Thank you!',
        ));
 
        if ($email->send()) {
            $this->redirect('thanks');
        } else {
             // メール送信失敗の処理
        }
    }
    */
    public function thanks() {
        
    }

    public function mypage() {
        //認証情報取得
            $user_data = $this->Auth->user('username');
            if (is_null($user_data)) {
                $user_data['User']['username'] = 'guest';
            }
            $this->set('user_data', $user_data);
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

        $user_data = $this->Auth->user('username');
            if (is_null($user_data)) {
                $user_data['User']['username'] = 'guest';
            }
            $this->set('user_data', $user_data);
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

        $user_data = $this->Auth->user('username');
            if (is_null($user_data)) {
                $user_data['User']['username'] = 'guest';
            }
            $this->set('user_data', $user_data);
    }

}