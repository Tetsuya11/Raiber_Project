<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');//クラスのローディング。よくわからん。

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller {
    Public $components = array(
        'DebugKit.Toolbar',
        'Session',
        // Authコンポーネントはユーザー名とパスワードの認証をするだけ
        // 細かい処理（authorとadminの区別など）はisAuthorizedに記載？
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'items',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'top',
                // 'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                ),
            ),
            'flash' => array(
                'element' => 'alert',
                'key' => 'auth',
                'params' => array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-error'
                )
            ),
            'authorize' => array('Controller')
        )
    );

    // adminとauthorで権限を区別
    // しかしこのままではauthorの権限が非ログインユーザーと変わらない
    // 各コントローラーにisAuthorizedメソッドを追加して、ログインユーザーに権限を委譲する
    // 
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] == 'admin') {
            // adminユーザーならtrueが返ってくる
            return true;
        }
        // authorユーザーならfalseが返ってくる
        return false;
    }

    // befireFilter関数でいくつかのアクションにログインなしでアクセスできるようにする
    // しかし各コントローラーでしていしたほうが良さげなのでコメントアウトします
    
    public function beforeFilter() {
        //Authコンポーネント呼び出し
        $this->Auth->allow('index', 'view', 'login', 'logout');
        //全体に共通する変数
        //ログインユーザーとゲストの区別
        $user_data = $this->Auth->user('username');     //$user_dataにログインユーザーの名前を代入
        if (is_null($user_data)) {
            $user_data = 'Guest';                       //nullだったらGuestを表示
        }
        $this->set('user_data', $user_data);            //nullじゃない場合user_dataに代入
    }
    
    var $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );

    

}