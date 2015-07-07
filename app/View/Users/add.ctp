<div class="users form">
<<<<<<< HEAD
<?php echo $this->Form->create('User', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Sign Up'); ?></legend>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('email', array(
        	'maxlength' => '255', 'type' => 'email'));
        echo $this->Form->input('password', array(
        	'maxlength' => '255', 'type' => 'password'));
        echo $this->Form->input('password_confirm', array(
        	'maxlength' => '255', 'type' => 'password'));
        echo $this->Form->file('user_img', array(
=======

    <h2><?php echo __('Sign up'); ?></h2>

    <?php
        // フォームの開始を宣言する
        echo $this->Form->create("User", array(
         'type'=>'file', 'enctype' => 'multipart/form-data'));
        // ユーザ名
        echo $this->Form->input("username", array( 
            'maxlength' => '255', 'type' => 'username'));
        //メールアドレス
        echo $this->Form->input("email", array(
            'maxlength' => '255', 'type' => 'email'));
        // パスワード
        echo $this->Form->input("password", array( 
            'maxlength' => '50', 'type' => 'password'));
        // パスワード確認用
        echo $this->Form->input("password_confirm", array( 
            'maxlength' => '50', 'type' => 'password'));
        // 画像
        echo $this->Form->input("image_file_name", array(
>>>>>>> 1f660515247c53120f20d2aa1042cbaa19b5bede
            'type' => 'file'));

        echo $this->Form->submit("Signup");

        echo $this->Form->end();
        
    ?>

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
