<div class="users form">

    <h2><?php echo __('Sign up'); ?></h2>

    <?php
        
        echo $this->Form->create("User", array(
         'type'=>'file'));
        // ユーザ名
        echo $this->Form->input("User.username", array( 
            'maxlength' => '255', 'type' => 'username'));
        //メールアドレス
        echo $this->Form->input("User.email", array(
            'maxlength' => '255', 'type' => 'email'));
        // パスワード
        echo $this->Form->input("User.password", array( 
            'maxlength' => '50', 'type' => 'password'));
        // パスワード確認用
        echo $this->Form->input("User.password_confirm", array( 
            'maxlength' => '50', 'type' => 'password'));
        // 画像
        echo $this->Upload->uploadImage($user, 'User.image', array(
            'style' => 'thumb'));

        echo $this->Form->submit("Signup", array(
            'name' => 'submit'));

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
