<?php
echo $this->Session->flash();
 
echo $this->Form->create('User');
 
echo $this->Form->input('username', array(
        'type' => 'text',
        'label' => 'Your name',
        'maxlength' => 255,
        )
     );

echo $this->Form->input('email', array(
        'type' => 'email',
        'label' => 'Your mail',
        'maxlength' => 255,
        )
     );
 
echo $this->Form->input('password', array(
        'type' => 'password',
        'label' => 'Your password',
        'maxlength' => 255,
        )
    );
 
echo $this->Form->create('picture', array(
        'type' => 'file', 'enctype' => 'multipart/form-data', 'url' => '/upload'));
     $this->Form->input('picture', array(
        'type' => 'file', 'label' => 'Picture',));
 
echo $this->Form->submit('Confirm', array('username' => 'add_confirm'));
echo $this->Form->end();