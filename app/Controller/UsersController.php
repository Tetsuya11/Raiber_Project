<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
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

<<<<<<< HEAD
    public function add() {//初回登録画面
        if (!$this->request->is('post') || !$this->request->data) {
            return;
        }

        $this->User->set($this->request->data);

        if (!$this->User->validates()) {//入力データの保存ではなく、妥当性チェックとしてのバリデーション
            $this->Session->setFlash('入力内容に不備があります。');
            return;
        }

        switch ($this->request->data['User']['status']) {//statusを書くことで、
            case '確認する':
                $this->redirect(array('action' => 'add_confirm'));
                break;
            case '登録する':
                if ($this->sendUser($this->request->data['User'])) {
                    $this->Session->setFlash('登録を受け付けました。');
                    $this->redirect(array('action' => 'add_confirm'));
                } else {
                    $this->Session->setFlash('エラーが発生しました。');
                }
                break;
        }
    }
    
    private function sendContact($content) {
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('user');
 
        return $email
            ->from(array($user['email'] => $user['username']))
            ->viewVars($user)
            ->template('user', 'user')
            ->send();
    }

    public function add_confirm() {
        if ($_POST['User'] == 'confirm') {
            $this->render('confirm');
        } else {
            if ($this->User->save($this->data)) {
                $this->flash('Your account has been saved.', '/users');
            }
        }
    
    }

    public function add_success() {

    }
=======
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
>>>>>>> 2b001b4f5a40addf9197fff98f21834e0cd890cd

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
