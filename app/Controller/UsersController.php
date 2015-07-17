<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    var $uses = array('User', 'Item', 'Category');//使用するモデル
    
    // 非会員がログインと新規登録、ログアウトのページにアクセスできる許可を与える
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
    }
    
    public function isAuthorized($user) {
        //ユーザーが自身のマイページのみにアクセスしたり、自身のプロフィールのみ編集や削除ができるようにする
        if (in_array($this->action, array(
            'edit', 'delete', 'mypage'))) {
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
        //もしデータがpost送信されたら
        if ($this->request->is('post')) {
            $this->User->create($this->request->data);

            // user/addでアップロードしたファイルを$imageの中に格納
            $image = $this->request->data['User']['user_img'];

            // usersデータベースのカラムpictureにファイル名を送る
            $this->request->data['User']['picture'] = $image['name'];

            if ($this->User->save($this->request->data)) {

                // 画像保存先のパス  webroot/img/イメージファイル名
                $path = IMAGES;
                
                move_uploaded_file($image['tmp_name'], $path . DS . $image['name']);
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'thanks'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
        }
    }
    
    
    public function thanks() {
        //ユーザー識別   
        if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'Guest');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        } 

        
    }

    public function mypage($id = null) {
        //ユーザー識別   
        if (is_null($this->Auth->user('username'))) {
            $this->set('user_data', 'Guest');
        } else {
            $this->set('user_data', $this->Auth->user('username'));
        }
        
        //出品アイテム取得
        $myitems = $this->Item->find('all', array(
            'conditions' => array('Item.user_id' => $this->Auth->user('id'))));
        $this->set('myitems', $myitems);
    }

    public function edit($id = null) {
        $this->User->id = $id;
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
        
        $this->User->bindModel(
            array(
                'hasMany' => array(
                    'Item' => array('dependent' => true),
                    'Post' => array('dependent' => true)
                )
            ),
            false
        );
    }         
}