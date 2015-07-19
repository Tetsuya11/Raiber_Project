<?php $this->assign('title','Raiber  アイテム編集画面'); ?>

<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<h1>Edit Item</h1>
<?php

echo $this->Form->create('Item',array('type'=>'file'));
echo $this->Form->input('title');
echo $this->Form->input('discription',array('row'=>'3'));
echo $this->Form->file('imageimage1',array('label'=>false, 'type'=>'file'));
echo $this->Form->file('imageimage2',array('label'=>false, 'type'=>'file'));
echo $this->Form->file('imageimage3',array('label'=>false, 'type'=>'file'));
echo $this->Form->input('category_id',array('options'=>$categories));
echo $this->Form->end('Save Post');
?>
