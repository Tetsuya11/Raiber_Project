<?php

App::uses('AppController', 'Controller');
App::import('Vender', 'facebook/php-sdk/src/facebook');

class MembersController extends AppController{
		
		public $Facebook;

		public function beforFilter() {
			$this->Facebook = new Facebook(array(
				'appId' => 'xxxx',
				'secret' => 'xxxx',
				'cookie' => true,
			));
		    $this->Auth->allow('login', 'logout');
		}

		public function index() {
			if ($this->Auth->loggedIn()) {
				$facebookId = $this->Facebook->getUser();
				$this->set('member', $this->Member->find('first', ['conditions' => ['Member.id' => $facebook]]));
			} else {
				$this->redirect(['action' => 'logout']);
			}
		}

		public function login() {
			$this->autoRender = false;
			// facebook Auth login
			$facebookId = $this->Facebook->getUser();
			if (!$facebook) {
				$this->_authFacebook();
			}

			$member = $this->Member->find)('first', ['conditions' => ['Member.id' => $facebookId]]);
			if (!empty($member['Member'])) {
				if ($this->Auth->login($member['Member'])) {
					$this->redirect(['action' => 'index']);
				}
			} else {
				$this->_add();
			}

			$this->redirect(['action' => 'logout']);
		}

		protected function _authFacebook() {
			$loginUrl = $this->Facebook->getLoginUrl(['redirect_url' => Router::fullBaseUrl() . Router::url(['controller' => 'members', 'action' => 'login'])]);
			return $this->redirect($loginUrl);
		}

		public function logout() {
			$this->Facebook->destroySession();
			$this->redirect($this->Auth->logout());
		}

		protected function _add() {
			$this->autoRender = false;

			$facebookInfo = $this->Facebook->api('/me', 'GET');
			$member = array(
				'Member' => [
					'id' => $facebookInfo['id'],
					'name' => $facebookInfo['name'],
					]
			);
			$this->Member->create();
			if ($this->Member->save($member)) {
				$this->Session->setFlash(_('登録が完了しました。'));
			} else {
				$this->Session->setFlash(_('登録できてません。'));
			}

			$this->redirect(['action' => 'index']);
		}
}