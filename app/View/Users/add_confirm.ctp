<dl>
<?php foreach ((array)$User as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>
    <dd><?php
    	if ($name !== 'picture') {
    		echo h($name);
    		//debug($val); 
    		}
    	?>
    </dd>
<?php endforeach; ?>
</dl>
<br />

<?php
	echo $this->Form->create('User');
 
	foreach ((array)$User as $name => $val) {//(array)を追記して$_SESSIONを強制的に配列の形に変える
		if ($name != 'picture') {
		    echo $this->Form->hidden($name, array('value' => $val));
		}
	}
	echo $this->Form->submit('修正する', array(
		'name' => 'confirm', 'action' => 'add'));
	echo $this->Form->submit('登録する', array('name' => 'confirm'));
 	echo $this->Form->end();
?>