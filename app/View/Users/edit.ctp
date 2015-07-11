<h2>Edit profile</h2>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('user_img', array(
	'type' => 'file'));
echo $this->Form->input)('id', array('type' => 'hidden'));
echo $this->Form->submit('Update');
echo $this->Form->end();
?>