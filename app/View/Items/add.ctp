<?php $this->assign('title','Raiber  アイテム追加画面'); ?>
<h1>Add Item</h1>
<?php
	echo $this->Form->create('Item');
	echo $this->Form->input('title');
	echo $this->Form->input('discription', array('rows' => '3'));
	echo $this->Form->input('image1',array('type'=>'file'));
	echo $this->Form->input('image2',array('type'=>'file'));
	echo $this->Form->input('image3',array('type'=>'file'));
	echo $this->Form->input('category');
	echo $this->Form->end('Save Post');