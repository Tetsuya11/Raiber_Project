<?php echo $this->Session->flash(); ?>
 
<?php echo $this->Form->create('User', array(
    'type' => 'file', 'enctype' => 'multipart/formdata'));
      echo $this->Form->hidden('User', array(
      'status' => '確認する')); ?>
<div>
<?php echo $this->Form->input('username', array('type' => 'text', 'label' => 'お名前', 'maxlength' => 255)); ?>
</div>
<div>
<?php echo $this->Form->input('email', array('type' => 'email', 'label' => 'メールアドレス', 'maxlength' => 255)); ?>
</div>
<div>
<?php echo $this->Form->input('password', array('type' => 'password', 'label' => 'パスワード', 'maxlength' => 255)); ?>
</div>
<div>
<?php echo $this->Form->input('picture', array('type' => 'file', 'label' => 'プロフィール写真', 'multiple')); ?>
</div>
<?php echo $this->Form->submit('確認する', array('name' => 'confirm', 'action' => 'add_confirm')); ?>
<?php echo $this->Form->end(); ?>