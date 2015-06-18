<dl>
<?php foreach ((array)$User as $name => $val): ?>
    <dt><?php
    	if ($name !== 'picture') {
    		echo h($val);
    		//debug($val); 
    		}
    	?>
    </dt>
<?php endforeach; ?>
</dl>
<br />
<?php
	echo $this->Form->submit('修正する', array(
		'name' => 'confirm', 'action' => 'add'));
	echo $this->Form->submit('登録する', array(
		'name' => 'confirm', 'action' => 'add_success'));
 	echo $this->Form->end();
?>