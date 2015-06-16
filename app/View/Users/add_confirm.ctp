<dl>
<?php foreach ($_SESSION['User'] as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 
<?php
echo $this->Form->create('User');
 
foreach ($this->request->data['User'] as $name => $val) {
    echo $this->Form->hidden($name, array('value' => $val));
}
 
echo $this->Form->submit('修正する', array('action' => 'add'));
echo $this->Form->submit('登録する', array('name' => 'confirm'));
 
echo $this->Form->end();
?>