<?php

class ItemsController extends AppController{

		public $helpers = array('Html','Form','Session');//アップロードパック一旦解除しました
		public $components = array(
								'Session',
								'Auth'
							);

		public $uses = array('Item','Post','User','Category');
		
		public $paginate = array(
        	'Item' =>array(
        	'limit' => 5,
        	'order' => array('id' => 'asc'),
        	)
    	);

		public function isAuthorized($user) {
			//会員のみ投稿できる
			if ($this->action === 'add') {
				return true;
			}

			//投稿のオーナーのみ編集や削除ができる
			if (in_array($this->action, array('edit', 'delete'))) {
				$itemId = (int) $this->request->params['pass'][0];
				if ($this->Item->isOwnedBy($itemId, $user['id'])) {
					return true;
				}
			}
			return parent::isAuthorized($user);
		}

		public function beforefilter() {
			$this->Auth->allow('index', 'view');
		}



		public function index($param1 = null) {
			//認証情報取得
			$this->set('items',$this->paginate());

			$user_data = $this->Auth->user('username');
			if (is_null($user_data)) {
				$user_data['User']['username'] = 'guest';
			}
			$this->set("user_data", $user_data);
			
	        //$this->set('items', $this->Item->find('all'));

			$this->set('categories', $this->Category->find('all'));
	        
	    }


        public function view($id = null) {
	        if (!$id) {
	            throw new NotFoundException(__('Invalid post'));
	        }

	        $this->Item->recursive=2;

	        $item = $this->Item->findById($id);
	        if (!$item) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	        $this->set('item', $item);

	        if ($this->request->is('post')) {
		            $this->Post->create();

		            $this->request->data['Post']['user_id'] = $this->Auth->user('id');

		            if ($this->Post->save($this->request->data)) {
		                $this->Session->setFlash(__('投稿完了！ Your post has been saved.'));
		                return $this->redirect(array('action' => 'view',$id));
		            } else {$this->Session->setFlash(__('投稿できませんでした Unable to add your post.')); }
		            
		    }
		    //認証情報取得
		    $user_data = $this->Auth->user('username');
			if (is_null($user_data)) {
				$user_data['User']['username'] = 'guest';
			}
			$this->set('user_data', $user_data);

	    }


	    public function add() {
	        if ($this->request->is('post')) {
	            $this->Item->create();

	            $this->request->data['Item']['user_id'] = $this->Auth->user('id');

	            // items/addでアップロードしたファイルを$imageの中に格納
			    $image1 = $this->request->data['Item']['imageimage1'];
			    $image2 = $this->request->data['Item']['imageimage2'];
			    $image3 = $this->request->data['Item']['imageimage3'];

			    // itemsデータベースのカラムimageにファイル名を送る
			    $this->request->data['Item']['image1'] = $image1['name'];
			    $this->request->data['Item']['image2'] = $image2['name'];
			    $this->request->data['Item']['image3'] = $image3['name'];

	            if ($this->Item->save($this->request->data)) {

		            // 画像保存先のパス  webroot/img/item_img/イメージファイル名
	    			$path = IMAGES.DS.'item_img' ;

			      	move_uploaded_file($image1['tmp_name'], $path . DS . $image1['name']);
			      	move_uploaded_file($image2['tmp_name'], $path . DS . $image2['name']);
			      	move_uploaded_file($image3['tmp_name'], $path . DS . $image3['name']);

	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	        $this->set('categories', $this->Category->find('list'));//listでCategoryからidとnameを取ることができる

	        //認証情報取得
		    $user_data = $this->Auth->user('username');
			if (is_null($user_data)) {
				$user_data['User']['username'] = 'guest';
			}
			$this->set('user_data', $user_data);

	    }

	    public function edit($id = null){
	    	if(!$id) {
	    		throw new NotFoundException(__('Invalid post'));
	    	}

	    	$item = $this->Item->findById($id);

	    	if(!$item){
	    		throw new NotFoundException(__('Invalid post'));
	    	}

	    	if($this->request->is(array('post', 'put'))) {
	    		$this->Item->id = $id;
	    		if($this->Item->save($this->request->data)) {
	    			$this->Session->setFlash(__('Your post has been updated.'));
	    			return $this->redirect(array('action' => 'index'));
	    		}
	    		$this->Session->setFlash(__('Unable to updata your post.'));
	    
	    	if(!$this->request->data) {
	    		$this->request->data = $item;
	    	}
	        $this->set('categories', $this->Category->find('list'));//listでCategoryからidとnameを取ることができる
	    	
	    	//認証情報取得
		    $user_data = $this->Auth->user('username');
			if (is_null($user_data)) {
				$user_data['User']['username'] = 'guest';
			}
			$this->set('user_data', $user_data);
		}

	}

		   public function delete($id){
		   	if($this->request->is('get')){
		   		throw new MethodNotAllowedException();
		   	}
		   	if ($this->request->is('ajax')) {
		   		if ($this->Item->delete($id)) {
		   			$this->autoRender = false;
		   			$this->autoLayout = false;
		   			$response = array('id' => $id);
		   			$this->header('Content-Type: application/json');
		   			echo json_encode($response);
		   			exit();
		   		}
		   	}
		   	$this->redirect(array('action'=>'index'));
	   }






}