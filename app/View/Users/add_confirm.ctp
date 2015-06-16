<dl>
<?php session_start(); ?>
<?php foreach ((array)$_SESSION['User'] as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php echo h($val); ?></dd>
<?php endforeach; ?>
</dl>
 
<?php
echo $this->Form->create('User');
 
foreach ((array)$_SESSION['User'] as $name => $val) {//(array)を追記して$_SESSIONを強制的に配列の形に変える
    echo $this->Form->hidden($name, array('value' => $val));
}
 
echo $this->Form->submit('修正する', array('name' => 'confirm'));
echo $this->Form->submit('登録する', array('name' => 'confirm'));
 
echo $this->Form->end();
?>