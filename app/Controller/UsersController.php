<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public $uses = array('User', 'Item', 'Category');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'add', 'logout','delete_confirm', 'delete_comp');
    }

    public function isAuthorized($user) {
        //投稿のオーナーはプロフィールの編集や削除ができる
        if (in_array($this->action, array(
            'edit', 'delete_confirm', 'delete_comp', 'mypage'))) {
            $userId = (int) $this->request->params['pass'][0];
            if ($this->User->isOwnedBy($userId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function login() {
        if ($this->request->is('post')) {
            //Authコンポーネントのログイン処理を呼び出す
            if ($this->Auth->login()) {
                //ログイン成功
                $this->redirect($this->Auth->redirect(array(
                    'controller' => 'items', 'action' => 'index')));
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
                move_uploaded_file($this->data['User']['picture']['tmp_name'], '/Raiber_Project/user_img/'.$this->data['User']['picture']['name']);
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
        //ユーザー識別   
        if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'ゲスト');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        }
        //出品アイテム取得
        $myitems = $this->Item->find('all', array(
            'conditions' => array('Item.user_id' => $this->Auth->user('id'))));
        $this->set('myitems', $myitems);
    }

    public function edit($id = null) {
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'mypage'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete_confirm() {
       //ユーザー識別   
        if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'ゲスト');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        } 

    }

    public function delete_comp() {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('controller' => 'pages', 'action' => 'top'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'mypage'));
    }
}