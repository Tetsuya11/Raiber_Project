<p><?php echo $this->Html->link("Back", array('controller'=>'items', 'action' => 'index')); ?></p>
<div class="users form">

<h2><?php echo __('会員登録 Sign up'); ?></h2>
<p style="padding-top:10px;">下記のフォームに必要事項をご記入の上、[確認ボタン]を押してください
<br>Fill out your an application blank please
</p>

    <div class="user_add">
        
        <?php
            // フォームの開始を宣言する
            echo $this->Form->create("User", array(
             'type'=>'file', 'enctype' => 'multipart/form-data'));
            // ユーザ名
            echo $this->Form->input("username", array( 
                'maxlength' => '255', 'type' => 'username'));
            //メールアドレス
            // echo $this->Form->input("email", array(
            //     'maxlength' => '255', 'type' => 'email'));
            // パスワード
            echo $this->Form->input("password", array( 
                'maxlength' => '50', 'type' => 'password'));
            // パスワード確認用
            // echo $this->Form->input("password_confirm", array( 
            //     'maxlength' => '50', 'type' => 'password'));
            // 画像
            echo $this->Form->file("user_img", array(
                'type' => 'file'));
            // ユーザー権限識別
            // echo $this->Form->input('role', array(
            //     'options' => array('admin' => 'Admin', 'author' => 'Author')
            // ));

            echo $this->Form->submit("Signup");

            echo $this->Form->end();
            
        ?>
    </div>
</div>

<div class="actions">

    <h3><?php echo __('Actions'); ?></h3>

    <ul>

        <li><?php echo $this->Html->link(__('Login'), array(
        'action' => 'login')); ?></li>

        <li><?php echo $this->Html->link(__('Enter'), array(
        'controller' => 'items', 'action' => 'index')); ?> </li>

    </ul>

</div>
