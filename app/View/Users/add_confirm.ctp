<dl>
<?php foreach ($this->request->data['User']): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 
<?php
echo $this->Form->create('User');
 
foreach ($this->request->data['User'] as $name => $val) {
    echo $this->Form->hidden($name, array('value' => $val));
}
 
echo $this->Form->submit('Rewrite', array('name' => 'confirm'));
echo $this->Form->submit('Sign up', array('name' => 'confirm',
 'action' => 'add_success'));
 
echo $this->Form->end();