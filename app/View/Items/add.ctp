<?php $this->assign('title','Raiber  アイテム追加画面'); ?>

<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<h1><?php echo $user_data; ?> さんがAdd Itemや！</h1>
<?php
	echo $this->Form->create('Item',array('type'=>'file','enctype'=>'multipart/form-data'));//Itemモデル使用
	echo $this->Form->input('title');
	echo $this->Form->input('discription', array('rows' => '3'));
	echo $this->Form->file('imageimage1',array('label'=>false, 'type'=>'file'));
	echo $this->Form->file('imageimage2',array('label'=>false, 'type'=>'file'));
	echo $this->Form->file('imageimage3',array('label'=>false, 'type'=>'file'));
	echo $this->Form->input('category_id',array('options'=>$categories));
	echo $this->Form->end('Save Post');
?>