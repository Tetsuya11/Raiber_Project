<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
 
class ContactsController extends AppController {

  public $uses = array('Contact');

  public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'confirm', 'send', 'finish');
        $this->userSession = $this->Auth->user();
    }
 
      // 入力画面
      public function index() {
      }
   
      // 確認画面
      public function confirm() {
      }
   
      // 送信処理
      public function send() {
          $email = new CakeEmail('gmail');
          $email->config(array(
              'template' => 'contact',
              'viewVars' => array(
                  'name' => $this->request->data['Contact']['name'],
                  'email' => $this->request->data['Contact']['email'],
                  'message' => $this->request->data['Contact']['message'],
              ),
              'to' => 'to@example.com',
              'subject' => 'お問い合わせ',
          ));
   
          if ($email->send()) {
              $this->redirect('finish');
          } else {
               // メール送信失敗の処理
          }
      }
   
      // 完了画面
      public function finish() {
      }
}
