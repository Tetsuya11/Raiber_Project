<h1>Edit Profile</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('email', array('type' => 'email'));
echo $this->Form->input('password', array('type' => 'password'));
echo $this->Form->input('picture', array('type' => 'file'));
echo $this->Form->end('Updata', array('action' => 'mypage'));
?>      